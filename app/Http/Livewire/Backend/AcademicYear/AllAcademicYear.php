<?php

namespace App\Http\Livewire\Backend\AcademicYear;

use Livewire\Component;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllAcademicYear extends Component
{   
    use WithPagination;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $year;
    public $status;
    public $c_id;

    public function resetinput()
    {
       $this->year=null;
       $this->status=null;
       $this->c_id=null;
       $this->search =null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }
 
    public function save()
    {   
        $validatedData=$this->validate([
            'year' => 'required|digits:4|integer|min:1900|unique:academic_years,year',
        ]);

        $academicyear= new AcademicYear;
        $academicyear->year = $validatedData['year'];
        $academicyear->status = $this->status==1?1:0;
        $academicyear->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Academic Year Created Successfully!!"
        ]);
    }

    public function edit($id)
    { 
        $academicyear = AcademicYear::find($id);
        $this->C_id=$academicyear->id;
        $this->year = $academicyear->year;
        $this->status = $academicyear->status;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData=$this->validate([
            'year' => [
                'required',
                'digits:4',
                'integer',
                'min:1900',
                Rule::unique('academic_years', 'year')->ignore($this->year, 'year'),
            ],
        ]);
        $academicyear = AcademicYear::find($id);
        $academicyear->year = $validatedData['year'];
        $academicyear->status = $this->status==1?'1':'0';
        $academicyear->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Academic Year Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $academicyear = AcademicYear::find($id);
        $academicyear->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Academic Year Deleted Successfully!!"
        ]);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {   
        $academicyear=AcademicYear::where('year', 'like', '%'.$this->search.'%')->orderBy('year', 'DESC')->paginate($this->per_page);
        return view('livewire.backend.academic-year.all-academic-year',compact('academicyear'))->extends('layouts.admin')->section('admin');
    }
}
