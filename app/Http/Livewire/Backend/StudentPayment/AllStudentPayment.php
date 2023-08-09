<?php

namespace App\Http\Livewire\Backend\StudentPayment;

use App\Models\Student;
use Livewire\Component;
use App\Models\Admission;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use App\Models\StudentPayment;

class AllStudentPayment extends Component
{   
    use WithPagination;
    public $year = '';
    public $student_name = '';
    public $admission_name = '';
    public $per_page = 10;
    public $mode='all';
    public $totalamount;
    public $academic_year_id;
    public $admission_id;
    public $student_id;
    public $c_id;

    public function resetinput()
    {
        $this->year = null;
        $this->student_name = null;
        $this->admission_name = null;
        $this->totalamount= null;
        $this->academic_year_id= null;
        $this->admission_id= null;
        $this->c_id= null;
    }
 
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Payment Created Successfully!!"
        ]);
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Payment Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $studentpayment = StudentPayment::find($id);
        $studentpayment->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Payment Deleted Successfully!!"
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {   
        $academic_years=AcademicYear::where('status',0)->get();
        $students=Student::where('status',0)->get();
        $admissions=Admission::all();
        $query = StudentPayment::orderBy('academic_year_id', 'DESC');
        if ($this->year) {
            $AcademicYearid = AcademicYear::where('year', 'like', '%' . $this->year . '%')->pluck('id');
            $query->whereIn('academic_year_id', $AcademicYearid);
        }
        if ($this->student_name) {
            $Studentid = Student::where('name', 'like', '%' . $this->student_name . '%')->pluck('id');
            $query->whereIn('student_id', $Studentid);
        }
        if ($this->admission_name) {
            $Admissionid = Admission::where('name', 'like', '%' . $this->admission_name . '%')->pluck('id');
            $query->whereIn('admission_id', $Admissionid);
        }
        $student_payments = $query->paginate($this->per_page);
        return view('livewire.backend.student-payment.all-student-payment',compact('academic_years','students','admissions','student_payments'))->extends('layouts.admin')->section('admin');
    }
}
