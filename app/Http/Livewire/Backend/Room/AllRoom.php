<?php

namespace App\Http\Livewire\Backend\Room;

use App\Models\Room;
use App\Models\Floor;
use App\Models\Hostel;
use App\Models\Seated;
use Livewire\Component;
use App\Models\Building;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AllRoom extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $r = '',$b = '',$f = '';
    public $per_page = 10;
    public $mode='all';
    public $hostel_id;
    public $building_id;
    public $floor_id;
    public $seated_id;
    public $capacity;
    public $label;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'label' => ['required', 'string', 'max:255',Rule::unique('rooms', 'label')->where(function ($query) {
                return $query->where('floor_id', $this->floor_id);
            })->ignore($this->current_id ?? null),],
            'capacity' => ['required','integer','min:1'],
            'hostel_id' => ['required','integer'],
            'building_id' => ['required','integer'],
            'floor_id' => ['required','integer'],
            'seated_id' => ['required','integer','min:1',]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if($propertyName=='seated_id')
        {
            $this->capacity=$this->seated_id;
        }

    }

    public function resetinput()
    {
        $this->r=null;
        $this->b=null;
        $this->f=null;
        $this->label=null;
        $this->building_id=null;
        $this->hostel_id=null;
        $this->capacity=null;
        $this->floor_id=null;
        $this->status=null;
        $this->seated_id=null;
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
        $room= new Room;
        if($room){
            $room->label = $validatedData['label'];
            $room->capacity = $validatedData['capacity'];
            $room->floor_id = $validatedData['floor_id'];
            $room->seated_id = $validatedData['seated_id'];
            $room->status = $this->status==1?'1':'0';
            $room->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'seated_id'=>'success',
                'message'=>"Room Created Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'seated_id'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function edit($id)
    {
        $this->current_id=$id;
        $room = Room::find($id);
        if($room){
            $floor=Floor::find($room->floor_id);
            if($floor)
            {
                $this->hostel_id=$floor->Building->Hostel->id;
                $this->building_id=$floor->Building->id;
                $this->floor_id =  $floor->id;
            }
            $this->C_id=$room->id;
            $this->label = $room->label;
            $this->capacity =  $room->capacity;
            $this->status = $room->status;
            $this->seated_id = $room->seated_id;
            $this->setmode('edit');
        }else{
            $this->dispatchBrowserEvent('alert',[
                'seated_id'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $room = Room::find($id);
        if($room){
            $room->label = $validatedData['label'];
            $room->capacity = $validatedData['capacity'];
            $room->floor_id = $validatedData['floor_id'];
            $room->seated_id = $validatedData['seated_id'];
            $room->status = $this->status==1?'1':'0';
            $room->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'seated_id'=>'success',
                'message'=>"Room Updated Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'seated_id'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function delete()
    {
        $room = Room::find($this->delete_id);
        if($room){
            $room->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'seated_id'=>'success',
                'message'=>"Room Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'seated_id'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function status($id)
    {
        $status = Room::find($id);
        if($status->status==1)
        {   
            $status->status=0;
        }else
        {
            $status->status=1;
        }
        $status->update();
    }

    public function render()
    {   
        $hostels = Hostel::where('status', 0)->get();
        $buildings = Building::where('hostel_id', $this->hostel_id)->get();
        $floors = Floor::where('building_id', $this->building_id)->get();
        $seateds=Seated::where('status',0)->orderBy('seated', 'ASC')->get();
        $rooms = Room::paginate($this->per_page);
        return view('livewire.backend.room.all-room',compact('rooms','seateds','floors','hostels','buildings'))->extends('layouts.admin.admin')->section('admin');
    }
}
