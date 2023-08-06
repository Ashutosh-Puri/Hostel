<?php

namespace App\Http\Livewire\Backend\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class AllStudent extends Component
{   
    use WithFileUploads;
    public $mode='', $students ;
    public $c_id;
    public $status;
    public $name;
    public $email;
    public $password;
    public $mobile;
    public $photo;
    public $member_id;
    public $prn;
    public $abc_id;
    public $eligibility_no;
 
    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'], 
        'password' => ['required','string', 'min:8', 'max:255'],
        'mobile' => ['nullable', 'integer', 'digits:10'], 
        'photo' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:1024'],
        'member_id' => ['nullable', 'integer',], 
        'prn' => ['nullable', 'integer', ],
        'abc_id' => ['nullable', 'integer', ],
        'eligibility_no' => ['nullable', 'integer'], 
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
        $student= new Student;
        $student->name = $validatedData['name'];
        $student->email= $validatedData['email'];
        $student->password= Hash::make($validatedData['password']);
        $student->mobile= $validatedData['mobile'];
        $student->member_id= $validatedData['member_id'];
        $student->prn= $validatedData['prn'];
        $student->abc_id= $validatedData['abc_id'];
        $student->eligibility_no= $validatedData['eligibility_no'];
        $student->status = $this->status==1?'1':'0';
        if($this->photo)
        {   $path='uploads/profile/photo/';
            $FileName = 'user-'.now()->format('Y-m-d').'.'.$this->photo->getClientOriginalExtension();
            $this->photo->storeAs($path,$FileName,'public');
            $student->photo='storage/'.$path.$FileName ;
            $this->reset('photo');
        }
        $student->save();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Created Successfully!!"
        ]);
        $this->setmode('');
    }

    public function edit($id)
    {   
        $student = Student::find($id);
        $this->C_id=$student->id;
        $this->name=$student->name;
        $this->email=$student->email;
        $this->mobile=$student->mobile;
        $this->member_id=$student->member_id;
        $this->prn=$student->prn;
        $this->abc_id=$student->abc_id;
        $this->eligibility_no=$student->eligibility_no;
        $this->status =$student->status;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $student = Student::find($id);
        $student->name = $validatedData['name'];
        $student->email= $validatedData['email'];
        $student->password= Hash::make($validatedData['password']);
        $student->mobile= $validatedData['mobile'];
        $student->member_id= $validatedData['member_id'];
        $student->prn= $validatedData['prn'];
        $student->abc_id= $validatedData['abc_id'];
        $student->eligibility_no= $validatedData['eligibility_no'];
        $student->status = $this->status==1?'1':'0';
        if($this->photo)
        {   $path='uploads/profile/photo/';
            $FileName = 'user-'.now()->format('Y-m-d').'.'.$this->photo->getClientOriginalExtension();
            $this->photo->storeAs($path,$FileName,'public');
            $student->photo='storage/'.$path.$FileName ;
            $this->reset('photo');
        }
        $student->update();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Updated Successfully!!"
        ]);
        $this->setmode('');
    }

    public function delete($id)
    { 
        $student = Student::find($id);
        $student->delete();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Deleted Successfully!!"
        ]);
        $this->setmode('');
    }

    public function render()
    {   
        $this->students=Student::latest()->get();
        return view('livewire.backend.student.all-student')->extends('layouts.admin')->section('admin');
    }

}
