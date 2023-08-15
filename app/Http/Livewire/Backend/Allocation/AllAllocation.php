<?php

namespace App\Http\Livewire\Backend\Allocation;

use App\Models\Bed;
use App\Models\Fee;
use App\Models\Classes;
use App\Models\Student;
use Livewire\Component;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use App\Models\StudentPayment;

class AllAllocation extends Component
{

    use WithPagination;
    protected $listeners = ['deallocate'=>'deallocate','delete-confirmed'=>'delete'];
    public $a = '',$s = '',$c = '';
    public $per_page = 10;
    public $mode='all';
    public $admission_id;
    public $bed_id;
    public $fee_id;
    public $c_id;
    public $admissionid;
    public $admissionid2;


    public function resetinput()
    {
        $this->a=null;
        $this->s=null;
        $this->c=null;
        $this->c_id=null;
        $this->bed_id=null;
        $this->fee_id=null;
        $this->admissionid=null;
        $this->admissionid2=null;
    }

    protected $rules = [
        'fee_id' => ['required','integer'],
        'bed_id' => ['required','integer'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function allocate($id)
    {
        $this->admissionid=$id;
        $admission= Admission::find($id);
        $this->bed_id=$admission->bed_id;
        $allocation= Allocation::where('admission_id',$id)->first();
        $this->fee_id=$allocation->fee_id;
        $this->setmode('allocate');
    }

    public function save($admissionid)
    {
        $validatedData = $this->validate();
        $admission= Admission::find($admissionid);
        if($admission)
        {
            $studentpayment=StudentPayment::where('admission_id',$admissionid)->first();
            if($studentpayment)
            {
                $studentpayment->admission_id=$admission->id;
                $studentpayment->student_id=$admission->student_id;
                $studentpayment->academic_year_id=$admission->academic_year_id;
                $fee=Fee::find($validatedData['fee_id']);
                if($fee)
                {
                    $studentpayment->total_amount=$fee->amount;
                }
                $studentpayment->update();
            }
            else
            {

                $studentpayment= new StudentPayment;
                $studentpayment->admission_id=$admission->id;
                $studentpayment->student_id=$admission->student_id;
                $studentpayment->academic_year_id=$admission->academic_year_id;
                $fee=Fee::find($validatedData['fee_id']);
                if($fee)
                {
                    $studentpayment->total_amount=$fee->amount;
                    $admission->seat_type=$fee->type;
                }
                $studentpayment->save();

            }
        }

        if($admission->bed_id!=null)
        {
            $temp=$admission->bed_id;
            $bed=Bed::find($temp);
            $bed->status=0;
            $bed->update();
        }
        $admission->bed_id=$validatedData['bed_id'];
        $admission->update();
        $bed=Bed::find($validatedData['bed_id']);
        $bed->status=1;
        $bed->update();
        $allocation= Allocation::where('admission_id',$admissionid)->first();
        if($allocation)
        {
            $allocation->fee_id=$validatedData['fee_id'];
            $allocation->update();
        }

        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Bed Allocated Successfully!!"
        ]);
    }

    public function deallocate($id)
    {

        $admission= Admission::find($id);
        if($admission->bed_id!=null)
        {
            $temp=$admission->bed_id;
            $bed=Bed::find($temp);
            $bed->status=0;
            $bed->update();
        }
        $admission->bed_id=null;
        $admission->update();
        $allocation= Allocation::where('admission_id',$id)->first();
        if ($allocation) {
            $allocation->fee_id = null;
            $allocation->update();
        }
        $studentpayment=StudentPayment::where('admission_id',$id)->first();
        if($studentpayment)
        {
            $studentpayment->delete();
        }

        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Bed De Allocated Successfully!!"
        ]);
    }

    public function exchange($id)
    {
        $this->admissionid=$id;
        // $allocation= Allocation::where('admission_id',$id)->first();
        // $this->fee_id=$allocation->fee_id;
        $this->setmode('exchange');
    }



    public function update($id)
    {   
        
        $this->validate([
            'admissionid2' => ['required'],
        ]);
        $all1= Allocation::where('admission_id',$id)->first();
        $all2= Allocation::where('admission_id',$this->admissionid2)->first();
        $temp1= $all1->fee_id;
        $temp2= $all2->fee_id;
        $all1->fee_id= $temp2;
        $all2->fee_id= $temp1;
        $all1->update();
        $all2->update();
        $add1= Admission::find($id);
        $add2= Admission::find($this->admissionid2);
        $temp3= $add1->bed_id;
        $temp4= $add2->bed_id;
        $add1->bed_id= $temp4;
        $add2->bed_id= $temp3;
        $add1->update();
        $add2->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Bed Exchanged Successfully!!"
        ]);
     }

    //method add tejas
    // public function deleteconfirmation($id)
    // {
    //     $this->delete_id=$id;
    //     $this->dispatchBrowserEvent('delete-confirmation');

    // }

    // public function delete()
    // {
    //     $allocation = Allocation::find($this->delete_id);
    //     $allocation->delete();
    //     $this->delete_id=null;
    //     $this->setmode('all');
    //     $this->dispatchBrowserEvent('alert',[
    //         'type'=>'success',
    //         'message'=>"Allocation Deleted Successfully!!"
    //     ]);
    // }

    public function render()
    {
        $academicyears=AcademicYear::where('status',0)->orderBy('year', 'DESC')->get();
        $classes=Classes::where('status',0)->orderBy('name', 'ASC')->get();
        $beds=Bed::where('status',0)->get();
        $fees=Fee::where('status',0)->get();
        $students=Student::where('status',0)->orderBy('name', 'ASC')->get();
        $query =Allocation::orderBy('student_id', 'ASC');

        $allocations =Allocation::paginate($this->per_page);

        if($this->admissionid2!=null)
        {
            $admission2=Admission::find($this->admissionid2);  
        }
        else
        {
            $admission2=null;
        }
        if($this->admissionid!=null)
        {
            $admission=Admission::find($this->admissionid);  
            $alloc=Allocation::whereIn('admission_id',[$this->admissionid,$this->admissionid2])->get();
        }
        else
        {
            $admission=null;
           
            $alloc=null;
        }
        return view('livewire.backend.allocation.all-allocation',compact('alloc','admission','admission2','fees','beds','allocations'))->extends('layouts.admin.admin')->section('admin');
    }

}
