<?php

namespace App\Livewire\Backend\Class;

use App\Models\Classes;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AllClass extends Component
{
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $stream;
    public $type;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255','unique:classes,name,'.($this->mode=='edit'? $this->current_id :'')],
            'stream' => ['required','string'],
            'type' => ['required','string'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->name=null;
        $this->stream=null;
        $this->type=null;
        $this->status=null;
        $this->c_id=null;
        $this->current_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $class= new Classes;
        if($class){
            $class->name = $validatedData['name'];
            $class->stream = $validatedData['stream'];
            $class->type = $validatedData['type'];
            $class->status = $this->status==1?1:0;
            $class->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Class Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(Classes $class)
    {
        if($class)
        {
            $this->current_id=$class->id;
            $this->c_id=$class->id;
            $this->name = $class->name;
            $this->stream =$class->stream;
            $this->type = $class->type ;
            $this->status = $class->status;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Classes $class)
    {
        $validatedData = $this->validate();
        if($class){
            $class->name = $validatedData['name'];
            $class->stream = $validatedData['stream'];
            $class->type = $validatedData['type'];
            $class->status = $this->status==1?'1':'0';
            $class->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Class Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Classes $class)
    {
        if($class){
            $class->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Class Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $class = Classes::withTrashed()->find($id);
        if($class){
            $class->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Class Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $class = Classes::withTrashed()->find($this->delete_id);
        if($class){
            $class->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Class Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Classes $class)
    {
        if($class->status==1)
        {
            $class->status=0;
        }else
        {
            $class->status=1;
        }
        $class->update();
    }

    public function render()
    {   
        if($this->mode=='all')
        {
            $this->resetinput();
        }
        
        $class=Classes::query()->select('id','name','stream','type','status','deleted_at')->when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->orderBy('name', 'ASC')->withTrashed()->paginate($this->per_page);

        return view('livewire.backend.class.all-class',compact('class'))->extends('layouts.admin.admin')->section('admin');
    }
}
