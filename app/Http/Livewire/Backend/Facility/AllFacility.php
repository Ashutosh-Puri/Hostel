<?php

namespace App\Http\Livewire\Backend\Facility;

use App\Models\Room;
use Livewire\Component;
use App\Models\Facility;
use Livewire\WithPagination;

class AllFacility extends Component
{   
    use WithPagination;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $room_id;
    public $status;
    public $c_id;

    public function resetinput()
    {
        $this->search=null;
        $this->name=null;
        $this->room_id=null;
        $this->status=null;
        $this->c_id=null;
    }
 
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Facility Created Successfully!!"
        ]);
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Facility Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $facility = Facility::find($id);
        $facility->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Facility Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $rooms=Room::orderBy('floor', 'ASC')->get();
        $query = Facility::orderBy('room_id', 'ASC');
        if ($this->search) {
            $roomIds = Room::where('label', 'like', '%' . $this->search . '%')->pluck('id');
            $query->whereIn('room_id', $roomIds);
        }
        $facility = $query->paginate($this->per_page);
        return view('livewire.backend.facility.all-facility',compact('facility','rooms'))->extends('layouts.admin')->section('admin');
    }
}
