<?php

namespace App\Livewire\Backend\Floor;

use App\Models\Floor;
use App\Models\Hostel;
use Livewire\Component;
use App\Models\Building;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllFloor extends Component
{
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $floor_number = '';
    public $building_name = '';
    public $per_page = 10;
    public $mode='all';
    public $floor;
    public $status;
    public $hostel_id;
    public $building_id;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'floor' => ['required', 'integer', 'min:0', Rule::unique('floors', 'floor')->where(function ($query) {
                return $query->where('building_id', $this->building_id);
            })->ignore($this->current_id ?? null)],
            'building_id'=>['required','integer'],
            'hostel_id'=>['required','integer'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->hostel_id=null;
        $this->building_id=null;
        $this->floor=null;
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
        $validatedData = $validatedData = $this->validate();
        $floor= new Floor;
        if($floor){
            $floor->floor = $validatedData['floor'];
            $floor->building_id = $validatedData['building_id'];
            $floor->status = $this->status==1?1:0;
            $floor->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Floor Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(Floor $floor)
    {
        if($floor)
        {
            $this->current_id=$floor->id;
            $this->c_id=$floor->id;
            $this->hostel_id=$floor->Building->Hostel->id;
            $this->building_id=$floor->Building->id;
            $this->status = $floor->status;
            $this->floor = $floor->floor;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Floor $floor)
    {
        $validatedData = $this->validate();
        if($floor){
            $floor->floor = $validatedData['floor'];
            $floor->building_id = $validatedData['building_id'];
            $floor->status = $this->status==1?1:0;
            $floor->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Floor Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Floor $floor)
    {
        if($floor){
            $floor->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Floor Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $floor = Floor::withTrashed()->find($id);
        if($floor){
            $floor->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Floor Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $floor = Floor::withTrashed()->find($this->delete_id);
        if($floor){
            $floor->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Floor Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Floor $floor)
    {
        if($floor->status==1)
        {
            $floor->status=0;
        }else
        {
            $floor->status=1;
        }
        $floor->update();
    }

    public function render()
    {   
        if($this->mode!=='all')
        {
            $hostels=Hostel::select('id','name')->where('status',0)->get();
            $buildings=Building::select('id','name')->where('status',0)->where('hostel_id',$this->hostel_id)->get();
        }
        else
        {   
            $this->resetinput();
            $hostels=null;
            $buildings=null;
        }

        $query = Floor::with('Building')->select('id','floor','building_id','deleted_at','status')->orderBy('floor', 'ASC');
        if ($this->building_name) {
            $query->whereHas('Building', function ($query) {
                $query->where('name', 'like', '%' . $this->building_name . '%');
            });
        }

        $floors = $query->when($this->floor_number, function ($query) {
            return $query->where('floor', 'like', $this->floor_number . '%');
        })->withTrashed()->paginate($this->per_page);

        return view('livewire.backend.floor.all-floor',compact('floors','buildings','hostels'))->extends('layouts.admin.admin')->section('admin');
    }
}
