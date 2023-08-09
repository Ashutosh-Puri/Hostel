<?php

namespace App\Http\Livewire\Backend\Class;

use App\Models\Classes;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

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

    public function resetinput()
    {
        $this->name=null;
        $this->stream=null;
        $this->type=null;
        $this->status=null;
        $this->c_id=null;
        $this->search=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }
 
    public function save()
    {
        $validatedData = $this->validate([
            'name' => ['required','string',Rule::unique('classes', 'name')],
            'stream' => ['required','string'],
            'type' => ['required','string'],
        ]);
        $class= new Classes;
        $class->name = $validatedData['name'];
        $class->stream = $validatedData['stream'];
        $class->type = $validatedData['type'];
        $class->status = $this->status==1?1:0;
        $class->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Class Created Successfully!!"
        ]);
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
        $validatedData = $this->validate([
            'name' => ['required','string', Rule::unique('classes', 'name')->ignore($this->name, 'name')],
            'stream' => ['required','string'],
            'type' => ['required','string'],
        ]);
        $class = Classes::find($id);
        $class->name = $validatedData['name'];
        $class->stream = $validatedData['stream'];
        $class->type = $validatedData['type'];
        $class->status = $this->status==1?'1':'0';
        $class->update();
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
        $class->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Class Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $class=Classes::where('name', 'like', '%'.$this->search.'%')->orderBy('name', 'ASC')->paginate($this->per_page);
        return view('livewire.backend.class.all-class',compact('class'))->extends('layouts.admin')->section('admin');
    }
}
