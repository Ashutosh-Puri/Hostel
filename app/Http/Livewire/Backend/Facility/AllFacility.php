<?php

namespace App\Http\Livewire\Backend\Facility;

use Livewire\Component;
use App\Models\Facility;

class AllFacility extends Component
{   
    public $mode='', $facility;
    public $name;
    public $status;
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
       
        $facility= new Facility;
        
        $facility->name = $validatedData['name'];
        $facility->status = $this->status==1?1:0;
        $facility->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Facility Created Successfully!!"
        ]);

        $this->setmode('');
    }

    public function edit($id)
    { 
        $facility = Facility::find($id);
        $this->C_id=$facility->id;
        $this->name = $facility->name;
        $this->status = $facility->status;
        
        $this->setmode('edit');
    }

    public function update($id)
    {   
     
        $validatedData = $this->validate();
        // dd($this->status);
        $facility = Facility::find($id);
        $facility->name = $validatedData['name'];
        $facility->status = $this->status==1?'1':'0';
        $facility->update();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Facility Updated Successfully!!"
        ]);

        $this->setmode('');
    }

    public function delete($id)
    { 
        $facility = Facility::find($id);
        $facility->delete();
        
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Facility Deleted Successfully!!"
        ]);

        $this->setmode('');
    }

    public function render()
    {   
        $this->facility=Facility::all();
        return view('livewire.backend.facility.all-facility')->extends('layouts.admin')->section('admin');
    }
   
}
