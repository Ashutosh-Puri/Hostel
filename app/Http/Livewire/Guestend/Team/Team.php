<?php

namespace App\Http\Livewire\Guestend\Team;

use App\Models\Admin;
use Livewire\Component;

class Team extends Component
{
    public function render()
    {
        $team = Admin::where('status',0)->get();
        return view('livewire.guestend.team.team',compact('team'))->extends('layouts.guest.guest')->section('guest');
    }
}
