<?php

namespace App\Http\Livewire\Backend\Report;

use App\Models\Classes;
use Livewire\Component;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use App\Models\StudentPayment;
use App\Exports\PaymentReportExport;
use Maatwebsite\Excel\Facades\Excel;

class AllPaymentReport extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $per_page = 10;
    public $year_id;
    public $class_id;
    public $gender;
    public $payment;
    public $payment_status;
    public $student_name;
    public $paymentArray;

    public function clear()
    {
        $this->year_id=null;
        $this->class_id=null;
        $this->gender=null;
        $this->payment=null;
        $this->payment_status=null;
        $this->student_name=null;
        $this->paymentArray=null;
    }

    public function generateEXCEL()
    {
        try 
        {
            $payment = StudentPayment::whereIn('id', $this->paymentArray['id'])->get();
            $excel = view('pdf.payment_report', [
                'payment' => $payment,
            ])->extends('layouts.app')->section('content');

            return Excel::download(new PaymentReportExport($excel), 'payment_report.xlsx');
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

        $years=AcademicYear::select('id','year')->get();
        $class=Classes::select('id','name')->get();
        $query = StudentPayment::orderBy('created_at', 'DESC');

        if ($this->year_id) {
            $query->whereHas('academicyear', function ($query)  {
                $query->where('id', $this->year_id);
            });
        }

        if ($this->class_id) {
            $query->whereHas('admission.class', function ($query)  {
                $query->where('id', $this->class_id);
            });  
        }

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

        if ($this->payment!==null) {
            if($this->payment==0)
            {
                $query->where('total_amount',0);
            }
            elseif($this->payment==1)
            {
                $query->where('total_amount',">",0);
            }
            elseif($this->payment==2)
            {
                $query->where('total_amount',"<",0);
            }
        } 

        if ($this->payment_status!==null) {
            if($this->payment_status==0)
            {
                $query->where('status',0);
            }
            elseif($this->payment_status==1)
            {
                $query->where('status',1);
            }
            elseif($this->payment_status==2)
            {
                $query->where('status',2);
            }
        }

        $payments = $query->paginate($this->per_page);

        $this->paymentArray['id']= $query->pluck('id')->all();

        return view('livewire.backend.report.all-payment-report',compact('payments','class','years'))->extends('layouts.admin.admin')->section('admin');
    }

}
