<?php

namespace App\Http\Livewire\Guestend\Meritlist;

use Livewire\Component;
use App\Models\MeritList;

class AdmissionMeritList extends Component
{
    public $name;
    public $mobile;
    public $email;
    public $class;
    public $gender;
    public $sgpa;
    public $percentage;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'mobile' => ['required', 'integer', 'digits:10'],
            'gender' => ['required', 'integer', 'in:0,1'],
            'percentage'=>['required','numeric','min:0','max:100'],
            'sgpa'=>['nullable','numeric','min:0.00','max:10.00'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->name=null;
        $this->gender=null;
        $this->mobile=null;
        $this->email=null; 
        $this->class=null; 
        $this->percentage=null;
        $this->sgpa=null;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $merit= new MeritList;
        if($merit){
            $merit->name = $validatedData['name'];
            $merit->email = $validatedData['email'];
            $merit->class = $validatedData['class'];
            $merit->mobile = $validatedData['mobile'];
            $merit->sgpa = $validatedData['sgpa'];
            $merit->percentage = $validatedData['percentage'];
            $merit->gender = $this->gender==1?'1':'0';
            $merit->save();
            $this->resetinput();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"We Will Contact You Soon !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }

    }


    public function render()
    {
        if (is_numeric($this->sgpa) && $this->sgpa >=1) {
            $this->percentage = (($this->sgpa * 10) - 7.5);
        }
        return view('livewire.guestend.meritlist.admission-merit-list')->extends('layouts.guest.guest')->section('guest');
    }

}
