<?php

namespace App\Http\Livewire\Backend\Admin;

use Carbon\Carbon;
use App\Models\Bed;
use App\Models\Room;
use App\Models\Hostel;
use App\Models\Seated;
use App\Models\College;
use App\Models\Student;
use Livewire\Component;
use App\Models\Building;
use Carbon\CarbonPeriod;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\Attendance;
use App\Models\AcademicYear;


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
    public $seatedData = [];

    public $total_building;
    public $a_building;
    public $i_building;
    public $a_b_h_building;
    public $a_g_h_building;
    public $i_b_h_building;
    public $i_g_h_building;
    public $b_h_building;
    public $g_h_building;

    public $boys_hostels;
    public $girls_hostels;

    public $students;
    public $students_a;

    public $rooms;
    public $rooms_f;

    public $admissions;
    public $admissions_c;
    
    public $allocations;
    public $allocations_c;


    public $academicYears = [];
    public  $year_wise_total_admission = [];
    public  $year_wise_confirm_admission = [];
    public  $totalGrowth;

    public $currentMonthDateCounts;
    public $days;
    public $lastMonthDateCounts;

    public $currentMonthDateRange;
    public $lastMonthDateRange;
    
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

        // Boys Rooms
        $this->total_room=Room::count();
        $this->f_room=Room::where('status',1)->count();
        $this->a_room=Room::where('status',0)->count();
        $seated=Seated::all();
        foreach ($seated as $s) {
            $this->seatedData[]= [
                'seated' => $s->seated,
                'status_1_count' => Room::where('status', 1)->where('seated_id', $s->id)->count(),
                'status_0_count' => Room::where('status', 0)->where('seated_id', $s->id)->count(),
                'total_count' => Room::where('seated_id', $s->id)->count(),
            ];
        }
        // All Buildings
        $this->total_building=Building::count();
        $this->a_building=Building::where('status',0)->count();
        $this->i_building=Building::where('status',1)->count();

        // Boys Hostel Building
        $this->b_h_building=Building::whereHas('hostel', function ($query) { $query->where('gender', 0);  })->count();
        $this->a_b_h_building=Building::whereHas('hostel', function ($query) { $query->where('gender', 0);  })->where('status', 0)->count();
        $this->i_b_h_building=Building::whereHas('hostel', function ($query) { $query->where('gender', 0);  })->where('status', 1)->count();
        
        // Girls Hostel Building
        $this->g_h_building=Building::whereHas('hostel', function ($query) { $query->where('gender', 1);  })->count();
        $this->a_g_h_building=Building::whereHas('hostel', function ($query) { $query->where('gender', 1);  })->where('status', 0)->count();
        $this->i_g_h_building=Building::whereHas('hostel', function ($query) { $query->where('gender', 1);  })->where('status', 1)->count();


        $this->boys_hostels =Hostel::where('gender',0)->get();
        $this->girls_hostels =Hostel::where('gender',1)->get();


        $currentYear = Carbon::now()->year;

        $this->students = Student::whereYear('created_at', $currentYear)->count();
        $this->students_a = Student::where('status', 0)->whereYear('created_at', $currentYear)->count();

        $this->rooms = Room::whereYear('created_at', $currentYear)->count();
        $this->rooms_f = Room::where('status', 1)->whereYear('created_at', $currentYear)->count();

        $this->admissions = Admission::whereYear('created_at', $currentYear)->count();
        $this->admissions_c = Admission::where('status', 1)->whereYear('created_at', $currentYear)->count();

        $this->allocations = Allocation::whereYear('created_at', $currentYear)->count();
        $this->allocations_c = Allocation::whereNotNull('bed_id')->whereYear('created_at', $currentYear)->count();


        // $this->b_room=Room::where('type',2)->count();
        // $this->c_room=Room::where('type',3)->count();
        // $this->d_room=Room::where('type',4)->count();
        
        // $this->total_bed=Bed::count();
        // $this->f_bed=Bed::where('status',0)->count();
        // $this->a_bed=Bed::where('status',1)->count();
       

        // $this->total_building=Building::count();
        // $this->a_building=Building::where('status',0)->count();
        // $this->i_building=Building::where('status',1)->count();


        // Bar Grapth Data
        $last10AcademicYears = AcademicYear::orderBy('year', 'desc')->take(10)->get();
        foreach ($last10AcademicYears as $key => $academicYear) {
            $academicYears[$key] = $academicYear->year;
        }
        $this->academicYears=json_encode(array_values($academicYears));
        
        foreach ($last10AcademicYears as $key => $academicYear) {
            $admissionCount = $academicYear->admissions()->count();
            $year_wise_total_admission[$key] = $admissionCount;
        }
        $this->year_wise_total_admission=json_encode(array_values($year_wise_total_admission));
       
        foreach ($last10AcademicYears as $key => $academicYear) {
            $admissionCountStatus1 = $academicYear->admissions()->where('status', 1)->count();
            $year_wise_confirm_admission[$key] = $admissionCountStatus1;
        }
        $this->year_wise_confirm_admission= json_encode(array_values($year_wise_confirm_admission));

        $data=$year_wise_confirm_admission;
        $growthRates = [];
        for ($i = 1; $i < count($data); $i++) {
            $oldValue = $data[$i - 1];
            $newValue = $data[$i];
            if($oldValue)
            {
                $growthRate = (($newValue - $oldValue) / $oldValue) * 100;
            }else
            {
                $growthRate=0;
            }
            $growthRates[] = $growthRate;
        }
        $this->totalGrowth = array_sum($growthRates) / count($growthRates);

        $currentMonthStart = now()->startOfMonth();
        $currentMonthEnd = now()->endOfMonth();
        $lastMonthStart = now()->subMonth()->startOfMonth();
        $lastMonthEnd = now()->subMonth()->endOfMonth();

        $currentMonthData = Attendance::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
            ->selectRaw('DATE(created_at) as date, COUNT(DISTINCT student_id) as count')
            ->groupBy('date')
            ->pluck('count', 'date')
            ->toArray();

        $lastMonthData = Attendance::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])
            ->selectRaw('DATE(created_at) as date, COUNT(DISTINCT student_id) as count')
            ->groupBy('date')
            ->pluck('count', 'date')
            ->toArray();

        $currentMonthDays = CarbonPeriod::create($currentMonthStart, $currentMonthEnd)->toArray();
        $lastMonthDays = CarbonPeriod::create($lastMonthStart, $lastMonthEnd)->toArray();

        $currentMonthCounts = [];
        $lastMonthCounts = [];

        foreach ($currentMonthDays as $day) {
            $date = $day->format('Y-m-d');
            $currentMonthCounts[$date] = $currentMonthData[$date] ?? 0;
        }

        foreach ($lastMonthDays as $day) {
            $date = $day->format('Y-m-d');
            $lastMonthCounts[$date] = $lastMonthData[$date] ?? 0;
        }

        $this->currentMonthDateCounts = json_encode(array_values($currentMonthCounts));
        $this->lastMonthDateCounts = json_encode(array_values($lastMonthCounts));

        return view('livewire.backend.admin.admin-dashboard')->extends('layouts.admin.admin')->section('admin');
    }
}
