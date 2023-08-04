<?php

namespace App\Http\Livewire\Backend\Facility;

use App\Models\Room;
use Livewire\Component;
use App\Models\Facility;

class AllFacility extends Component
{   
    public $mode='', $facility ,$rooms;
    public $name;
    public $room_id;
    public $status;
    public $c_id;
 
    protected $rules = [
        'name' => ['required','string'],
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
        $facility= new Facility;
        $facility->room_id = $validatedData['room_id'];
        $facility->name = $validatedData['name'];
        $facility->status = $this->status==1?1:0;
        $facility->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Facility Created Successfully!!"
        ]);
        $this->setmode('');
    }

    public function edit($id)
    {   
        $facility = Facility::find($id);
        $this->C_id=$facility->id;
        $this->room_id=$facility->room_id;
        $this->name = $facility->name;
        $this->status = $facility->status;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $facility = Facility::find($id);
        $facility->room_id = $validatedData['room_id'];
        $facility->name = $validatedData['name'];
        $facility->status = $this->status==1?'1':'0';
        $facility->update();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Facility Updated Successfully!!"
        ]);
        $this->setmode('');
    }

    public function delete($id)
    { 
        $facility = Facility::find($id);
        $facility->delete();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Facility Deleted Successfully!!"
        ]);
        $this->setmode('');
    }

    public function render()
    {   $this->rooms=Room::all();
        $this->facility=Facility::all();
        return view('livewire.backend.facility.all-facility')->extends('layouts.admin')->section('admin');
    }
   
}
