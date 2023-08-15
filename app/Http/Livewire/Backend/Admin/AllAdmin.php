<?php

namespace App\Http\Livewire\Backend\Admin;

use App\Models\Role;
use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AllAdmin extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $c_id;
    public $name;
    public $email;
    public $password;
    public $mobile;
    public $status;
    public $role_id;
    public $password_confirmation;
    public $photo;
    public $photoold;
    public $current_id;

    protected function rules()
    {
        $passwordRules = $this->mode == 'add' ? ['required', 'same:password_confirmation', 'string', 'min:8', 'max:255'] : [];

        return [

            'password' => $passwordRules,
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:admins,email,'.($this->mode=='edit'? $this->current_id :'')],
            'mobile' => ['nullable', 'numeric', 'digits:10','unique:admins,mobile,'.($this->mode=='edit'? $this->current_id :'')],
            'photo' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:1024'],
            'role_id' => ['required', 'integer',],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->c_id=null;
        $this->name=null;
        $this->email=null;
        $this->mobile=null;
        $this->status=null;
        $this->role_id=null;
        $this->password=null;
        $this->password_confirmation=null;
        $this->photo=null;
        $this->photoold=null;
        $this->search =null;
        $this->current_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData =    $this->validate();
        $admin= new Admin;
        if($admin)
        {
            $admin->role_id = $validatedData['role_id'];
            $admin->name = $validatedData['name'];
            $admin->email= $validatedData['email'];
            $admin->password= Hash::make($validatedData['password']);
            $admin->mobile= $validatedData['mobile'];
            $admin->status = $this->status==1?'1':'0';
            if($this->photo)
            {   $path='uploads/profile/admin/photo/';
                $FileName = 'user-'.now()->format('Y-m-d').'.'.$this->photo->getClientOriginalExtension();
                $this->photo->storeAs($path,$FileName,'public');
                $admin->photo='storage/'.$path.$FileName ;
                $this->reset('photo');
            }
            $admin->save();

        }else{

            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Admin Created Successfully!!"
        ]);
    }

    public function edit($id)
    {
        $this->current_id=$id;
        $admin = Admin::find($id);
        if($admin)
        {
            $this->C_id=$admin->id;
            $this->role_id=$admin->role_id;
            $this->name=$admin->name;
            $this->email=$admin->email;
            $this->mobile=$admin->mobile;
            $this->photoold=$admin->photo;
            $this->status =$admin->status;
        }else{

            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->setmode('edit');
    }

    public function update($id)
    {
        $validatedData =  $this->validate();
        $admin = Admin::find($id);
        if($admin)
        {
            $admin->role_id = $validatedData['role_id'];
            $admin->name = $validatedData['name'];
            $admin->email= $validatedData['email'];
            $admin->mobile= $validatedData['mobile'];
            $admin->status = $this->status==1?'1':'0';
            if($this->photo)
            {   $path='uploads/profile/admin/photo/';
                $FileName = 'user-'.now()->format('Y-m-d').'.'.$this->photo->getClientOriginalExtension();
                $this->photo->storeAs($path,$FileName,'public');
                $admin->photo='storage/'.$path.$FileName ;
                $this->reset('photo');
            }
            $admin->update();

        }else{

            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->resetinput();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Admin Updated Successfully!!"
        ]);
        $this->setmode('all');
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');

    }

    public function delete()
    {
        $admin = Admin::find($this->delete_id);
        if($admin)
        {
            if($admin->photo)
            {
                File::delete($admin->photo);
            }
            $admin->delete();
            $this->delete_id=null;

        }else{

            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Admin Deleted Successfully!!"
        ]);
    }

    public function render()
    {
        $roles=Role::where('status',0)->orderBy('role', 'ASC')->get();
        $admins=Admin::where('name', 'like', '%'.$this->search.'%')->orderBy('name', 'ASC')->paginate($this->per_page);
        return view('livewire.backend.admin.all-admin',compact('admins','roles'))->extends('layouts.admin.admin')->section('admin');
    }

}
