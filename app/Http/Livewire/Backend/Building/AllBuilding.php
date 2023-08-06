<?php

namespace App\Http\Livewire\Backend\Building;

use Livewire\Component;
use App\Models\Building;
use Illuminate\Validation\Rule;

class AllBuilding extends Component
{   
    public $mode='all', $building;
    public $name;
    public $status;
    public $c_id;
 
    public function resetinput()
    {
        $this->name=null;
        $this->status=null;
        $this->c_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }
 
    public function save()
    {
        $validatedData = $validatedData = $this->validate([
            'name' => ['required','string', Rule::unique('buildings', 'name')],
        ]);
        $building= new Building;
        $building->name = $validatedData['name'];
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
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate([
            'name' => ['required','string', Rule::unique('buildings', 'name')->ignore($this->name, 'name')],
        ]);
        $building = Building::find($id);
        $building->name = $validatedData['name'];
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
        $this->building=Building::latest()->get();
        return view('livewire.backend.building.all-building')->extends('layouts.admin')->section('admin');
    }
}
