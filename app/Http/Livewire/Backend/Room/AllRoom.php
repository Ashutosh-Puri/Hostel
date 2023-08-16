<?php

namespace App\Http\Livewire\Backend\Room;

use App\Models\Room;
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
    public $label;
    public $building_id;
    public $capacity;
    public $floor;
    public $type;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'label' => ['required', 'string', 'max:255','unique:rooms,label,'.($this->mode=='edit'? $this->current_id :'')],
            'building_id' => ['required','integer'],
            'capacity' => ['required','integer','min:1'],
            'floor' => ['required','integer','min:0'],
            'type' => ['required','integer','min:1',]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function updatedType($propertyName)
    {
        $this->validateOnly($propertyName);
        if($this->mode=="add")
        {
            $this->capacity=$this->type;
        }
    }

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
            $room->building_id = $validatedData['building_id'];
            $room->label = $validatedData['label'];
            $room->capacity = $validatedData['capacity'];
            $room->floor = $validatedData['floor'];
            $room->type = $validatedData['type'];
            $room->save();
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
            'message'=>"Room Created Successfully!!"
        ]);
    }

    public function edit($id)
    {
        $this->current_id=$id;
        $room = Room::find($id);
        if($room){
            $this->C_id=$room->id;
            $this->building_id = $room->building_id;
            $this->label = $room->label;
            $this->capacity =  $room->capacity;
            $this->floor = $room->floor;
            $this->type = $room->type;
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
        $room = Room::find($id);
        if($room){
            $room->building_id = $validatedData['building_id'];
            $room->label = $validatedData['label'];
            $room->capacity = $validatedData['capacity'];
            $room->floor = $validatedData['floor'];
            $room->type = $validatedData['type'];
            $room->update();
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
            'message'=>"Room Updated Successfully!!"
        ]);
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
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Room Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
       
        $buildings=Building::where('status',0)->orderBy('name', 'ASC')->get();
        $query = Room::orderBy('label', 'ASC')->when($this->b, function ($query) {
                $query->whereIn('building_id', function ($subQuery) {
                    $subQuery->select('id')->from('buildings')->where('status', 0)->where('name', 'like', '%' . $this->b . '%');
                });
        })->where('floor', 'like', $this->f . '%')->where('label', 'like', '%' . $this->r . '%');
        $rooms = $query->paginate($this->per_page);
        return view('livewire.backend.room.all-room',compact('rooms','buildings'))->extends('layouts.admin.admin')->section('admin');
    }
}
