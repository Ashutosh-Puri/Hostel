<?php

namespace App\Livewire\Backend\StudentEducation;

use App\Models\Classes;
use App\Models\Student;
use Livewire\Component;
use App\Models\Admission;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use App\Models\StudentEducation;

class AllStudentEducation extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $a = '',$s = '',$c = '',$ad = '';
    public $per_page = 10;
    public $mode='all';
    public $student_id;
    public $academic_year_id;
    public $last_class_id;
    public $admission_id;
    public $sgpa;
    public $percentage;
    public $c_id;

    public function resetinput()
    {
        $this->student_id=null;
        $this->academic_year_id=null;
        $this->last_class_id=null;
        $this->sgpa=null;
        $this->percentage=null;
        $this->c_id=null;
        $this->admission_id=null;
    }

    protected function rules()
    {
        return [
            // 'student_id' => ['required','integer'],
            'academic_year_id' => ['required','integer'],
            'last_class_id' => ['required','integer'],
            'admission_id' => ['required','integer'],
            'sgpa' => ['required','numeric','min:0.00','max:10.00'],
            'percentage' => ['required','numeric','min:0','max:100'],
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
        $studenteducation= new StudentEducation;
        if($studenteducation){
            $studenteducation->admission_id = $validatedData['admission_id'];
            $admission=Admission::find($validatedData['admission_id']);
            $studenteducation->student_id =  $admission->student_id;
            $studenteducation->academic_year_id = $validatedData['academic_year_id'];
            $studenteducation->last_class_id = $validatedData['last_class_id'];
            $studenteducation->percentage = $validatedData['percentage'];
            $studenteducation->sgpa = $validatedData['sgpa'];
            $studenteducation->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Education Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(StudentEducation $studenteducation)
    {
        if($studenteducation){
            $this->c_id=$studenteducation->id;
            $this->academic_year_id = $studenteducation->academic_year_id;
            $this->admission_id = $studenteducation->admission_id;
            $this->last_class_id =  $studenteducation->last_class_id;
            $this->percentage = $studenteducation->percentage;
            $this->sgpa = $studenteducation->sgpa;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(StudentEducation $studenteducation)
    {
        $validatedData = $this->validate();
        if($studenteducation){
            $studenteducation->academic_year_id = $validatedData['academic_year_id'];
            $studenteducation->admission_id = $validatedData['admission_id'];
            $admission=Admission::find($validatedData['admission_id']);
            $studenteducation->student_id =  $admission->student_id;
            $studenteducation->last_class_id = $validatedData['last_class_id'];
            $studenteducation->percentage = $validatedData['percentage'];
            $studenteducation->sgpa = $validatedData['sgpa'];
            $studenteducation->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Education Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(StudentEducation $studenteducation)
    {
        if($studenteducation){
            $studenteducation->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Education Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $studenteducation = StudentEducation::withTrashed()->find($id);
        if($studenteducation){
            $studenteducation->restore();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Education Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $studenteducation = StudentEducation::withTrashed()->find($this->delete_id);
        if($studenteducation){
            $studenteducation->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Education Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function render()
    {
        if (is_numeric($this->sgpa) && $this->sgpa > 0) {
            $this->percentage = (($this->sgpa * 10) - 7.5);
        }

        if($this->mode!=='all')
        {
            $academicyears=AcademicYear::select('id','year')->where('status',0)->orderBy('year', 'DESC')->get();
            $admissions=Admission::select('id','student_id')->where('academic_year_id',$this->academic_year_id)->orderBy('academic_year_id', 'DESC')->get();
            $classes=Classes::select('id','name')->where('status',0)->orderBy('name', 'ASC')->get();
        }
        else
        {
            $this->resetinput();
            $academicyears=null;
            $admissions=null;
            $classes=null;
        }
       

        $query = StudentEducation::orderBy('student_id', 'ASC')->when($this->ad, function ($query) {
            $query->whereIn('admission_id', function ($subQuery) {
                $subQuery->select('id')->from('admissions')->where('id', 'like', '%' . $this->ad . '%');
            });
        })->when($this->a, function ($query) {
            $query->whereIn('academic_year_id', function ($subQuery) {
                $subQuery->select('id')->from('academic_years')->where('status', 0)->where('year', 'like', '%' . $this->a . '%');
            });
        })->when($this->s, function ($query) {
            $query->whereIn('student_id', function ($subQuery) {
                $subQuery->select('id')->from('students')->where('status', 0)->where('name', 'like', '%' . $this->s . '%');
            });
        })->when($this->c, function ($query) {
            $query->whereIn('last_class_id', function ($subQuery) {
                $subQuery->select('id')->from('classes')->where('status', 0)->where('name', 'like', '%' . $this->c . '%');
            });
        });
        $studenteducations = $query->withTrashed()->paginate($this->per_page);
        return view('livewire.backend.student-education.all-student-education',compact('admissions','classes','academicyears','studenteducations'))->extends('layouts.admin.admin')->section('admin');
    }

}
