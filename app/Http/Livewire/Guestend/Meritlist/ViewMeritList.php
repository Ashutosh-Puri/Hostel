<?php

namespace App\Http\Livewire\Guestend\Meritlist;

use Livewire\Component;
use App\Models\MeritList;

class ViewMeritList extends Component
{
    public function render()
    {
        $meritlist = MeritList::where('status',1)->paginate(50);
        return view('livewire.guestend.meritlist.view-merit-list',compact('meritlist'))->extends('layouts.guest.guest')->section('guest');
    }
}
