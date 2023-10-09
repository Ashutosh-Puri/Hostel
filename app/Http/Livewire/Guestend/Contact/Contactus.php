<?php

namespace App\Http\Livewire\Guestend\Contact;

use App\Models\Contact;
use Livewire\Component;

class Contactus extends Component
{
    public $name;
    public $email;
    public $subject;
    public $mobile;
    public $message;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'mobile' => ['required', 'integer', 'digits:10'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:400'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->name=null;
        $this->email=null;
        $this->mobile=null;
        $this->subject=null;
        $this->message=null;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $contact= new Contact;
        if($contact){
            $contact->name = $validatedData['name'];
            $contact->email = $validatedData['email'];
            $contact->mobile = $validatedData['mobile'];
            $contact->subject = $validatedData['subject'];
            $contact->message = $validatedData['message'];
            $contact->save();
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
        return view('livewire.guestend.contact.contact')->extends('layouts.guest.guest')->section('guest');
    }
}
