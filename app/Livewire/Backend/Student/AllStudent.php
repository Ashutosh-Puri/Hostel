<?php

namespace App\Livewire\Backend\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AllStudent extends Component
{
    use WithFileUploads;
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $name_search = '';
    public $per_page = 10;
    public $mode='all';
    public $c_id;
    public $status;
    public $s_name="";
    public $username;
    public $email;
    public $password;
    public $current_id;
    public $rfid;
    public $password_confirmation;

    public function resetinput()
    {
        $this->s_name=null;
        $this->password=null;
        $this->password_confirmation=null;
        $this->email=null;
        $this->username=null;
        $this->status=null;
        $this->c_id=null;
        $this->rfid=null;
    }

    protected function rules()
    {
        $passwordRules = $this->mode == 'add' ? ['required', 'same:password_confirmation', 'string', 'min:8', 'max:255'] : [];
        $rfidRule = $this->mode == 'rfid' ? ['required','string'] : [];
        return [
            'rfid'=>$rfidRule,
            'password' => $passwordRules,
            'username' => [($this->mode == 'rfid' ?'nullable':'required'), 'string', 'max:255'],
            'email' => [ ($this->mode == 'rfid' ?'nullable':'required'), 'string', 'email', 'max:255','unique:students,email,'.($this->mode=='edit'? $this->current_id  :'')],
        ];
    }

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
        if($student){
            $student->username = $validatedData['username'];
            $student->email= $validatedData['email'];
            $student->password= Hash::make($validatedData['password']);
            $student->status = $this->status==1?'1':'0';
            $student->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Created Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(Student $student)
    {   $this->current_id=$student->id;
        if($student){
            $this->c_id=$student->id;
            $this->username=$student->username;
            $this->email=$student->email;
            $this->status =$student->status;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Student $student)
    {
        $validatedData = $this->validate();
        if($student){
            $student->username = $validatedData['username'];
            $student->email= $validatedData['email'];
            $student->status = $this->status==1?'1':'0';
            $student->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Updated Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Student $student)
    {
        if($student){
            $student->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Deleted Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $student = Student::withTrashed()->find($id);
        if($student){
            $student->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Restored Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $student = Student::withTrashed()->find($this->delete_id);
        if($student){
            if($student->photo)
            {
                File::delete($student->photo);
            }
            $student->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Deleted Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Student $student)
    {
        if($student->status==1)
        {
            $student->status=0;
        }else
        {
            $student->status=1;
        }
        $student->update();
    }
    public function assign_rfid($id)
    {
        $this->c_id=$id;
        $this->s_name = Student::find($id);
        $this->setmode('rfid');
    }


    public function save_rfid($id)
    {
        $this->validate();
        $student = Student::find($id);
        if($student)
        {
            $student->rfid=$this->rfid;
            $student->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'RFID Assigend Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function render()
    {   
        if($this->mode=='all')
        {
            $this->resetinput();
        }
        
        $students = Student::query()->when($this->search, function ($query) {
            return $query->where('username', 'like', '%' . $this->search . '%');
        })->when($this->name_search, function ($query) {
            return $query->where('name', 'like', '%' . $this->name_search . '%');
        })->withTrashed()->orderBy('username', 'ASC')->paginate($this->per_page);

        return view('livewire.backend.student.all-student',compact('students'))->extends('layouts.admin.admin')->section('admin');
    }

}
