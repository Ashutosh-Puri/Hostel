<?php

namespace App\Livewire\Guestend\Meritlist;

use Carbon\Carbon;
use App\Models\Setting;
use Livewire\Component;
use App\Models\MeritList;

class ViewMeritList extends Component
{
    public function render()
    {   
        $currentYear = Carbon::now()->year;
        $setting=Setting::first();
        if(isset($setting->show_merit_list) )
        {
            if($setting->show_merit_list==1)
            {
                $meritlist = MeritList::where('status',1)->whereYear('created_at', $currentYear)->paginate(50);
            }
            else
            {
                $meritlist=null;
            }
        } else
        {
            $meritlist=null;
        }
        
        return view('livewire.guestend.meritlist.view-merit-list',compact('meritlist'))->extends('layouts.guest.guest')->section('guest');
    }
}
