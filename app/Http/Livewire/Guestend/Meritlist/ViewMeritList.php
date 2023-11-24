<?php

namespace App\Http\Livewire\Guestend\Meritlist;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\MeritList;

class ViewMeritList extends Component
{
    public function render()
    {   
        $currentYear = Carbon::now()->year;
        $meritlist = MeritList::where('status',1)->whereYear('created_at', $currentYear)->paginate(50);
        return view('livewire.guestend.meritlist.view-merit-list',compact('meritlist'))->extends('layouts.guest.guest')->section('guest');
    }
}
