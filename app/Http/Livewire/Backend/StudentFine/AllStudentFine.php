<?php

namespace App\Http\Livewire\Backend\StudentFine;

use App\Models\Fine;
use App\Models\Student;
use Livewire\Component;
use App\Models\StudentFine;
use App\Models\AcademicYear;
use Livewire\WithPagination;

class AllStudentFine extends Component
{   

    use WithPagination;
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

    public function resetinput()
    {
        $this->year =null;
        $this->fine_name =null;
        $this->student_name =null;
        $this->mode=null;
        $this->amount=null;
        $this->academic_year_id=null;
        $this->fine_id=null;
        $this->student_id=null;
        $this->status=null;
        $this->c_id=null;
    }
 
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Fine Created Successfully!!"
        ]);
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Fine Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $studentfine = StudentFine::find($id);
        $studentfine->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Fine Deleted Successfully!!"
        ]);
    }


    public function updatingSearch()
    {
        $this->resetPage();
    } 

    public function render()
    {   
        $academic_years=AcademicYear::where('status',0)->orderBy('year', 'DESC')->get();
        $students=Student::where('status',0)->get();
        $fines=Fine::where('status',0)->get();
        $query = StudentFine::orderBy('academic_year_id', 'DESC');
        if ($this->year) {
            $AcademicYearid = AcademicYear::where('year', 'like', '%' . $this->year . '%')->pluck('id');
            $query->whereIn('academic_year_id', $AcademicYearid);
        }
        if ($this->student_name) {
            $Studentid = Student::where('name', 'like', '%' . $this->student_name . '%')->pluck('id');
            $query->whereIn('student_id', $Studentid);
        }
        if ($this->fine_name) {
            $fineid = Fine::where('name', 'like', '%' . $this->fine_name . '%')->pluck('id');
            $query->whereIn('fine_id', $fineid);
        }
        $student_fines = $query->paginate($this->per_page);
        return view('livewire.backend.student-fine.all-student-fine',compact('academic_years','students','fines','student_fines'))->extends('layouts.admin')->section('admin');
    }
}
