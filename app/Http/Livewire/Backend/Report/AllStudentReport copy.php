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
    public $bed_status=null;
    public $admissionArray;
    public function clear()
    {
        $this->class_id=null;
        $this->year_id=null;
        $this->bed_status=null;
        $this->admissionArray=null;
    }

    public function generatePDF()
    {   
        try {

            $allAdmissionRecords = Admission::whereIn('id', $this->admissionArray)->get();
             
            $pdf = view('livewire.backend.report.pdf-student-report', [
                'admission' => $allAdmissionRecords,
                'bed_status' => $this->bed_status,
            ])->extends('layouts.app')->section('content');

            return Excel::download(new StudentReportExport($pdf), 'student_report.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"PDF File Downloding...!!"
            ]);

        } catch (\Exception $e) {

            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"PDF File Generation Error !!"
            ]);
        }
    }

    public function generateEXCEL()
    {
        try 
        {
            $allAdmissionRecords = Admission::whereIn('id', $this->admissionArray)->get();

            $excel = view('livewire.backend.report.pdf-student-report', [
                'admission' => $allAdmissionRecords,
                'bed_status' => $this->bed_status
            ])->extends('layouts.app')->section('content');

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
        $years=AcademicYear::all();
        $class=Classes::all();

        $query = Admission::with(['AcademicYear','class','student','allocations.bed'])->orderBy('created_at', 'DESC');
        if ($this->year_id) {
            $query->whereHas('AcademicYear', function ($query) {
                $query->where('id',$this->year_id );
            });
        }

        if ($this->class_id) {
            $query->whereHas('class', function ($query) {
                $query->where('id',$this->class_id );
            });
        }

        if($this->bed_status!==null)
        {
            if ($this->bed_status ==1) {
                $query->whereHas('allocations', function ($query) {
                    $query->whereNotNull('bed_id');
                });
            }elseif ($this->bed_status ==0) {
                $query->whereDoesntHave('allocations', function ($query) {
                    $query->whereNotNull('bed_id');
                });
            }
        }

        $admission = $query->paginate($this->per_page);

        $this->admissionArray= $admission->pluck('id')->all();
        
        return view('livewire.backend.report.all-student-report',compact('class','years','admission'))->extends('layouts.admin.admin')->section('admin');
    }
}