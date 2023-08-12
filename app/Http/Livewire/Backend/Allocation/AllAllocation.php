<?php

namespace App\Http\Livewire\Backend\Allocation;

use App\Models\Bed;
use App\Models\Fee;
use App\Models\Classes;
use App\Models\Student;
use Livewire\Component;
use App\Models\Allocation;
use App\Models\AcademicYear;
use Livewire\WithPagination;

class AllAllocation extends Component
{   
    use WithPagination;
    public $a = '',$s = '',$c = '';
    public $per_page = 10;
    public $mode='all';
    public $admission_id;
    public $bed_id;
    public $fee_id;
    public $c_id;


    public function resetinput()
    {
        $this->a=null;
        $this->s=null;
        $this->c=null;
        $this->c_id=null;
        $this->bed_id=null;
        $this->fee_id=null;
    }
 
    protected $rules = [
        'class_id' => ['required','integer'],
        'fee_id' => ['required','integer'],
        'bed_id' => ['required','integer'],
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
        $allocation= new Allocation;
        $allocation->academic_year_id = $validatedData['academic_year_id'];
        $allocation->bed_id = $validatedData['bed_id'];
        $allocation->student_id = $validatedData['student_id'];
        $allocation->class_id = $validatedData['class_id'];
        $allocation->fee_id = $validatedData['fee_id'];
        $allocation->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Allocation Created Successfully!!"
        ]);
    }

    public function allocate($id)
    {   
        $this->alloacteid=$id;
        $this->setmode('allocate');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $allocation = Allocation::find($id);
        $allocation->academic_year_id = $validatedData['academic_year_id'];
        $allocation->bed_id = $validatedData['bed_id'];
        $allocation->student_id = $validatedData['student_id'];
        $allocation->class_id = $validatedData['class_id'];
        $allocation->fee_id = $validatedData['fee_id'];
        $allocation->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Allocation Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $allocation = Allocation::find($id);
        $allocation->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Allocation Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $academicyears=AcademicYear::where('status',0)->orderBy('year', 'DESC')->get();
        $classes=Classes::where('status',0)->orderBy('name', 'ASC')->get();
        $beds=Bed::where('status',0)->get();
        $fees=Fee::where('status',0)->get();
        $students=Student::where('status',0)->orderBy('name', 'ASC')->get();
        $query =Allocation::orderBy('student_id', 'ASC');    
       
        $allocations =Allocation::paginate($this->per_page);
        return view('livewire.backend.allocation.all-allocation',compact('fees','beds','allocations'))->extends('layouts.admin')->section('admin');
    }

}
