<?php

namespace App\Http\Livewire\Backend\AcademicYear;

use Livewire\Component;
use App\Models\AcademicYear;

class AllAcademicYear extends Component
{   
    public $mode='', $academicyear;
    public $year;
    public $status;
    public $c_id;
 
    protected $rules = [
        'year' => ['required', 'digits:4', 'integer', 'min:1900',],
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
       
        $academicyear= new AcademicYear;
        
        $academicyear->year = $validatedData['year'];
        $academicyear->status = $this->status==1?1:0;
        $academicyear->save();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Academic Year Created Successfully!!"
        ]);

        $this->setmode('');
    }

    public function edit($id)
    { 
        $academicyear = AcademicYear::find($id);
        $this->C_id=$academicyear->id;
        $this->year = $academicyear->year;
        $this->status = $academicyear->status;
        
        $this->setmode('edit');
    }

    public function update($id)
    {   
     
        $validatedData = $this->validate();
        // dd($this->status);
        $academicyear = AcademicYear::find($id);
        $academicyear->year = $validatedData['year'];
        $academicyear->status = $this->status==1?'1':'0';
        $academicyear->update();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Academic Year Updated Successfully!!"
        ]);

        $this->setmode('');
    }

    public function delete($id)
    { 
        $academicyear = AcademicYear::find($id);
        $academicyear->delete();
        
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Academic Year Deleted Successfully!!"
        ]);

        $this->setmode('');
    }

    public function render()
    {   
        $this->academicyear=AcademicYear::all();
        return view('livewire.backend.academic-year.all-academic-year')->extends('layouts.admin')->section('admin');
    }
   
}
