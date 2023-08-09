<?php

namespace App\Http\Livewire\Backend\Room;

use App\Models\Room;
use Livewire\Component;
use App\Models\Building;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AllRoom extends Component
{   
    use WithPagination;
    public $r = '',$b = '',$f = '';
    public $per_page = 10;
    public $mode='all';
    public $label;
    public $building_id;
    public $capacity;
    public $floor;
    public $type;
    public $c_id;


    public function resetinput()
    {
        $this->r=null;
        $this->b=null;
        $this->f=null;
        $this->label=null;
        $this->building_id=null;
        $this->capacity=null;
        $this->floor=null;
        $this->type=null;
        $this->c_id=null;
    }
 
    protected $rules = [
        'label' => ['required','string'],
        'building_id' => ['required','integer'],
        'capacity' => ['required','integer','min:1'],
        'type' => ['required','integer','min:1'],
        'floor' => ['required','integer','min:0'],
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
        $room= new Room;
        $room->building_id = $validatedData['building_id'];
        $room->label = $validatedData['label'];
        $room->capacity = $validatedData['capacity'];
        $room->floor = $validatedData['floor'];
        $room->type = $validatedData['type'];
        $room->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Room Created Successfully!!"
        ]);
    }

    public function edit($id)
    {   
        $room = Room::find($id);
        $this->C_id=$room->id;
        $this->building_id = $room->building_id;
        $this->label = $room->label;
        $this->capacity =  $room->capacity;
        $this->floor = $room->floor;
        $this->type = $room->type;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $room = Room::find($id);
        $room->building_id = $validatedData['building_id'];
        $room->label = $validatedData['label'];
        $room->capacity = $validatedData['capacity'];
        $room->floor = $validatedData['floor'];
        $room->type = $validatedData['type'];
        $room->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Room Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $room = Room::find($id);
        $room->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Room Deleted Successfully!!"
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {   
        $buildings=Building::where('status',0)->orderBy('name', 'ASC')->get();
        $query =Room::orderBy('label', 'ASC');      
        if ($this->b) {
            $buldingIds = Building::where('status', 0)->where('name', 'like', '%' . $this->b. '%')->pluck('id');
            $query->whereIn('building_id', $buldingIds);
        }
        $rooms = $query->where('floor', 'like',$this->f.'%')->where('label', 'like', '%'.$this->r.'%')->paginate($this->per_page);
        return view('livewire.backend.room.all-room',compact('rooms','buildings'))->extends('layouts.admin')->section('admin');
    }
}
