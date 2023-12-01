<?php

namespace App\Livewire\Backend\RolePermission;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\QueryException;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AllRolePermission extends Component
{   
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $permission=[];
    public $c_id;
    public $role;
    public $role_id;
    public $current_id;

    protected function rules()
    {
        return [
            'permission.*' => ['required','integer',],

            'role_id' => ['required','integer','unique:role_has_permissions'],
        ];
    }

    public function updatedPermission()
    {
        try {
            $this->validate([
                'permission.*' => 'required|integer',
                'role_id' => 'required|integer',
            ]);
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->addError('role_id', 'This combination of role ID and permission is already in use.');
            }
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->search=null;
        $this->permission=[];
        $this->role_id=[];
        $this->status=null;
        $this->role=null;
        $this->c_id=null;
        $this->role=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    // public function save()
    // {
    //     $validatedData = $this->validate();
    //     $data = array();
    //     $permissions = $this->permission;
    //     foreach($permissions as $key => $item) {
    //         $data['role_id']        = $this->role_id;
    //         $data['permission_id']  = $item;
    //         try 
    //         {
    //             DB::table('role_has_permissions')->insert($data);
    //             $this->resetinput();
    //             $this->setmode('all');
    //             $this->dispatch('alert',type:'success',message:'Role Permission Assigned Successfully !!');  
    //         } catch (QueryException $e) {          
    //             if ($e->getCode() == '23000') {
    //                 $this->addError('permission', 'The selected permissions are not unique.');
    //                 $this->dispatch('alert',type:'error',message:'You Are Trying To Give Dublicate Permission!!');  
    //             }     
    //         }
    //     } 
    // }

    // public function edit($id)
    // {   
    //     $this->resetinput();
    //     if($id)
    //     {   
    //         $this->current_id=$id;
    //         $this->c_id=$id;
    //         $this->role= Role::findOrFail($id);
    //        foreach($this->role->permissions->pluck('id') as $data){
    //         $this->permission[$data]=$data;
    //        }
    //         $this->setmode('edit');
    //     }else{
    //         $this->role=null;
    //     }
    // }

    public function edit(Role $role)
    {   
        $this->resetinput();
        if($role)
        {   
            $this->role=$role;
            $this->current_id=$role->id;
            $this->c_id=$role->id;
           foreach($role->permissions->pluck('id') as $data){
            $this->permission[$data]=$data;
           }
            $this->setmode('edit');
        }else{
            $this->role=null;
        }
    } 

    public function update(Role $role)
    {   
        if($role)
        {
            $permission = $this->permission;
            if (!empty($permission)) {
                $role->syncPermissions(array_keys($permission));
            }
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Role Permission Updated Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
        
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function delete()
    {   
        $role= Role::findOrFail($this->delete_id);
        if (!is_null($role)) {

            $role->syncPermissions([]);
            $this->resetinput();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Role Permission Remove Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    

    public function render()
    {   
        if($this->role_id!=null)
        {   
            if($this->mode=="add")
            {
                $role= Role::findOrFail( $this->role_id);
                foreach($role->permissions->pluck('id') as $data){
                 $this->permission[$data]=$data;
                }
            }
        }
        
        if($this->current_id)
        {
            $role= Role::findOrFail($this->current_id);
        }
        else
        {
            $role=null;
        }

        if($this->mode!=='all')
        {
            $roles=Role::where('status',0)->get();
            $permission = Permission::all();
            $permission_groups = Admin::getpermissionGroups();
        }else
        {
            $this->resetinput();
            $roles=null;
            $permission=null;
            $permission_groups=null;
        }
 
        $allroles=Role::whereNotIn('name', ['super admin'])->when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->paginate($this->per_page);
        return view('livewire.backend.role-permission.all-role-permission',compact('role','permission_groups','permission','roles','allroles'))->extends('layouts.admin.admin')->section('admin');
    }

}