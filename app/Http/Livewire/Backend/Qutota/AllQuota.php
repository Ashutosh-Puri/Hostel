<?php

namespace App\Http\Livewire\Backend\Qutota;

use App\Models\Quota;
use App\Models\Classes;
use Livewire\Component;
use App\Models\AcademicYear;

class AllQuota extends Component
{   
    public $mode='', $quotas ,$academic_years,$classes;
    public $max_capacity;
    public $academic_year_id;
    public $class_id;
    public $status;
    public $c_id;
 
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
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Quota Created Successfully!!"
        ]);
        $this->setmode('');
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
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Quota Updated Successfully!!"
        ]);
        $this->setmode('');
    }

    public function delete($id)
    { 
        $quota = Quota::find($id);
        $quota->delete();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Quota Deleted Successfully!!"
        ]);
        $this->setmode('');
    }

    public function render()
    {   $this->academic_years=AcademicYear::where('status',0)->get();
        $this->classes=Classes::where('status',0)->get();
        $this->quotas=Quota::all();
        return view('livewire.backend.qutota.all-quota')->extends('layouts.admin')->section('admin');
    }

}
