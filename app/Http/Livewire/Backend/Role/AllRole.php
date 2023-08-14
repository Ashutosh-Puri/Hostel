<?php

namespace App\Http\Livewire\Backend\Role;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AllRole extends Component
{   
    use WithPagination;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $role;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'role' => ['required','string','unique:roles,role,'.($this->mode=='edit'? $this->current_id :''),],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function resetinput()
    {
        $this->search=null;
        $this->role=null;
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
        $role= new Role;
        if($role){
            $role->role = $validatedData['role'];
            $role->status = $this->status==1?1:0;
            $role->save();
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
            'message'=>"Role Created Successfully!!"
        ]);
    }

    public function edit($id)
    {   
        $this->current_id=$id;
        $role = Role::find($id);
        if($role){
            $this->C_id=$role->id;
            $this->role = $role->role;
            $this->status = $role->status;
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
        $validatedData = $this->validate();
        $role = Role::find($id);
        if($role){
            $role->role = $validatedData['role'];
            $role->status = $this->status==1?'1':'0';
            $role->update();
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
            'message'=>"Role Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $role = Role::find($id);
        if($role){
            $role->delete();
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Role Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $roles=Role::where('role', 'like', '%'.$this->search.'%')->orderBy('role', 'ASC')->paginate($this->per_page);
        return view('livewire.backend.role.all-role',compact('roles'))->extends('layouts.admin.admin')->section('admin');
    }
}
