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
    public $current_id;
    public $password_confirmation;

    public function resetinput()
    {
        $this->search=null;
        $this->password=null;
        $this->password_confirmation=null;
        $this->email=null;
        $this->username=null;
        $this->status=null;
        $this->c_id=null;
    }
    
    protected function rules()
    {   
        $passwordRules = $this->mode == 'add' ? ['required', 'same:password_confirmation', 'string', 'min:8', 'max:255'] : [];
        return [
            'password' => $passwordRules,
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:students,email,'.($this->mode=='edit'? $this->current_id  :'')], 
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
            'message'=>"Student Created Successfully!!"
        ]);
    }

    public function edit($id)
    {   $this->current_id=$id;
        $student = Student::find($id);
        if($student){
            $this->C_id=$student->id;
            $this->username=$student->username;
            $this->email=$student->email;
            $this->status =$student->status;
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
        $validatedData = $this->validate();
        $student = Student::find($id);
        if($student){
            $student->username = $validatedData['username'];
            $student->email= $validatedData['email'];
            $student->status = $this->status==1?'1':'0';
            $student->update();
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
            'message'=>"Student Updated Successfully!!"
        ]);
    }

    public function delete($id)
    { 
        $student = Student::find($id);
        if($student){
            $student->delete();
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $students=Student::where('username', 'like', '%'.$this->search.'%')->orderBy('username', 'ASC')->paginate($this->per_page);
        return view('livewire.backend.student.all-student',compact('students'))->extends('layouts.admin.admin')->section('admin');
    }

}
