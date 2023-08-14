<?php

namespace App\Http\Livewire\Backend\AcademicYear;

use Livewire\Component;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AllAcademicYear extends Component
{   
    use WithPagination;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $year;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'year' => ['required', 'digits:4', 'integer','min:1900','unique:academic_years,year,'.($this->mode=='edit'? $this->current_id :'')]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
       $this->year=null;
       $this->status=null;
       $this->c_id=null;
       $this->search =null;
       $this->current_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }
 
    public function save()
    {   
        $validatedData=$this->validate();
        $academicyear= new AcademicYear;
        if($academicyear){
            $academicyear->year = $validatedData['year'];
            $academicyear->status = $this->status==1?1:0;
            $academicyear->save();
        }
        else{

            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Academic Year Created Successfully!!"
        ]);
    }

    public function edit($id)
    {   
        $this->current_id=$id;
        $academicyear = AcademicYear::find($id);
        if($academicyear)
        {
            $this->C_id=$academicyear->id;
            $this->year = $academicyear->year;
            $this->status = $academicyear->status;
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
        $validatedData=$this->validate();
        $academicyear = AcademicYear::find($id);
        if($academicyear)
        {
            $academicyear->year = $validatedData['year'];
            $academicyear->status = $this->status==1?'1':'0';
            $academicyear->update();

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
            'message'=>"Academic Year Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $academicyear = AcademicYear::find($id);
        if($academicyear)
        {
            $academicyear->delete();
            
        }else{

            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Academic Year Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $academicyear=AcademicYear::where('year', 'like', '%'.$this->search.'%')->orderBy('year', 'DESC')->paginate($this->per_page);
        return view('livewire.backend.academic-year.all-academic-year',compact('academicyear'))->extends('layouts.admin.admin')->section('admin');
    }
}
