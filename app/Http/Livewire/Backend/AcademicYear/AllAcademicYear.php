<?php

namespace App\Http\Livewire\Backend\AcademicYear;

use Livewire\Component;
use App\Models\AcademicYear;
use Illuminate\Validation\Rule;

class AllAcademicYear extends Component
{   
    public $mode='all', $academicyear;
    public $year;
    public $status;
    public $c_id;

    public function resetinput()
    {
       $this->year=null;
       $this->status=null;
       $this->c_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }
 
    public function save()
    {   
        $validatedData=$this->validate([
            'year' => 'required|digits:4|integer|min:1900|unique:academic_years,year',
        ]);

        $academicyear= new AcademicYear;
        $academicyear->year = $validatedData['year'];
        $academicyear->status = $this->status==1?1:0;
        $academicyear->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Academic Year Created Successfully!!"
        ]);
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
        $validatedData=$this->validate([
            'year' => [
                'required',
                'digits:4',
                'integer',
                'min:1900',
                Rule::unique('academic_years', 'year')->ignore($this->year, 'year'),
            ],
        ]);
        $academicyear = AcademicYear::find($id);
        $academicyear->year = $validatedData['year'];
        $academicyear->status = $this->status==1?'1':'0';
        $academicyear->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Academic Year Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $academicyear = AcademicYear::find($id);
        $academicyear->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Academic Year Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $this->academicyear=AcademicYear::latest()->get();
        return view('livewire.backend.academic-year.all-academic-year')->extends('layouts.admin')->section('admin');
    }
}
