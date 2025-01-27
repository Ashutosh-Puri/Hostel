<?php

namespace App\Livewire\Backend\Facility;

use App\Models\Room;
use App\Models\Floor;
use App\Models\Hostel;
use Livewire\Component;
use App\Models\Building;
use App\Models\Facility;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllFacility extends Component
{
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $hostel_id;
    public $building_id;
    public $floor_id;
    public $room_id;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'name' => ['required', 'string',Rule::unique('facilities', 'name')->where('room_id', $this->room_id)->ignore($this->current_id)],
            'room_id' => ['required','integer'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->name=null;
        $this->hostel_id=null;
        $this->building_id=null;
        $this->floor_id=null;
        $this->room_id=null;
        $this->status=null;
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
        $facility= new Facility;
        if($facility){
            $facility->room_id = $validatedData['room_id'];
            $facility->name = $validatedData['name'];
            $facility->status = $this->status==1?1:0;
            $facility->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Facility Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(Facility $facility)
    {
        if($facility)
        {
            $this->current_id=$facility->id;
            $this->c_id=$facility->id;
            $this->hostel_id=$facility->Room->Floor->Building->Hostel->id;
            $this->building_id=$facility->Room->Floor->Building->id;
            $this->floor_id=$facility->Room->Floor->id;
            $this->room_id=$facility->Room->id;
            $this->name = $facility->name;
            $this->status = $facility->status;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Facility $facility)
    {
        $validatedData = $this->validate();
        if($facility){
            $facility->room_id = $validatedData['room_id'];
            $facility->name = $validatedData['name'];
            $facility->status = $this->status==1?'1':'0';
            $facility->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Facility Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Facility $facility)
    {
        if($facility){
            $facility->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Facility Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $facility = Facility::withTrashed()->find($id);
        if($facility){
            $facility->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Facility Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $facility = Facility::withTrashed()->find($this->delete_id);
        if($facility){
            $facility->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Facility Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Facility $facility)
    {
        if($facility->status==1)
        {
            $facility->status=0;
        }else
        {
            $facility->status=1;
        }
        $facility->update();
    }

    public function render()
    {   
        if($this->mode!=='all')
        {
            $hostels = Hostel::select('id','name')->where('status', 0)->get();
            $buildings = Building::select('id','name')->where('hostel_id', $this->hostel_id)->get();
            $floors = Floor::select('id','floor')->where('building_id', $this->building_id)->get();
            $rooms=Room::select('id','label')->where('floor_id', $this->floor_id)->get();
        }
        else
        {   
            $this->resetinput();
            $hostels=null;
            $buildings=null;
            $floors=null;
            $rooms=null;
        }

        $facilityQuery = Facility::select('id','name','status','room_id','deleted_at')->with('room')->orderBy('room_id', 'ASC');
        if ($this->search) {
            $facilityQuery->whereHas('room', function ($query) {
                $query->where('label', 'like', '%' . $this->search . '%');
            });
        }
        $facility = $facilityQuery->withTrashed()->paginate($this->per_page);
        return view('livewire.backend.facility.all-facility',compact('facility','rooms','floors','buildings','hostels'))->extends('layouts.admin.admin')->section('admin');
    }
}
