<?php

namespace App\Livewire\Backend\StudentPayment;

use App\Models\Fee;
use App\Models\Seated;
use App\Models\Student;
use Livewire\Component;
use App\Models\Admission;
use App\Models\Allocation;
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
    public $seated_id;
    public $c_id;
    public $deposite=0.00;

    public function resetinput()
    {
        $this->totalamount= null;
        $this->academic_year_id= null;
        $this->admission_id= null;
        $this->seated_id= null;
        $this->deposite= null;
        $this->c_id= null;
    }

    protected function rules()
    {
        return [
            'seated_id' => ['required','integer'],
            'totalamount' => ['required','numeric'],
            'academic_year_id' => ['required','integer'],
            'admission_id' => ['required','integer'],
            'student_id' => ['required','integer'],
            'deposite' => ['required','numeric'],
        ];
    }
    public function messages()
    {
        return [
            'totalamount.required' => 'The Fee For This Seating Type In The Current Academic Year Is Not Available.',
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
            $studentpayment->deposite = $validatedData['deposite'];
            $studentpayment->amount = $this->totalamount;
            $studentpayment->total_amount = ($this->totalamount - $validatedData['deposite']);
            $studentpayment->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Payment Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(StudentPayment $studentpayment)
    {
        if($studentpayment){
            $alloc =Allocation::where('admission_id',$studentpayment->admission_id)->first();
            if($alloc)
            {
                $fee=Fee::find($alloc->fee_id);
                if($fee)
                {
                    $this->seated_id=$fee->seated_id;
                    $this->totalamount=$fee->amount;
                }
            }
            $this->c_id=$studentpayment->id;
            $this->academic_year_id=$studentpayment->academic_year_id;
            $this->student_id = $studentpayment->student_id;
            $this->deposite = $studentpayment->deposite;
            $this->admission_id = $studentpayment->admission_id;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(StudentPayment $studentpayment)
    {
        $validatedData = $this->validate();
        if($studentpayment){
            $studentpayment->academic_year_id = $validatedData['academic_year_id'];
            $studentpayment->student_id = $validatedData['student_id'];
            $studentpayment->admission_id = $validatedData['admission_id'];
            $studentpayment->deposite = $validatedData['deposite'];
            $studentpayment->amount = $this->totalamount;
            $studentpayment->total_amount = ($this->totalamount - $validatedData['deposite']);
            $studentpayment->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Payment Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(StudentPayment $studentpayment)
    {
        if($studentpayment){
            $studentpayment->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Payment Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $studentpayment = StudentPayment::withTrashed()->find($id);
        if($studentpayment){
            $studentpayment->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Payment Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $studentpayment = StudentPayment::withTrashed()->find($this->delete_id);
        if($studentpayment){
            $studentpayment->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Payment Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(StudentPayment $studentpayment)
    {
        if($studentpayment->status==1)
        {
            $studentpayment->status=2;
        }elseif($studentpayment->status==2)
        {
            $studentpayment->status=0;
        }else
        {
            $studentpayment->status=1;
        }
        $studentpayment->update();
    }

    public function render()
    {   

        if($this->mode!=='all')
        {
            $academic_years=AcademicYear::select('id','year')->where('status',0)->orderBy('year', 'DESC')->get();
            $admissions = Admission::where('academic_year_id', $this->academic_year_id)->get();
            $students=Student::select('id','name','username')->where('status',0)->whereIn('id',  $admissions->pluck('student_id'))->get();
            $seateds=Seated::select('id','seated')->where('status',0)->orderBy('seated', 'ASC')->get();   
            $fees=Fee::where('status',0)->where('academic_year_id',$this->academic_year_id)->where('seated_id',$this->seated_id)->first();
            if($fees)
            {
                $this->totalamount=$fees->amount;
            }else
            {
                $this->totalamount=null;
            }
        }
        else
        {
            $this->resetinput();
            $academic_years=null;
            $admissions=null;
            $students=null;
            $seateds=null;
        }

        
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
        $student_payments = $query->withTrashed()->paginate($this->per_page);
        return view('livewire.backend.student-payment.all-student-payment',compact('seateds','academic_years','students','admissions','student_payments'))->extends('layouts.admin.admin')->section('admin');
    }
}
