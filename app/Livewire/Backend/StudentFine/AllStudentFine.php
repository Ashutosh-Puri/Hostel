<?php

namespace App\Livewire\Backend\StudentFine;

use App\Models\Fine;
use App\Models\Student;
use Livewire\Component;
use App\Models\Admission;
use App\Models\StudentFine;
use App\Models\AcademicYear;
use Livewire\WithPagination;

class AllStudentFine extends Component
{
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $year = '';
    public $fine_name = '';
    public $student_name = '';
    public $per_page = 10;
    public $mode='all';
    public $amount;
    public $academic_year_id;
    public $fine_id;
    public $student_id;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'amount' => ['required','numeric'],
            'academic_year_id' => ['required','integer'],
            'fine_id' => ['required','integer'],
            'student_id' => ['required','integer'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function resetinput()
    {
        $this->mode=null;
        $this->amount=null;
        $this->academic_year_id=null;
        $this->fine_id=null;
        $this->student_id=null;
        $this->status=null;
        $this->c_id=null;
        $this->current_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $studentfine= new StudentFine;
        if($studentfine){
            $studentfine->academic_year_id = $validatedData['academic_year_id'];
            $studentfine->student_id = $validatedData['student_id'];
            $studentfine->fine_id = $validatedData['fine_id'];
            $studentfine->amount = $this->amount;
            $studentfine->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Fine Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(StudentFine $studentfine)
    {
        if($studentfine){
            $this->current_id=$studentfine->id;
            $this->c_id=$studentfine->id;
            $this->academic_year_id=$studentfine->academic_year_id;
            $this->student_id = $studentfine->student_id;
            $this->fine_id = $studentfine->fine_id;
            $this->amount = $studentfine->amount;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(StudentFine $studentfine)
    {
        $validatedData = $this->validate();
        if($studentfine){
            $studentfine->academic_year_id = $validatedData['academic_year_id'];
            $studentfine->student_id = $validatedData['student_id'];
            $studentfine->fine_id = $validatedData['fine_id'];
            $studentfine->amount = $this->amount;
            $studentfine->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Fine Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(StudentFine $studentfine)
    {
        if($studentfine){
            $studentfine->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Fine Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $studentfine = StudentFine::withTrashed()->find($id);
        if($studentfine){
            $studentfine->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Fine Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $studentfine = StudentFine::withTrashed()->find($this->delete_id);
        if($studentfine){
            $studentfine->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Fine Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(StudentFine $studentfine)
    {
        if($studentfine->status==1)
        {   
            $studentfine->status=2;
        }elseif($studentfine->status==2)
        {
            $studentfine->status=0;
        }else
        {
            $studentfine->status=1;
        }
        $studentfine->update();
    }

    public function render()
    {   
        if($this->mode!=='all')
        {
            $academic_years=AcademicYear::select('id','year')->where('status',0)->orderBy('year', 'DESC')->get();
            $admissions = Admission::select('student_id')->where('academic_year_id', $this->academic_year_id)->get();
            $students=Student::select('id','name')->where('status',0)->whereIn('id',  $admissions->pluck('student_id'))->get();
            $fines=Fine::where('status',0)->where('academic_year_id', $this->academic_year_id)->get();
        }
        else
        {
            $this->resetinput();
            $academic_years=null;
            $admissions=null;
            $students=null;
            $fines=null;
        }

        $amount=Fine::find($this->fine_id);
        if($amount)
        {
            $this->amount=$amount->amount;
        }else
        {
            $this->amount=null;
        }

        $query = StudentFine::orderBy('academic_year_id', 'DESC')->when($this->year, function ($query) {
            $query->whereIn('academic_year_id', function ($subQuery) {
                $subQuery->select('id')->from('academic_years')->where('year', 'like', '%' . $this->year . '%');
            });
        })->when($this->student_name, function ($query) {
            $query->whereIn('student_id', function ($subQuery) {
                $subQuery->select('id')->from('students')->where('name', 'like', '%' . $this->student_name . '%');
            });
        })->when($this->fine_name, function ($query) {
            $query->whereIn('fine_id', function ($subQuery) {
                $subQuery->select('id')->from('fines')->where('name', 'like', '%' . $this->fine_name . '%');
            });
        });
        $student_fines = $query->withTrashed()->paginate($this->per_page);
        return view('livewire.backend.student-fine.all-student-fine',compact('academic_years','students','fines','student_fines'))->extends('layouts.admin.admin')->section('admin');
    }
}
