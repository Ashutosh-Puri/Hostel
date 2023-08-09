<?php

namespace App\Http\Livewire\Backend\Fine;

use App\Models\Fine;
use Livewire\Component;
use App\Models\AcademicYear;
use Livewire\WithPagination;

class AllFine extends Component
{   
    use WithPagination;
    public $year = '';
    public $fine_name = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $amount;
    public $academic_year_id;
    public $status;
    public $c_id;

    public function resetinput()
    {
        $this->year=null;
        $this->fine_name=null;
        $this->type=null;
        $this->name=null;
        $this->amount=null;
        $this->academic_year_id=null;
        $this->status=null;
        $this->c_id=null;
    }
 
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Fine Created Successfully!!"
        ]);
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Fine Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $fine = Fine::find($id);
        $fine->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Fine Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $academic_years=AcademicYear::where('status',0)->orderBy('year', 'DESC')->get();
        $query = Fine::orderBy('academic_year_id', 'DESC');
        if ($this->year) {
            $roomIds = AcademicYear::where('year', 'like', '%' . $this->year . '%')->pluck('id');
            $query->whereIn('academic_year_id', $roomIds);
        }
        $fines = $query->where('name', 'like', '%' . $this->fine_name . '%')->paginate($this->per_page);
        return view('livewire.backend.fine.all-fine',compact('academic_years','fines'))->extends('layouts.admin')->section('admin');
    }

}
