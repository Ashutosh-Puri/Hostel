<?php

namespace App\Livewire\Backend\Role;


use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class AllRole extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'name' => ['required','string','unique:roles,name,'.($this->mode=='edit'? $this->current_id :''),],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->name=null;
        $this->status=null;
        $this->c_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $name= new Role;
        if($name){
            $name->name = $validatedData['name'];
            $name->status = $this->status==1?1:0;
            $name->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Role Created Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(Role $role)
    {
        if($role){
            $this->current_id=$role->id;
            $this->c_id=$role->id;
            $this->name = $role->name;
            $this->status = $role->status;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Role $role)
    {
        $validatedData = $this->validate();
        if($role){
            $role->name = $validatedData['name'];
            $role->status = $this->status==1?'1':'0';
            $role->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Role Updated Successfully !!');  
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
        $role = Role::find($this->delete_id);
        if($role){
            $role->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Role Deleted Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Role $role)
    {
        if($status->status==1)
        {   
            $role->status=0;
        }else
        {
            $role->status=1;
        }
        $role->update();
    }

    public function render()
    {   
        if($this->mode=='all')
        {
            $this->resetinput();
        }

        $roles = Role::query()->whereNotIn('name', ['super admin'])->when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->orderBy('created_at', 'ASC')->paginate($this->per_page);

        return view('livewire.backend.role.all-role',compact('roles'))->extends('layouts.admin.admin')->section('admin');
    }
}
