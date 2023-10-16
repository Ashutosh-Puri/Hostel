<?php

namespace App\Http\Livewire\Backend\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class AllPermission extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $group_name;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'name' => ['required','string','unique:permissions,name,'.($this->mode=='edit'? $this->current_id :''),],
            'group_name' => ['required','string'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->search=null;
        $this->name=null;
        $this->group_name=null;
        $this->c_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $permission= new Permission;
        if($permission){
            $permission->name = $validatedData['name'];
            $permission->group_name = $validatedData['group_name'];
            $permission->guard_name = "admin";
            $permission->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Permission Created Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function edit($id)
    {
        $this->current_id=$id;
        $permission = Permission::find($id);
        if($permission){
            $this->c_id=$permission->id;
            $this->name = $permission->name;
            $this->group_name = $permission->group_name;
            $this->setmode('edit');
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $permission = Permission::find($id);
        if($permission){
            $permission->name = $validatedData['name'];
            $permission->group_name = $validatedData['group_name'];
            $permission->guard_name = "admin";
            $permission->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Permission Updated Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function delete()
    {
        $permission = Permission::find($this->delete_id);
        if($permission){
            $permission->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Permission Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }


    public function render()
    {   
        $groups=Permission::all();
        $permissions=Permission::select('id','name','group_name')->when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->orderBy('group_name', 'ASC')->paginate($this->per_page);

        return view('livewire.backend.permission.all-permission',compact('groups','permissions'))->extends('layouts.admin.admin')->section('admin');
    }

}
