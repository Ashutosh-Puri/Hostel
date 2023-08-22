<?php

namespace App\Http\Livewire\Guestend\Home;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.guestend.home.home')->extends('layouts.guest.guest')->section('guest');
    }
}
