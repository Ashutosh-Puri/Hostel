<?php

namespace App\Http\Livewire\Backend\Fee;

use App\Models\Fee;
use Livewire\Component;
use App\Models\AcademicYear;

class AllFee extends Component
{   
    public $mode='', $fees ,$academic_years;
    public $type;
    public $academic_year_id;
    public $status;
    public $c_id;
 
    protected $rules = [
        'type' => ['required','integer'],
        'academic_year_id' => ['required','integer'],
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
        $fee= new Fee;
        $fee->academic_year_id = $validatedData['academic_year_id'];
        $fee->type = $validatedData['type'];
        $fee->status = $this->status==1?1:0;
        $fee->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Fee Created Successfully!!"
        ]);
        $this->setmode('');
    }

    public function edit($id)
    {   
        $fee = Fee::find($id);
        $this->C_id=$fee->id;
        $this->academic_year_id=$fee->academic_year_id;
        $this->type = $fee->type;
        $this->status = $fee->status;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $fee = Fee::find($id);
        $fee->academic_year_id = $validatedData['academic_year_id'];
        $fee->type = $validatedData['type'];
        $fee->status = $this->status==1?'1':'0';
        $fee->update();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Fee Updated Successfully!!"
        ]);
        $this->setmode('');
    }

    public function delete($id)
    { 
        $fee = Fee::find($id);
        $fee->delete();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Fee Deleted Successfully!!"
        ]);
        $this->setmode('');
    }

    public function render()
    {   $this->academic_years=AcademicYear::where('status',0)->get();
        $this->fees=Fee::all();
        return view('livewire.backend.fee.all-fee')->extends('layouts.admin')->section('admin');
    }

}
