<?php

namespace App\Http\Livewire\Guestend\About;

use App\Models\Admin;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        $staff = Admin::where('status',0)->get();
        return view('livewire.guestend.about.about',compact('staff'))->extends('layouts.guest.guest')->section('guest');
    }
}
