<?php

namespace App\Http\Livewire\Backend\Qutota;

use App\Models\Quota;
use App\Models\Classes;
use Livewire\Component;
use App\Models\AcademicYear;
use Livewire\WithPagination;

class AllQuota extends Component
{   

    use WithPagination;
    public $year = '';
    public $class_name = '';
    public $per_page = 10;
    public $mode='all';
    public $max_capacity;
    public $academic_year_id;
    public $class_id;
    public $status;
    public $c_id;

    public function resetinput()
    {
        $this->year=null;
        $this->class_name=null;
        $this->max_capacity=null;
        $this->class_id=null;
        $this->academic_year_id=null;
        $this->status=null;
        $this->c_id=null;
    }
 
    protected $rules = [
        'max_capacity' => ['required','integer','min:0'],
        'academic_year_id' => ['required','integer'],
        'class_id' => ['required','integer'],
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
        $quota= new Quota;
        $quota->academic_year_id = $validatedData['academic_year_id'];
        $quota->class_id = $validatedData['class_id'];
        $quota->max_capacity = $validatedData['max_capacity'];
        $quota->status = $this->status==1?1:0;
        $quota->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Quota Created Successfully!!"
        ]);
    }

    public function edit($id)
    {   
        $quota = Quota::find($id);
        $this->C_id=$quota->id;
        $this->academic_year_id=$quota->academic_year_id;
        $this->class_id=$quota->class_id;
        $this->max_capacity = $quota->max_capacity;
        $this->status = $quota->status;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $quota = Quota::find($id);
        $quota->academic_year_id = $validatedData['academic_year_id'];
        $quota->class_id = $validatedData['class_id'];
        $quota->max_capacity = $validatedData['max_capacity'];
        $quota->status = $this->status==1?'1':'0';
        $quota->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Quota Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $quota = Quota::find($id);
        $quota->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Quota Deleted Successfully!!"
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    } 

    public function render()
    {  
        $academic_years=AcademicYear::where('status',0)->orderBy('year', 'DESC')->get();
        $classes=Classes::where('status',0)->get();   
        $query = Quota::orderBy('academic_year_id', 'DESC');
        if ($this->year) {
            $AcademicYearid = AcademicYear::where('year', 'like', '%' . $this->year . '%')->pluck('id');
            $query->whereIn('academic_year_id', $AcademicYearid);
        }
        if ($this->class_name) {
            $Studentid = Classes::where('name', 'like', '%' . $this->class_name . '%')->pluck('id');
            $query->whereIn('class_id', $Studentid);
        }
        $quotas = $query->paginate($this->per_page);
        return view('livewire.backend.qutota.all-quota',compact('quotas','classes','academic_years'))->extends('layouts.admin')->section('admin');
    }

}
