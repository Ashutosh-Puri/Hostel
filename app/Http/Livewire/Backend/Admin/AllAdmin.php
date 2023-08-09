<?php

namespace App\Http\Livewire\Backend\Admin;

use App\Models\Role;
use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AllAdmin extends Component
{   
    use WithFileUploads;
    use WithPagination;
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
 
    public function resetinput()
    {
        $this->c_id=null;
        $this->name=null;
        $this->email=null;
        $this->password=null;
        $this->mobile=null;
        $this->status=null;
        $this->role_id=null;
        $this->password_confirmation=null;
        $this->photo=null;
        $this->photoold=null;
        $this->search =null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }
 
    public function save()
    {  
        $validatedData =  $validatedData = $validatedData=$this->validate([
            'name' => ['required', 'string', 'max:255',Rule::unique('admins', 'name')],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('admins', 'email')], 
            'password' => ['required','string', 'min:8', 'max:255','confirmed'],
            'mobile' => ['nullable', 'numeric', 'digits:10',Rule::unique('admins', 'mobile')], 
            'photo' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:1024'],
            'role_id' => ['required', 'integer',],
        ]);   
        $admin= new Admin;
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Admin Created Successfully!!"
        ]);
    }

    public function edit($id)
    {   
        $admin = Admin::find($id);
        $this->C_id=$admin->id;
        $this->role_id=$admin->role_id;
        $this->name=$admin->name;
        $this->email=$admin->email;
        $this->mobile=$admin->mobile;
        $this->photoold=$admin->photo;
        $this->status =$admin->status;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $validatedData=$this->validate([
            'name' => ['required', 'string', 'max:255',Rule::unique('admins', 'name')->ignore($this->name, 'name'),],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('admins', 'email')->ignore($this->email, 'email'),], 
            'mobile' => ['nullable', 'numeric', 'digits:10',Rule::unique('admins', 'mobile')->ignore($this->mobile, 'mobile'),], 
            'photo' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:1024'],
            'role_id' => ['required', 'integer',],
        ]);
        $admin = Admin::find($id);
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
        $this->resetinput();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Admin Updated Successfully!!"
        ]);
        $this->setmode('all');
    }

    public function delete($id)
    { 
        $admin = Admin::find($id);
        if($admin->photo)
        {
            File::delete($admin->photo);
        }
        $admin->delete();
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
        return view('livewire.backend.admin.all-admin',compact('admins','roles'))->extends('layouts.admin')->section('admin');
    }

}
