<?php

namespace App\Http\Livewire\Frontend\StudentNightOut;

use App\Models\Student;
use Livewire\Component;
use App\Models\NightOut;
use App\Models\Admission;
use App\Models\Allocation;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class StudentNightOut extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $year = '';
    public $class_name = '';
    public $student_name='';
    public $per_page = 10;
    public $mode='all';
    public $reason;
    public $going_date;
    public $comming_date;
    public $allocation_id;
    public $status;
    public $c_id;
    public $current_id;
    public $student_id;

    protected function rules()
    {
        return [
            'going_date' => ['required', 'date'],
            'comming_date' => ['required', 'date'],
            'reason' => ['required','string','max:2000'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->year=null;
        $this->class_name=null;
        $this->student_name=null;
        $this->student_id=null;
        $this->reason=null;
        $this->going_date=null;
        $this->comming_date=null;
        $this->allocation_id=null;
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
        $studentlocalregister= new NightOut;
        if($studentlocalregister){
            $admission = Admission::where('student_id', $this->student_id)->latest()->first();
            $allocation=Allocation::where('admission_id', $admission->id)->first();
            $studentlocalregister->allocation_id = $allocation->id;
            $studentlocalregister->reason = $validatedData['reason'];
            $studentlocalregister->going_date =  $validatedData['going_date'];
            $studentlocalregister->comming_date = $validatedData['comming_date'];
            $studentlocalregister->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Student Night Out Entry Created Successfully !!"
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
        $this->current_id=$id;
        $studentlocalregister = NightOut::find($id);
        if($studentlocalregister){
            $this->c_id=$studentlocalregister->id;
            $this->allocation_id=$studentlocalregister->allocation_id;
            $this->reason = $studentlocalregister->reason;
            $this->going_date = date('Y-m-d', strtotime($studentlocalregister->going_date));
            $this->comming_date =date('Y-m-d', strtotime($studentlocalregister->comming_date));
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
        $studentlocalregister = NightOut::find($id);
        if($studentlocalregister){
            $admission = Admission::where('student_id', $this->student_id)->latest()->first();
            $allocation=Allocation::where('admission_id', $admission->id)->first();
            $studentlocalregister->allocation_id = $allocation->id;
            $studentlocalregister->reason = $validatedData['reason'];
            $studentlocalregister->going_date = $validatedData['going_date'];
            $studentlocalregister->comming_date =$validatedData['comming_date'];
            $studentlocalregister->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Student Night Out Entry Updated Successfully !!"
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
        $studentlocalregister = NightOut::find($this->delete_id);
        if($studentlocalregister){
            $studentlocalregister->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Studen tLocal Register Deleted Successfully !!"
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
        $student = Student::find($this->student_id=Auth::user()->id);

        $allocation_ids = [];

        foreach ($student->admissions as $key => $admission) 
        {
            if(isset($admission->allocation->id))
            {
                $allocation_ids[$key] = $admission->allocation->id; 
            } 
        }
        
        $night_out = NightOut::query()->whereIn('allocation_id',$allocation_ids)->paginate($this->per_page);
    
        return view('livewire.frontend.student-night-out.student-night-out',compact('night_out'))->extends('layouts.student.student')->section('student');
    }
}
