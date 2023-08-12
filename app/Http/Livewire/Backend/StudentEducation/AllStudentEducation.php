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
 
    protected $rules = [
        'student_id' => ['required','integer'],
        'academic_year_id' => ['required','integer'],
        'last_class_id' => ['required','integer'],
        'admission_id' => ['required','integer'],
        'sgpa' => ['required','numeric','min:0.00','max:10.00'],
        'percentage' => ['required','numeric','min:0','max:100'],
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
        $student_education= new StudentEducation;
        $student_education->admission_id = $validatedData['admission_id'];
        $student_education->academic_year_id = $validatedData['academic_year_id'];
        $student_education->student_id = $validatedData['student_id'];
        $student_education->last_class_id = $validatedData['last_class_id'];
        $student_education->percentage = $validatedData['percentage'];
        $student_education->sgpa = $validatedData['sgpa'];
        $student_education->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Education Created Successfully!!"
        ]);
    }

    public function edit($id)
    {   
        $student_education = StudentEducation::find($id);
        $this->C_id=$student_education->id;
        $this->academic_year_id = $student_education->academic_year_id;
        $this->admission_id = $student_education->admission_id;
        $this->student_id = $student_education->student_id;
        $this->last_class_id =  $student_education->last_class_id;
        $this->percentage = $student_education->percentage;
        $this->sgpa = $student_education->sgpa;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $student_education = StudentEducation::find($id);
        $student_education->academic_year_id = $validatedData['academic_year_id'];
        $student_education->admission_id = $validatedData['admission_id'];
        $student_education->student_id = $validatedData['student_id'];
        $student_education->last_class_id = $validatedData['last_class_id'];
        $student_education->percentage = $validatedData['percentage'];
        $student_education->sgpa = $validatedData['sgpa'];
        $student_education->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Education Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $student_education = StudentEducation::find($id);
        $student_education->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Education Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $academicyears=AcademicYear::where('status',0)->orderBy('year', 'DESC')->get();
        $classes=Classes::where('status',0)->orderBy('name', 'ASC')->get();
        $admissions=Admission::orderBy('academic_year_id', 'DESC')->get();

        $students=Student::where('status',0)->orderBy('name', 'ASC')->get();
        $query =StudentEducation::orderBy('student_id', 'ASC');    
        if ($this->ad) {
            $admissionIds = Admission::where('id', 'like', '%' . $this->ad. '%')->pluck('id');
            $query->whereIn('admission_id', $admissionIds);
        }
        if ($this->a) {
            $academicyearIds = AcademicYear::where('status', 0)->where('year', 'like', '%' . $this->a. '%')->pluck('id');
            $query->whereIn('academic_year_id', $academicyearIds);
        }  
        if ($this->s) {
            $studentIds = Student::where('status', 0)->where('name', 'like', '%' . $this->s. '%')->pluck('id');
            $query->whereIn('student_id', $studentIds);
        }
        if ($this->c) {
            $classIds = Classes::where('status', 0)->where('name', 'like', '%' . $this->c. '%')->pluck('id');
            $query->whereIn('last_class_id', $classIds);
        }
        $student_educations = $query->paginate($this->per_page);
        return view('livewire.backend.student-education.all-student-education',compact('admissions','classes','academicyears','student_educations','students'))->extends('layouts.admin')->section('admin');
    }

}
