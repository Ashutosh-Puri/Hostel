<?php

namespace App\Http\Livewire\Backend\Role;


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
        $this->search=null;
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
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Role Created Successfully !!"
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
        $name = Role::find($id);
        if($name){
            $this->c_id=$name->id;
            $this->name = $name->name;
            $this->status = $name->status;
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
        $name = Role::find($id);
        if($name){
            $name->name = $validatedData['name'];
            $name->status = $this->status==1?'1':'0';
            $name->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Role Updated Successfully !!"
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
        $name = Role::find($this->delete_id);
        if($name){
            $name->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Role Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function status($id)
    {
        $status = Role::find($id);
        if($status->status==1)
        {   
            $status->status=0;
        }else
        {
            $status->status=1;
        }
        $status->update();
    }

    public function render()
    {
        $roles = Role::query()->whereNotIn('name', ['super admin'])->when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->orderBy('created_at', 'ASC')->paginate($this->per_page);

        return view('livewire.backend.role.all-role',compact('roles'))->extends('layouts.admin.admin')->section('admin');
    }
}
