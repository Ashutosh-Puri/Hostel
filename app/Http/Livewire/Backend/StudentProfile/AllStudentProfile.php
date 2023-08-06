<?php

namespace App\Http\Livewire\Backend\StudentProfile;

use App\Models\Student;
use Livewire\Component;
use App\Models\StudentProfile;

class AllStudentProfile extends Component
{
    public $mode='',$student_profiles ,$students ;
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
        $this->c_id = null;
        $this->student_id = null;
        $this->mother_name = null;
        $this->dob = null;
        $this->cast = null;
        $this->category = null;
        $this->parent_name = null;
        $this->parent_mobile = null;
        $this->parent_address = null;
        $this->local_parent_name = null;
        $this->local_parent_mobile = null;
        $this->local_parent_address = null;
        $this->address_type = null;
        $this->blood_group = null;
        $this->is_allergy = null;
        $this->is_ragging = null;
    }
 
    protected $rules = [
        'student_id'=> ['required','integer'],
        'mother_name'=> ['required','string'],
        'dob'=> ['required','string'],
        'cast' => ['required','string'],
        'category' => ['required','string'],
        'parent_name' => ['required','string'],
        'parent_mobile' => ['required','integer','digits:10'],
        'parent_address' => ['required','string'],
        'local_parent_name' => ['nullable','string'],
        'local_parent_mobile' => ['nullable','integer','digits:10'],
        'local_parent_address' => ['nullable','string'],
        'blood_group' => ['required','string'],
        'is_allergy' => ['nullable','string'],
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
        $studentprofile= new StudentProfile;
        $studentprofile->student_id=$validatedData['student_id'];
        $studentprofile->dob=$validatedData['dob'];
        $studentprofile->cast=$validatedData['cast'];
        $studentprofile->category=$validatedData['category'];
        $studentprofile->parent_name=$validatedData['parent_name'];
        $studentprofile->blood_group=$validatedData['blood_group'];
        $studentprofile->mother_name=$validatedData['mother_name'];
        $studentprofile->parent_mobile=$validatedData['parent_mobile'];
        $studentprofile->parent_address=$validatedData['parent_address'];
        $studentprofile->local_parent_name=$validatedData['local_parent_name'];
        $studentprofile->local_parent_mobile=$validatedData['local_parent_mobile'];
        $studentprofile->local_parent_address=$validatedData['local_parent_address'];
        $studentprofile->is_allergy = $validatedData['is_allergy'];
        $studentprofile->address_type=$this->address_type==1?'1':'0';
        $studentprofile->is_ragging = $this->is_ragging==1?'1':'0';
        $studentprofile->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Profile Created Successfully!!"
        ]);
        $this->resetinput();
        $this->setmode('');
    }

    public function edit($id)
    {   
        $studentprofile = StudentProfile::find($id);
        $this->C_id=$studentprofile->id;
        $this->student_id=$studentprofile->student_id;
        $this->dob=$studentprofile->dob;
        $this->cast=$studentprofile->cast;
        $this->category=$studentprofile->category;
        $this->parent_name=$studentprofile->parent_name;
        $this->blood_group=$studentprofile->blood_group;
        $this->mother_name=$studentprofile->mother_name;
        $this->address_type=$studentprofile->address_type;
        $this->parent_mobile=$studentprofile->parent_mobile;
        $this->parent_address=$studentprofile->parent_address;
        $this->local_parent_name=$studentprofile->local_parent_name;
        $this->local_parent_mobile=$studentprofile->local_parent_mobile;
        $this->local_parent_address=$studentprofile->local_parent_address;
        $this->is_allergy=$studentprofile->is_allergy;
        $this->is_ragging=$studentprofile->is_ragging;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $studentprofile = StudentProfile::find($id);
        $studentprofile->student_id=$validatedData['student_id'];
        $studentprofile->dob=$validatedData['dob'];
        $studentprofile->cast=$validatedData['cast'];
        $studentprofile->category=$validatedData['category'];
        $studentprofile->parent_name=$validatedData['parent_name'];
        $studentprofile->blood_group=$validatedData['blood_group'];
        $studentprofile->mother_name=$validatedData['mother_name'];
        $studentprofile->parent_mobile=$validatedData['parent_mobile'];
        $studentprofile->parent_address=$validatedData['parent_address'];
        $studentprofile->local_parent_name=$validatedData['local_parent_name'];
        $studentprofile->local_parent_mobile=$validatedData['local_parent_mobile'];
        $studentprofile->local_parent_address=$validatedData['local_parent_address'];
        $studentprofile->is_allergy = $validatedData['is_allergy'];
        $studentprofile->address_type=$this->address_type==1?'1':'0';
        $studentprofile->is_ragging = $this->is_ragging==1?'1':'0';
        $studentprofile->update();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Profile Updated Successfully!!"
        ]);
        $this->resetinput();
        $this->setmode('');
    }

    public function delete($id)
    { 
        $studentprofile = StudentProfile::find($id);
        $studentprofile->delete();      
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Profile Deleted Successfully!!"
        ]);
        $this->setmode('');
    }


    public function render()
    {   
       

        $this->students=Student::all();
        $this->student_profiles=StudentProfile::latest()->get();
        return view('livewire.backend.student-profile.all-student-profile')->extends('layouts.admin')->section('admin');
    }
}
