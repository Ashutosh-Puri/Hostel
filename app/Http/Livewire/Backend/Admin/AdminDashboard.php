<?php

namespace App\Http\Livewire\Backend\Admin;

use App\Models\Bed;
use App\Models\Room;
use App\Models\Hostel;
use Livewire\Component;
use App\Models\Building;

class AdminDashboard extends Component
{   
    public $total_bed;
    public $a_bed;
    public $f_bed;

    public $total_room;
    public $a_room;
    public $b_room;
    public $c_room;
    public $d_room;
    public $total_hostel;
    public $total_building;


    public function render()
    {   
        $this->total_bed=Bed::count();
        $this->f_bed=Bed::where('status',0)->count();
        $this->a_bed=Bed::where('status',1)->count();
        
        $this->total_room=Room::count();
        $this->a_room=Room::where('type',1)->count();
        $this->b_room=Room::where('type',2)->count();
        $this->c_room=Room::where('type',3)->count();
        $this->d_room=Room::where('type',4)->count();


        $this->total_hostel=Hostel::count();
        $this->a_hostel=Hostel::where('status',0)->count();
        $this->i_hostel=Hostel::where('status',1)->count();

        $this->total_building=Building::count();
        $this->a_building=Building::where('status',0)->count();
        $this->i_building=Building::where('status',1)->count();

        
        return view('livewire.backend.admin.admin-dashboard')->extends('layouts.admin.admin')->section('admin');
    }
}
