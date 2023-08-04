<?php

namespace App\Http\Livewire\Backend\Building;

use Livewire\Component;
use App\Models\Building;

class AllBuilding extends Component
{   
    public $mode='', $building;
    public $name,$status;
    public $c_id;
 
    protected $rules = [
        'name' => ['required','string'],
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
       
        $building= new Building;
        
        $building->name = $validatedData['name'];
        $building->status = $this->status==1?1:0;
        $building->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Building Created Successfully!!"
        ]);

        $this->setmode('');
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
     
        $validatedData = $this->validate();
        $building = Building::find($id);
        $building->name = $validatedData['name'];
        $building->status = $this->status==1?1:0;
        $building->update();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Building Updated Successfully!!"
        ]);

        $this->setmode('');
    }

    public function delete($id)
    { 
        $building = Building::find($id);
        $building->delete();
        
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Building Deleted Successfully!!"
        ]);

        $this->setmode('');
    }

    public function render()
    {   
        $this->building=Building::all();
        return view('livewire.backend.building.all-building')->extends('layouts.admin')->section('admin');
    }
    
}
