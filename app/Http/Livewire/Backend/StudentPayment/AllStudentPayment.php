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
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
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

    protected function rules()
    {
        return [
            'totalamount' => ['required','numeric'],
            'academic_year_id' => ['required','integer'],
            'admission_id' => ['required','integer'],
            'student_id' => ['required','integer'],
        ];
    }

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
        if($studentpayment){
            $studentpayment->academic_year_id = $validatedData['academic_year_id'];
            $studentpayment->student_id = $validatedData['student_id'];
            $studentpayment->admission_id = $validatedData['admission_id'];
            $studentpayment->total_amount = $validatedData['totalamount'];
            $studentpayment->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Student Payment Created Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function edit($id)
    {
        $studentpayment = StudentPayment::find($id);
        if($studentpayment){
            $this->C_id=$studentpayment->id;
            $this->academic_year_id=$studentpayment->academic_year_id;
            $this->student_id = $studentpayment->student_id;
            $this->admission_id = $studentpayment->admission_id;
            $this->totalamount = $studentpayment->total_amount;
            $this->setmode('edit');
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $studentpayment = StudentPayment::find($id);
        if($studentpayment){
            $studentpayment->academic_year_id = $validatedData['academic_year_id'];
            $studentpayment->student_id = $validatedData['student_id'];
            $studentpayment->admission_id = $validatedData['admission_id'];
            $studentpayment->total_amount = $validatedData['totalamount'];
            $studentpayment->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Student Payment Updated Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function delete()
    {
        $studentpayment = StudentPayment::find($this->delete_id);
        if($studentpayment){
            $studentpayment->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Student Payment Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function status($id)
    {
        $status = StudentPayment::find($id);
        if($status->status==1)
        {   
            $status->status=2;
        }elseif($status->status==2)
        {
            $status->status=0;
        }else
        {
            $status->status=1;
        }
        $status->update();
    }

    public function render()
    {
        $academic_years=AcademicYear::where('status',0)->get();
        $students=Student::where('status',0)->get();
        $admissions=Admission::all();
        $query = StudentPayment::orderBy('academic_year_id', 'DESC')->when($this->year, function ($query) {
            $query->whereIn('academic_year_id', function ($subQuery) {
                $subQuery->select('id')->from('academic_years')->where('year', 'like', '%' . $this->year . '%');
            });
        })->when($this->student_name, function ($query) {
            $query->whereIn('student_id', function ($subQuery) {
                $subQuery->select('id')->from('students')->where('name', 'like', '%' . $this->student_name . '%');
            });
        })->when($this->admission_name, function ($query) {
            $query->whereIn('admission_id', function ($subQuery) {
                $subQuery->select('id')->from('admissions')->where('id', 'like', '%' . $this->admission_name . '%');
            });
        });
        $student_payments = $query->paginate($this->per_page);
        return view('livewire.backend.student-payment.all-student-payment',compact('academic_years','students','admissions','student_payments'))->extends('layouts.admin.admin')->section('admin');
    }
}
