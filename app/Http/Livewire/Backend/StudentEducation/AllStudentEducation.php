<?php

namespace App\Http\Livewire\Backend\StudentEducation;

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
        $this->a=null;
        $this->s=null;
        $this->c=null;
        $this->ad=null;
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
        $student_education= new StudentEducation;
        if($student_education){
            $student_education->admission_id = $validatedData['admission_id'];
            $student_education->academic_year_id = $validatedData['academic_year_id'];
            $admission=Admission::find($validatedData['admission_id']);
            $student_education->student_id =  $admission->student_id;
            $student_education->last_class_id = $validatedData['last_class_id'];
            $student_education->percentage = $validatedData['percentage'];
            $student_education->sgpa = $validatedData['sgpa'];
            $student_education->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Student Education Created Successfully !!"
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
        $student_education = StudentEducation::find($id);
        if($student_education){
            $this->c_id=$student_education->id;
            $this->academic_year_id = $student_education->academic_year_id;
            $this->admission_id = $student_education->admission_id;
            $this->last_class_id =  $student_education->last_class_id;
            $this->percentage = $student_education->percentage;
            $this->sgpa = $student_education->sgpa;
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
        $student_education = StudentEducation::find($id);
        if($student_education){
            $student_education->academic_year_id = $validatedData['academic_year_id'];
            $student_education->admission_id = $validatedData['admission_id'];
            $admission=Admission::find($validatedData['admission_id']);
            $student_education->student_id =  $admission->student_id;
            $student_education->last_class_id = $validatedData['last_class_id'];
            $student_education->percentage = $validatedData['percentage'];
            $student_education->sgpa = $validatedData['sgpa'];
            $student_education->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Student Education Updated Successfully !!"
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

    public function softdelete($id)
    {
        $student_education = StudentEducation::find($id);
        if($student_education){
            $student_education->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Student Education Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function restore($id)
    {
        $student_education = StudentEducation::withTrashed()->find($id);
        if($student_education){
            $student_education->restore();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Student Education Restored Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function delete()
    {
        $student_education = StudentEducation::withTrashed()->find($this->delete_id);
        if($student_education){
            $student_education->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Student Education Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function render()
    {
        if (is_numeric($this->sgpa) && $this->sgpa > 0) {
            $this->percentage = (($this->sgpa * 10) - 7.5);
        }
        $academicyears=AcademicYear::select('id','year')->where('status',0)->orderBy('year', 'DESC')->get();

        $admissions=Admission::select('id','student_id')->where('academic_year_id',$this->academic_year_id)->orderBy('academic_year_id', 'DESC')->get();

        // $students=Student::where('status',0)->where('id',$this->academic_year_id)->orderBy('name', 'ASC')->get();


        $classes=Classes::select('id','name')->where('status',0)->orderBy('name', 'ASC')->get();





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
        $student_educations = $query->withTrashed()->paginate($this->per_page);
        return view('livewire.backend.student-education.all-student-education',compact('admissions','classes','academicyears','student_educations'))->extends('layouts.admin.admin')->section('admin');
    }

}
