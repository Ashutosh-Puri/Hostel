<?php

namespace App\Livewire\Backend\Admin;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
    public $role;
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
            'role' => ['required', 'string',],
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
        $this->role=null;
        $this->password=null;
        $this->password_confirmation=null;
        $this->photo=null;
        $this->photoold=null;
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
            $admin->name = $validatedData['name'];
            $admin->email= $validatedData['email'];
            $admin->password= Hash::make($validatedData['password']);
            $admin->mobile= $validatedData['mobile'];
            $admin->status = $this->status==1?'1':'0';
            if($this->photo)
            {   $path='uploads/profile/admin/photo/';
                $FileName = 'admin-'.now()->format('Y-m-d-H-m-s').'.'.$this->photo->getClientOriginalExtension();
                $this->photo->storeAs($path,$FileName,'public');
                $admin->photo='storage/'.$path.$FileName ;
                $this->reset('photo');
            }
            if ($this->role) {
                $admin->assignRole($this->role);
            }
            $admin->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Admin Created Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(Admin $admin)
    {
        if($admin)
        {
            $this->current_id=$admin->id;
            $role=$admin->roles->pluck('name');
            $this->role=$role[0];
            $this->c_id=$admin->id;
            $this->name=$admin->name;
            $this->email=$admin->email;
            $this->mobile=$admin->mobile;
            $this->photoold=$admin->photo;
            $this->status =$admin->status;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Admin $admin)
    {
        $validatedData =  $this->validate();
        if($admin)
        {
            $admin->name = $validatedData['name'];
            $admin->email= $validatedData['email'];
            $admin->mobile= $validatedData['mobile'];
            $admin->status = $this->status==1?'1':'0';
            if($this->photo)
            {
                if($admin->photo)
                {
                    File::delete($admin->photo);
                }
                $path='uploads/profile/admin/photo/';
                $FileName = 'admin-'.now()->format('Y-m-d-H-m-s').'.'.$this->photo->getClientOriginalExtension();
                $this->photo->storeAs($path,$FileName,'public');
                $admin->photo='storage/'.$path.$FileName ;
                $this->reset('photo');
            }
            $admin->update();
            $admin->roles()->detach();
            if ($this->role) {
                $admin->assignRole($this->role);
            }

            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Admin Updated Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Admin $admin)
    {
        if($admin)
        {
            if($admin->photo)
            {
                File::delete($admin->photo);
            }
            $admin->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Admin Deleted Successfully !!');  
            $this->delete_id=null;
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $admin = Admin::withTrashed()->find($id);
        if($admin)
        {
            if($admin->photo)
            {
                File::delete($admin->photo);
            }
            $admin->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Admin Restored Successfully !!');  
            $this->delete_id=null;
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $admin = Admin::withTrashed()->find($this->delete_id);
        if($admin)
        {
            if($admin->photo)
            {
                File::delete($admin->photo);
            }
            $admin->forceDelete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Admin Deleted Successfully !!');  
            $this->delete_id=null;
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Admin $admin)
    {
        if($admin->status==1)
        {
            $admin->status=0;
        }else
        {
            $admin->status=1;
        }
        $admin->update();
    }

    public function render()
    {   
        if($this->mode!=='all')
        {
            $roles=Role::select('id','name')->where('status',0)->get();
        }else
        {   
            $this->resetinput();
            $roles=null;
        }

        $admins = Admin::query()->when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->withTrashed()->orderBy('name', 'ASC')->paginate($this->per_page);

        return view('livewire.backend.admin.all-admin',compact('admins','roles'))->extends('layouts.admin.admin')->section('admin');
    }
}
