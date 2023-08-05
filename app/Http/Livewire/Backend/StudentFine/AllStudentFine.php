<?php

namespace App\Http\Livewire\Backend\StudentFine;

use App\Models\Fine;
use App\Models\Student;
use Livewire\Component;
use App\Models\StudentFine;
use App\Models\AcademicYear;

class AllStudentFine extends Component
{
    public $mode='', $student_fines ,$academic_years,$fines,$students;
    public $amount;
    public $academic_year_id;
    public $fine_id;
    public $student_id;
    public $status;
    public $c_id;
 
    protected $rules = [
        'amount' => ['required','integer'],
        'academic_year_id' => ['required','integer'],
        'fine_id' => ['required','integer'],
        'student_id' => ['required','integer'],
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
        $studentfine= new StudentFine;
        $studentfine->academic_year_id = $validatedData['academic_year_id'];
        $studentfine->student_id = $validatedData['student_id'];
        $studentfine->fine_id = $validatedData['fine_id'];
        $studentfine->amount = $validatedData['amount'];
        $studentfine->status = $this->status==1?1:0;
        $studentfine->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Fine Created Successfully!!"
        ]);
        $this->setmode('');
    }

    public function edit($id)
    {   
        $studentfine = StudentFine::find($id);
        $this->C_id=$studentfine->id;
        $this->academic_year_id=$studentfine->academic_year_id;
        $this->student_id = $studentfine->student_id;
        $this->fine_id = $studentfine->fine_id;
        $this->amount = $studentfine->amount;
        $this->status = $studentfine->status;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $studentfine = StudentFine::find($id);
        $studentfine->academic_year_id = $validatedData['academic_year_id'];
        $studentfine->student_id = $validatedData['student_id'];
        $studentfine->fine_id = $validatedData['fine_id'];
        $studentfine->amount = $validatedData['amount'];
        $studentfine->status = $this->status==1?'1':'0';
        $studentfine->update();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Fine Updated Successfully!!"
        ]);
        $this->setmode('');
    }

    public function delete($id)
    { 
        $studentfine = StudentFine::find($id);
        $studentfine->delete();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Fine Deleted Successfully!!"
        ]);
        $this->setmode('');
    }

    public function render()
    {   $this->academic_years=AcademicYear::where('status',0)->get();
        $this->students=Student::where('status',0)->get();
        $this->fines=Fine::where('status',0)->get();
        $this->student_fines=StudentFine::all();
        return view('livewire.backend.student-fine.all-student-fine')->extends('layouts.admin')->section('admin');
    }

}
