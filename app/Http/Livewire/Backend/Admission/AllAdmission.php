<?php

namespace App\Http\Livewire\Backend\Admission;

use App\Models\Student;
use Livewire\Component;
use App\Models\Admission;
use Livewire\WithPagination;

class AllAdmission extends Component
{   
    use WithPagination;
    public $student_name = '';
    public $per_page = 10;
    public $mode='add';
    public $c_id;
    public $student_id;
    public $mother_name;
    public $dob;
    public $cast;
    public $category;
    public $parent_name;
    public $parent_mobile;
    public $parent_address;
    public $local_parent_name;
    public $local_parent_mobile;
    public $local_parent_address;
    public $address_type;
    public $blood_group;
    public $is_allergy;
    public $is_ragging;

    public function resetinput()
    {
        $this->name=null;
        $this->c_id=null;
        $this->student_name =null;
    }
 
    protected $rules = [
        'name' => ['required','string'],
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
        $admission= new Admission;
        $admission->name = $validatedData['name'];
        $admission->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Admission Created Successfully!!"
        ]);
    }

    public function edit($id)
    {   
        $admission = Admission::find($id);
        $this->C_id=$admission->id;
        $this->name=$admission->name;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $admission = Admission::find($id);
        $admission->name = $validatedData['name'];
        $admission->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Admission Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $admission = Admission::find($id);
        $admission->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Admission Deleted Successfully!!"
        ]);
    }


    public function render()
    {   
        // $rooms=Room::orderBy('floor', 'ASC')->get();
        // $query = Admission::orderBy('room_id', 'ASC');
        // if ($this->search) {
        //     $roomIds = Room::where('label', 'like', '%' . $this->search . '%')->pluck('id');
        //     $query->whereIn('room_id', $roomIds);
        // }
        // $admissions = $query->paginate($this->per_page);
        $admissions =Admission::orderBy('name', 'ASC')->paginate($this->per_page);
        return view('livewire.backend.Admission.all-Admission',compact('admissions','students'))->extends('layouts.admin')->section('admin');
    }
}
