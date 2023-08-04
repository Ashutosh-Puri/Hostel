<?php

namespace App\Http\Livewire\Backend\Class;

use App\Models\Classes;
use Livewire\Component;

class AllClass extends Component
{    
    public $mode='', $class;
    public $name;
    public $stream;
    public $type;
    public $status;
    public $c_id;
 
    protected $rules = [
        'name' => ['required','string'],
        'stream' => ['required','string'],
        'type' => ['required','string'],
    ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }
 
    public function save()
    {
        $validatedData = $this->validate();
       
        $class= new Classes;
        $class->name = $validatedData['name'];
        $class->stream = $validatedData['stream'];
        $class->type = $validatedData['type'];
        $class->status = $this->status==1?1:0;
        $class->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Class Created Successfully!!"
        ]);
        $this->setmode('');
    }

    public function edit($id)
    { 
        $class = Classes::find($id);
        $this->C_id=$class->id;
        $this->name = $class->name;
        $this->stream =$class->stream;
        $this->type = $class->type ;
        $this->status = $class->status;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $class = Classes::find($id);
        $class->name = $validatedData['name'];
        $class->stream = $validatedData['stream'];
        $class->type = $validatedData['type'];
        $class->status = $this->status==1?'1':'0';
        $class->update();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Class Updated Successfully!!"
        ]);
        $this->setmode('');
    }

    public function delete($id)
    { 
        $class = Classes::find($id);
        $class->delete();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Class Deleted Successfully!!"
        ]);
        $this->setmode('');
    }

    public function render()
    {   
        $this->class=Classes::all();
        return view('livewire.backend.class.all-class')->extends('layouts.admin')->section('admin');
    }
}
