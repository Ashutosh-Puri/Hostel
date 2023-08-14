<?php

namespace App\Http\Livewire\Backend\Class;

use App\Models\Classes;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AllClass extends Component
{    
    use WithPagination;
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
        $this->search=null;
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
            'message'=>"Class Created Successfully!!"
        ]);
    }

    public function edit($id)
    {   
        $this->current_id=$id;
        $class = Classes::find($id);
        if($class){
            $this->C_id=$class->id;
            $this->name = $class->name;
            $this->stream =$class->stream;
            $this->type = $class->type ;
            $this->status = $class->status;
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
        $class = Classes::find($id);
        if($class){
            $class->name = $validatedData['name'];
            $class->stream = $validatedData['stream'];
            $class->type = $validatedData['type'];
            $class->status = $this->status==1?'1':'0';
            $class->update();
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
            'message'=>"Class Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $class = Classes::find($id);
        if($class){
            $class->delete();
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Class Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $class=Classes::where('name', 'like', '%'.$this->search.'%')->orderBy('name', 'ASC')->paginate($this->per_page);
        return view('livewire.backend.class.all-class',compact('class'))->extends('layouts.admin.admin')->section('admin');
    }
}
