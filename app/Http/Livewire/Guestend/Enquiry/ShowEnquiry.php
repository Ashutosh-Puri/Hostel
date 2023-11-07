<?php

namespace App\Http\Livewire\Guestend\Enquiry;

use App\Models\Enquiry;
use Livewire\Component;

class ShowEnquiry extends Component
{   
    public $name;
    public $email;
    public $mobile;
    public $gender;
    public $subject;
    public $description;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'mobile' => ['required', 'integer', 'digits:10'],
            'gender' => ['required', 'integer', 'in:0,1'],
            'subject' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string',],
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
        $this->email=null;
        $this->mobile=null;
        $this->subject=null;
        $this->description=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $enquiry= new Enquiry;
        if($enquiry){
            $enquiry->name = $validatedData['name'];
            $enquiry->email = $validatedData['email'];
            $enquiry->mobile = $validatedData['mobile'];
            $enquiry->subject = $validatedData['subject'];
            $enquiry->description = $validatedData['description'];
            $enquiry->gender = $this->gender==1?'1':'0';
            $enquiry->save();
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
        return view('livewire.guestend.enquiry.show-enquiry')->extends('layouts.guest.guest')->section('guest');
    }
}
