<?php

namespace App\Http\Livewire\Backend\Role;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllRole extends Component
{   
    use WithPagination;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $role;
    public $status;
    public $c_id;

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
        $validatedData = $this->validate([
            'role' => ['required','string', Rule::unique('roles', 'role')],
        ]);
        $role= new Role;
        $role->role = $validatedData['role'];
        $role->status = $this->status==1?1:0;
        $role->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Role Created Successfully!!"
        ]);
    }

    public function edit($id)
    { 
        $role = Role::find($id);
        $this->C_id=$role->id;
        $this->role = $role->role;
        $this->status = $role->status;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate([
            'role' => ['required','string', Rule::unique('roles', 'role')->ignore($this->role, 'role')],
        ]);
        $role = Role::find($id);
        $role->role = $validatedData['role'];
        $role->status = $this->status==1?'1':'0';
        $role->update();
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
        $role->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Role Deleted Successfully!!"
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {   
        $roles=Role::where('role', 'like', '%'.$this->search.'%')->orderBy('role', 'ASC')->paginate($this->per_page);
        return view('livewire.backend.role.all-role',compact('roles'))->extends('layouts.admin')->section('admin');
    }
}
