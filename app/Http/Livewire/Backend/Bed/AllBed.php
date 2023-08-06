<?php

namespace App\Http\Livewire\Backend\Bed;

use App\Models\Bed;
use App\Models\Room;
use Livewire\Component;

class AllBed extends Component
{   
    public $mode='', $beds ,$rooms;
    public $room_id;
    public $status;
    public $c_id;
 
    protected $rules = [
        'room_id' => ['required','integer'],
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
        $bed= new Bed;
        $bed->room_id = $validatedData['room_id'];
        $bed->status = $this->status==1?1:0;
        $bed->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Bed Created Successfully!!"
        ]);
        $this->setmode('');
    }

    public function edit($id)
    {   
        $bed = Bed::find($id);
        $this->C_id=$bed->id;
        $this->room_id=$bed->room_id;
        $this->status = $bed->status;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $bed = Bed::find($id);
        $bed->room_id = $validatedData['room_id'];
        $bed->status = $this->status==1?'1':'0';
        $bed->update();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Bed Updated Successfully!!"
        ]);
        $this->setmode('');
    }

    public function delete($id)
    { 
        $bed = Bed::find($id);
        $bed->delete();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Bed Deleted Successfully!!"
        ]);
        $this->setmode('');
    }

    public function render()
    {   $this->rooms=Room::all();
        $this->beds=Bed::latest()->get();
        return view('livewire.backend.bed.all-bed')->extends('layouts.admin')->section('admin');
    }

}
