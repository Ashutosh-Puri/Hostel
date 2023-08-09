<?php

namespace App\Http\Livewire\Backend\Bed;

use App\Models\Bed;
use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class AllBed extends Component
{   
    use WithPagination;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $room_id;
    public $status;
    public $c_id;

    public function resetinput()
    {
        $this->c_id=null;
        $this->status=null;
        $this->room_id=null;
        $this->search =null;
    }
 
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Bed Created Successfully!!"
        ]);
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Bed Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $bed = Bed::find($id);
        $bed->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Bed Deleted Successfully!!"
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {   
        $rooms=Room::orderBy('floor', 'ASC')->get();
        $query = Bed::orderBy('room_id', 'ASC');
        if ($this->search) {
            $roomIds = Room::where('label', 'like', '%' . $this->search . '%')->pluck('id');
            $query->whereIn('room_id', $roomIds);
        }
        $beds = $query->paginate($this->per_page);
        return view('livewire.backend.bed.all-bed',compact('beds','rooms'))->extends('layouts.admin')->section('admin');
    }
}
