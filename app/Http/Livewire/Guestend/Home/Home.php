<?php

namespace App\Http\Livewire\Guestend\Home;

use App\Models\Admin;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $staff = Admin::where('status',0)->get();
        return view('livewire.guestend.home.home',compact('staff'))->extends('layouts.guest.guest')->section('guest');
    }
}
