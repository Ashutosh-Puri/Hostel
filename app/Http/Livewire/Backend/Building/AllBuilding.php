<?php

namespace App\Http\Livewire\Backend\Building;

use App\Models\Hostel;
use Livewire\Component;
use App\Models\Building;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllBuilding extends Component
{   

    use WithPagination;
    public $building_name = '';
    public $hostel_name = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $status;
    public $hostel_id;
    public $c_id;
 
    public function resetinput()
    {
        $this->hostel_id=null;
        $this->hostel_name=null;
        $this->name=null;
        $this->status=null;
        $this->c_id=null;
        $this->building_name =null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }
 
    public function save()
    {
        $validatedData = $validatedData = $this->validate([
            'name' => ['required','string', Rule::unique('buildings', 'name')],
            'hostel_id' => ['required','integer'],
        ]);
        $building= new Building;
        $building->name = $validatedData['name'];
        $building->hostel_id = $validatedData['hostel_id'];
        $building->status = $this->status==1?1:0;
        $building->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Building Created Successfully!!"
        ]);
    }

    public function edit($id)
    { 
        $building = Building::find($id);
        $this->C_id=$building->id;
        $this->status = $building->status;
        $this->name = $building->name;
        $this->hostel_id = $building->hostel_id;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate([
            'name' => ['required','string', Rule::unique('buildings', 'name')->ignore($this->name, 'name')],
            'hostel_id' => ['required','integer'],
        ]);
        $building = Building::find($id);
        $building->name = $validatedData['name'];
        $building->hostel_id = $validatedData['hostel_id'];
        $building->status = $this->status==1?1:0;
        $building->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Building Updated Successfully!!"
        ]); 
    }

    public function delete($id)
    { 
        $building = Building::find($id);
        $building->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Building Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $hostels=Hostel::where('status',0)->orderBy('name',"ASC")->get();

        $query =Building::orderBy('name', 'ASC');      
        if ($this->hostel_name) {
            $hostelIds = Hostel::where('status', 0)->where('name', 'like', '%' . $this->hostel_name. '%')->pluck('id');
            $query->whereIn('hostel_id', $hostelIds);
        }
        $building = $query->where('name', 'like', '%'.$this->building_name.'%')->paginate($this->per_page);
        
        return view('livewire.backend.building.all-building',compact('building','hostels'))->extends('layouts.admin')->section('admin');
    }
}
