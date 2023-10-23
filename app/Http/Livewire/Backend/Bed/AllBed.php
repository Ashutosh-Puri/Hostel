<?php

namespace App\Http\Livewire\Backend\Bed;

use App\Models\Bed;
use App\Models\Room;
use App\Models\Floor;
use App\Models\Hostel;
use App\Models\Seated;
use Livewire\Component;
use App\Models\Building;
use Livewire\WithPagination;

class AllBed extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $hostel_id;
    public $building_id;
    public $floor_id;
    public $room_id;
    public $seated_id;
    public $status;
    public $c_id;

    public function resetinput()
    {
        $this->c_id=null;
        $this->status=null;
        $this->hostel_id=null;
        $this->building_id=null;
        $this->floor_id=null;
        $this->seated_id=null;
        $this->room_id=null;
        $this->search =null;
    }

    protected function rules()
    {
        return [
            'room_id' => ['required','integer'],
            'floor_id' => ['required','integer'],
            'building_id' => ['required','integer'],
            'hostel_id' => ['required','integer'],
            'seated_id' => ['required','integer'],
        ];
    }

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
        $beds=Bed::where('room_id',$validatedData['room_id'])->count();
        $room=Room::find($validatedData['room_id']);
        if($room)
        {
            $capacity=$room->capacity;
            if($capacity>$beds)
            {
                $bed= new Bed;
                if($bed){
                    $bed->room_id = $validatedData['room_id'];
                    $bed->status = $this->status==1?1:0;
                    $bed->save();
                    if ($beds == $capacity - 1) {
                        $room->status = 1;
                        $room->update();
                    }
                    $this->resetinput();
                    $this->setmode('all');
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'success',
                        'message'=>"Bed Created Successfully !!"
                    ]);
                }else{
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'error',
                        'message'=>"Something Went Wrong !!"
                    ]);
                }
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'warning',
                    'message'=>"Beds Capacity For This Room Is Exceeded !!"
                ]);
            }
        }
    }

    public function edit($id)
    {
        $bed = Bed::find($id);
        if($bed){
            $this->c_id=$bed->id;
            $this->hostel_id=$bed->Room->Floor->Building->Hostel->id;
            $this->building_id=$bed->Room->Floor->Building->id;
            $this->floor_id=$bed->Room->Floor->id;
            $this->room_id=$bed->Room->id;
            $this->seated_id=$bed->Room->Seated->id;
            $this->status = $bed->status;
            $this->setmode('edit');
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $bed = Bed::find($id);
        if($bed){
            $bed->room_id = $validatedData['room_id'];
            $bed->status = $this->status==1?'1':'0';
            $bed->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Bed Updated Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function softdelete($id)
    {
        $bed = Bed::find($id);
        if($bed){
            $bed->delete();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Bed Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function restore($id)
    {
        $bed = Bed::withTrashed()->find($id);
        if($bed){
            $bed->restore();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Bed Restored Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function delete()
    {
        $bed = Bed::withTrashed()->find($this->delete_id);
        if($bed){
            $bed->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Bed Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function status($id)
    {
        $status = Bed::find($id);
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
        $hostels = Hostel::select('id','name')->where('status', 0)->get();
        $buildings = Building::select('id','name')->where('status', 0)->where('hostel_id', $this->hostel_id)->get();
        $floors = Floor::select('id','floor')->where('status', 0)->where('building_id', $this->building_id)->get();
        $seateds=Seated::select('id','seated')->where('status',0)->orderBy('seated', 'ASC')->get();
        $rooms=Room::select('id','label')->where('status', 0)->where('floor_id', $this->floor_id)->where('seated_id', $this->seated_id)->get();
        $beds= Bed::select('id','room_id','status','deleted_at')->with('room:id,label')->orderBy('room_id', 'ASC')->when($this->search, function ($query) {
            $query->whereHas('room', function ($query) {
                $query->where('label', 'like', '%' . $this->search . '%');
            });
        })->withTrashed()->paginate($this->per_page);
        return view('livewire.backend.bed.all-bed',compact('beds','rooms','floors','buildings','hostels','seateds'))->extends('layouts.admin.admin')->section('admin');
    }
}
