<?php

namespace App\Http\Livewire\Backend\Report;

use App\Models\Classes;
use Livewire\Component;
use App\Models\Admission;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use App\Exports\StudentReportExport;
use Maatwebsite\Excel\Facades\Excel;


class AllStudentReport extends Component 
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $per_page = 10;
    public $class_id;
    public $year_id;
    public $admission_status=null;
    public $admissionArray;
    public $student_name;

    public function clear()
    {
        $this->class_id=null;
        $this->year_id=null;
        $this->student_name=null;
        $this->admission_status=null;
        $this->admissionArray=null;
    }

    public function generateEXCEL()
    {
        try 
        {
            $allAdmissionRecords = Admission::whereIn('id', $this->admissionArray['id'])->get();

            $excel = view('pdf.student_report', [
                'admission' => $allAdmissionRecords,
            ]);

            return Excel::download(new StudentReportExport($excel), 'student_report.xlsx');

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
        $years = AcademicYear::all();
        $class = Classes::all();

        $query = Admission::with(['academicyear', 'class', 'student'])->orderBy('created_at', 'DESC');

        $query->when($this->year_id, function ($query) {
            $query->whereHas('academicyear', function ($query) {
                $query->where('id', $this->year_id);
            });
        })->when($this->class_id, function ($query) {
            $query->whereHas('class', function ($query) {
                $query->where('id', $this->class_id);
            });
        })->when($this->student_name, function ($query) {
            $query->whereHas('student', function ($query) {
                $query->where('name', 'like', "%" . $this->student_name . "%");
            });
        })->when($this->admission_status !== null, function ($query) {
            $query->where('status', $this->admission_status);
        });

        $admission = $query->paginate($this->per_page);
        $this->admissionArray['id']=  $query->pluck('id')->all();

        return view('livewire.backend.report.all-student-report',compact('class','years','admission'))->extends('layouts.admin.admin')->section('admin');
    }
}