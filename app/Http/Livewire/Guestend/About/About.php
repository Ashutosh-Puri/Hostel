<?php

namespace App\Http\Livewire\Guestend\About;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.guestend.about.about')->extends('layouts.guest.guest')->section('guest');
    }
}
