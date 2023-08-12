<?php

namespace App\Http\Livewire\Backend\Student;

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
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $c_id;
    public $status;
    public $username;
    public $email;
    public $password;

    public function resetinput()
    {
        $this->search=null;
        $this->password=null;
        $this->email=null;
        $this->username=null;
        $this->status=null;
        $this->c_id=null;
    }
    
    protected function rules()
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:students,email,'.($this->mode=='edit'? Auth::user()->id :'')], 
            'password' => [($this->password=null? 'nullable' : 'required'),'required','string', 'min:8', 'max:255'],
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
        $student->username = $validatedData['username'];
        $student->email= $validatedData['email'];
        $student->password= Hash::make($validatedData['password']);
        $student->status = $this->status==1?'1':'0';
        $student->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Created Successfully!!"
        ]);
    }

    public function edit($id)
    {   
        $student = Student::find($id);
        $this->C_id=$student->id;
        $this->username=$student->username;
        $this->email=$student->email;
        $this->status =$student->status;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate();
        $student = Student::find($id);
        $student->username = $validatedData['username'];
        $student->email= $validatedData['email'];
        $student->status = $this->status==1?'1':'0';
        $student->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $student = Student::find($id);
        $student->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $students=Student::where('username', 'like', '%'.$this->search.'%')->orderBy('username', 'ASC')->paginate($this->per_page);
        return view('livewire.backend.student.all-student',compact('students'))->extends('layouts.admin')->section('admin');
    }

}
