<?php

namespace App\Http\Livewire\Backend\Fee;

use App\Models\Fee;
use Livewire\Component;
use App\Models\AcademicYear;
use Livewire\WithPagination;

class AllFee extends Component
{   

    use WithPagination;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $type;
    public $academic_year_id;
    public $status;
    public $c_id;

    public function resetinput()
    {
        $this->search=null;
        $this->academic_year_id=null;
        $this->type=null;
        $this->status=null;
        $this->c_id=null;
    }
 
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Fee Created Successfully!!"
        ]); 
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
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Fee Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $fee = Fee::find($id);
        $fee->delete();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Fee Deleted Successfully!!"
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }  

    public function render()
    {   
        $academic_years=AcademicYear::where('status',0)->orderBy('year', 'DESC')->get();
        $query = Fee::orderBy('academic_year_id', 'ASC');
        if ($this->search) {
            $roomIds = AcademicYear::where('year', 'like', '%' . $this->search . '%')->pluck('id');
            $query->whereIn('academic_year_id', $roomIds);
        }
        $fees = $query->paginate($this->per_page);
        return view('livewire.backend.fee.all-fee',compact('academic_years','fees'))->extends('layouts.admin')->section('admin');
    }
}
