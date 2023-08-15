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
            'amount' => ['required','integer'],
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
            $studentfine->amount = $validatedData['amount'];
            $studentfine->status = $this->status==1?1:0;
            $studentfine->save();
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Fine Created Successfully!!"
        ]);
    }

    public function edit($id)
    {
        $this->current_id=$id;
        $studentfine = StudentFine::find($id);
        if($studentfine){
            $this->C_id=$studentfine->id;
            $this->academic_year_id=$studentfine->academic_year_id;
            $this->student_id = $studentfine->student_id;
            $this->fine_id = $studentfine->fine_id;
            $this->amount = $studentfine->amount;
            $this->status = $studentfine->status;
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }

        $this->setmode('edit');
    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $studentfine = StudentFine::find($id);
        if($studentfine){
            $studentfine->academic_year_id = $validatedData['academic_year_id'];
            $studentfine->student_id = $validatedData['student_id'];
            $studentfine->fine_id = $validatedData['fine_id'];
            $studentfine->amount = $validatedData['amount'];
            $studentfine->status = $this->status==1?'1':'0';
            $studentfine->update();
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Fine Updated Successfully!!"
        ]);
    }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');

    }

    public function delete()
    {
        $studentfine = StudentFine::find($this->delete_id);
        if($studentfine){
            $studentfine->delete();
            $this->delete_id=null;
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Fine Deleted Successfully!!"
        ]);
    }

    public function render()
    {
        $academic_years=AcademicYear::where('status',0)->orderBy('year', 'DESC')->get();
        $students=Student::where('status',0)->get();
        $fines=Fine::where('status',0)->get();
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
        $student_fines = $query->paginate($this->per_page);
        return view('livewire.backend.student-fine.all-student-fine',compact('academic_years','students','fines','student_fines'))->extends('layouts.admin.admin')->section('admin');
    }
}
