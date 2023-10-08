<?php

namespace App\Http\Livewire\Guestend\ViewRules;

use App\Models\Rule;
use Livewire\Component;

class ViewRules extends Component
{
    public function render()
    {
        $rules = Rule::where('status',0)->get();
        return view('livewire.guestend.view-rules.view-rules',compact('rules'))->extends('layouts.guest.guest')->section('guest');
    }
}
