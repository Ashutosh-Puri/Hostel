<?php

namespace App\Http\Livewire\Backend\College;

use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllCollege extends Component
{   
    use WithPagination;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $status;
    public $c_id;
 
    public function resetinput()
    {
        $this->name=null;
        $this->status=null;
        $this->c_id=null;
        $this->earch =null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }
 
    public function save()
    {
        $validatedData = $validatedData = $this->validate([
            'name' => ['required','string', Rule::unique('Colleges', 'name')],
        ]);
        $College= new College;
        $College->name = $validatedData['name'];
        $College->status = $this->status==1?1:0;
        $College->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"College Created Successfully!!"
        ]);
    }

    public function edit($id)
    { 
        $College = College::find($id);
        $this->C_id=$College->id;
        $this->status = $College->status;
        $this->name = $College->name;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate([
            'name' => ['required','string', Rule::unique('Colleges', 'name')->ignore($this->name, 'name')],
        ]);
        $College = College::find($id);
        $College->name = $validatedData['name'];
        $College->status = $this->status==1?1:0;
        $College->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"College Updated Successfully!!"
        ]); 
    }

    public function delete($id)
    { 
        $College = College::find($id);
        $College->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"College Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $colleges=College::where('name', 'like', '%'.$this->search.'%')->orderBy('name', 'ASC')->paginate($this->per_page);
        return view('livewire.backend.College.all-College',compact('colleges'))->extends('layouts.admin')->section('admin');
    }
}
