<?php

namespace App\Http\Livewire\Backend\Admin;

use App\Models\Bed;
use App\Models\Room;
use App\Models\Hostel;
use App\Models\Seated;
use App\Models\College;
use Livewire\Component;
use App\Models\Building;

class AdminDashboard extends Component
{   
    public $total_college;
    public $a_college;
    public $i_college;

    public $total_hostel;
    public $a_hostel;
    public $i_hostel;

    public $total_g_hostel;
    public $a_g_hostel;
    public $i_g_hostel;

    public $total_b_hostel;
    public $a_b_hostel;
    public $i_b_hostel;

    public $total_room;
    public $f_room;
    public $a_room;

    public $seated;



    public $d_room;


    public $total_bed;
    public $a_bed;
    public $f_bed;

    
    public $total_building;
    
    public function render()
    {   
       
        // Colleges
        $this->total_college=College::count();
        $this->a_college=College::where('status',0)->count();
        $this->i_college=College::where('status',1)->count();
        // Hostels
        $this->total_hostel=Hostel::count();
        $this->a_hostel=Hostel::where('status',0)->count();
        $this->i_hostel=Hostel::where('status',1)->count();
        // Girls Hostels
        $this->total_g_hostel=Hostel::where('gender',1)->count();
        $this->a_g_hostel=Hostel::where('status',0)->where('gender',1)->count();
        $this->i_g_hostel=Hostel::where('status',1)->where('gender',1)->count();
        // Boys Hostels
        $this->total_b_hostel=Hostel::where('gender',0)->count();
        $this->a_b_hostel=Hostel::where('status',0)->where('gender',0)->count();
        $this->i_b_hostel=Hostel::where('status',1)->where('gender',0)->count();
        // Boys Hostels
        $this->total_room=Room::count();
        $this->f_room=Room::where('status',1)->count();
        $this->a_room=Room::where('status',0)->count();
        $this->seated=Seated::all();
        // $this->b_room=Room::where('type',2)->count();
        // $this->c_room=Room::where('type',3)->count();
        // $this->d_room=Room::where('type',4)->count();
        
        $this->total_bed=Bed::count();
        $this->f_bed=Bed::where('status',0)->count();
        $this->a_bed=Bed::where('status',1)->count();
       

        $this->total_building=Building::count();
        $this->a_building=Building::where('status',0)->count();
        $this->i_building=Building::where('status',1)->count();

        
        return view('livewire.backend.admin.admin-dashboard')->extends('layouts.admin.admin')->section('admin');
    }
}
