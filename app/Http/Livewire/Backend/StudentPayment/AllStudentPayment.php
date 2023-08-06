<?php

namespace App\Http\Livewire\Backend\StudentPayment;

use App\Models\Student;
use Livewire\Component;
use App\Models\Admission;
use App\Models\AcademicYear;
use App\Models\StudentPayment;

class AllStudentPayment extends Component
{   public $mode='', $student_payments ,$academic_years,$admissions,$students;
    public $totalamount;
    public $academic_year_id;
    public $admission_id;
    public $student_id;
    public $c_id;
 
    protected $rules = [
        'totalamount' => ['required','integer'],
        'academic_year_id' => ['required','integer'],
        'admission_id' => ['required','integer'],
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
        $studentpayment= new StudentPayment;
        $studentpayment->academic_year_id = $validatedData['academic_year_id'];
        $studentpayment->student_id = $validatedData['student_id'];
        $studentpayment->admission_id = $validatedData['admission_id'];
        $studentpayment->total_amount = $validatedData['totalamount'];
        $studentpayment->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Payment Created Successfully!!"
        ]);
        $this->setmode('');
    }

    public function edit($id)
    {   
        $studentpayment = StudentPayment::find($id);
        $this->C_id=$studentpayment->id;
        $this->academic_year_id=$studentpayment->academic_year_id;
        $this->student_id = $studentpayment->student_id;
        $this->admission_id = $studentpayment->admission_id;
        $this->totalamount = $studentpayment->total_amount;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $studentpayment = StudentPayment::find($id);
        $studentpayment->academic_year_id = $validatedData['academic_year_id'];
        $studentpayment->student_id = $validatedData['student_id'];
        $studentpayment->admission_id = $validatedData['admission_id'];
        $studentpayment->total_amount = $validatedData['totalamount'];
        $studentpayment->update();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Payment Updated Successfully!!"
        ]);
        $this->setmode('');
    }

    public function delete($id)
    { 
        $studentpayment = StudentPayment::find($id);
        $studentpayment->delete();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Payment Deleted Successfully!!"
        ]);
        $this->setmode('');
    }

    public function render()
    {   $this->academic_years=AcademicYear::where('status',0)->get();
        $this->students=Student::where('status',0)->get();
        $this->admissions=Admission::all();
        $this->student_payments=StudentPayment::latest()->get();
        return view('livewire.backend.student-payment.all-student-payment')->extends('layouts.admin')->section('admin');
    }

}
