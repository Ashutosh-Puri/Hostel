<?php

namespace App\Http\Livewire\Backend\Fine;

use App\Models\Fine;
use Livewire\Component;
use App\Models\AcademicYear;

class AllFine extends Component
{   
    public $mode='', $fines ,$academic_years;
    public $name;
    public $amount;
    public $academic_year_id;
    public $status;
    public $c_id;
 
    protected $rules = [
        'amount' => ['required','integer'],
        'name' => ['required','string'],
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
        $fine= new Fine;
        $fine->academic_year_id = $validatedData['academic_year_id'];
        $fine->name = $validatedData['name'];
        $fine->amount = $validatedData['amount'];
        $fine->status = $this->status==1?1:0;
        $fine->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Fine Created Successfully!!"
        ]);
        $this->setmode('');
    }

    public function edit($id)
    {   
        $fine = Fine::find($id);
        $this->C_id=$fine->id;
        $this->academic_year_id=$fine->academic_year_id;
        $this->name = $fine->name;
        $this->amount = $fine->amount;
        $this->status = $fine->status;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $fine = Fine::find($id);
        $fine->academic_year_id = $validatedData['academic_year_id'];
        $fine->name = $validatedData['name'];
        $fine->amount = $validatedData['amount'];
        $fine->status = $this->status==1?'1':'0';
        $fine->update();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Fine Updated Successfully!!"
        ]);
        $this->setmode('');
    }

    public function delete($id)
    { 
        $fine = Fine::find($id);
        $fine->delete();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Fine Deleted Successfully!!"
        ]);
        $this->setmode('');
    }

    public function render()
    {   $this->academic_years=AcademicYear::where('status',0)->get();
        $this->fines=Fine::all();
        return view('livewire.backend.fine.all-fine')->extends('layouts.admin')->section('admin');
    }

}
