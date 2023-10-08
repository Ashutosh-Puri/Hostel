<?php

namespace App\Http\Livewire\Guestend\Contact;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.guestend.contact.contact')->extends('layouts.guest.guest')->section('guest');
    }
}
