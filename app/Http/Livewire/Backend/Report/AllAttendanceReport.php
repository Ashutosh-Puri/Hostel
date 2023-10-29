<?php

namespace App\Http\Livewire\Backend\Report;

use App\Models\Student;
use Livewire\Component;
use App\Models\Admission;
use App\Models\Attendance;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendanceReportExport;
use App\Http\Livewire\Backend\Report\AllAttendanceReport;

class AllAttendanceReport extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $per_page = 10;
    public $class_id;
    public $gender;
    public $year;
    public $month;
    public $filter=1;
    public $date;
    public $student_name;
    public $attendanceArray;
    public $students;

    public function clear()
    {
        $this->gender=null;
        $this->year=null;
        $this->month=null;
        $this->filter=null;
        $this->date=null;
        $this->student_name=null;
    }

    public function generateEXCEL()
    {
        try 
        {
            $attendance = Attendance::whereIn('id', $this->attendanceArray['id'])->get();
            $excel = view('pdf.attendance_report', [
                'attendance' => $attendance,
            ])->extends('layouts.app')->section('content');

            return Excel::download(new AttendanceReportExport($excel), 'attendance_report.xlsx');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"EXCEL File Downloding..!"
            ]);
        } 
        catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"EXCEL File Generation Error !!"
            ]);
        }
    }
  
    public function render()
    {   
        $query = Attendance::orderBy('created_at', 'DESC');

        if ($this->gender!==null) {
            $query->whereHas('student', function ($query)  {
                $query->where('gender', $this->gender);
            });
        } 

        if ($this->student_name) {
            $query->whereHas('student', function ($query)  {
                $query->where('name', 'like', '%'.$this->student_name.'%');
            });
        } 
        if ($this->date) {
            $query->whereDate('entry_time',$this->date);
        } 

        if ($this->year) {
            $query->whereYear('entry_time',$this->year);
        } 
        if ($this->month) {
            $query->whereMonth('entry_time',$this->month);
        } 

        if ($this->filter !== null) {
            if ($this->filter == 1) {
                $query->whereDate('entry_time', now());
            } elseif ($this->filter == 2) {
                $query->whereDate('entry_time', now()->subDay());
            } elseif ($this->filter == 3) {
                $query->whereBetween('entry_time', [now()->startOfWeek(), now()->endOfWeek()]);
            } elseif ($this->filter == 4) {
                $query->whereMonth('entry_time', now()->month);
            } elseif ($this->filter == 5) {
                $query->whereYear('entry_time', now()->year);
            }
        } 

        $presentStudentIds = $query->pluck('student_id')->unique()->all();

        $attendance = $query->paginate($this->per_page);
        $this->attendanceArray['id']=  $query->pluck('id')->all();

        $a_id = AcademicYear::where('year', now()->year)->value('id');

        $admitted_student_ids = Admission::where('academic_year_id', $a_id)->pluck('student_id')->unique()->all();
        $present_students = Student::whereIn('id', array_intersect($presentStudentIds, $admitted_student_ids))->get();

        $total_admission = count($admitted_student_ids);

        $absent_student_ids = array_diff($admitted_student_ids, $presentStudentIds);
        $absent_students = Student::whereIn('id', $absent_student_ids)->get();

        return view('livewire.backend.report.all-attendance-report',compact('attendance','absent_students','present_students','total_admission'))->extends('layouts.admin.admin')->section('admin');
    }
}
