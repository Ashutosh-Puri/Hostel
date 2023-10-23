<?php

namespace App\Http\Livewire\Backend\Allocation;

use App\Models\Bed;
use App\Models\Fee;
use App\Models\Room;
use App\Models\Floor;
use App\Models\Quota;
use App\Models\Hostel;
use App\Models\Seated;
use App\Models\Classes;
use App\Models\Student;
use Livewire\Component;
use App\Models\Building;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use App\Models\StudentPayment;
use Illuminate\Validation\Rule;

class AllAllocation extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $a = '',$s = '',$c = '',$ad="";
    public $per_page = 10;
    public $mode='all';
    public $admission_id;
    public $academic_year_id;
    public $hostel_id;
    public $building_id;
    public $floor_id;
    public $room_id;
    public $bed_id;
    public $fee_id;
    public $seated_id;
    public $seated;
    public $c_id;
    public $admissionid;
    public $admissionid2;
    public $fee;
    public $gender;

    public function resetinput()
    {
        $this->a=null;
        $this->s=null;
        $this->c=null;
        $this->ad=null;
        $this->c_id=null;
        $this->hostel_id=null;
        $this->academic_year_id=null;
        $this->admission_id=null;
        $this->building_id=null;
        $this->floor_id=null;
        $this->room_id=null;
        $this->bed_id=null;
        $this->fee_id=null;
        $this->seated_id=null;
        $this->seated=null;
        $this->admissionid=null;
        $this->admissionid2=null;
        $this->fee=null;
        $this->gender=null;
    }

    protected function rules()
    {
        return [

            'admission_id' => [($this->mode=='edit'? 'required' : ($this->mode=='add'? 'required' : 'nullable')),'integer',Rule::unique('allocations')->where(function ($query) {
                return $query->where('admission_id', $this->admission_id);
            })],
            'academic_year_id' => [($this->mode=='edit'? 'required' : ($this->mode=='add'? 'required' : 'nullable')),'integer',],
            'hostel_id' => [($this->mode=='allocate'? 'required' : 'nullable'),'integer'],
            'building_id' => [($this->mode=='allocate'? 'required' : 'nullable'),'integer'],
            'floor_id' => [($this->mode=='allocate'? 'required' : 'nullable'),'integer'],
            'room_id' => [($this->mode=='allocate'? 'required' : 'nullable'),'integer'],
            'bed_id' => [($this->mode=='allocate'? 'required' : 'nullable'),'integer'],
            'fee' => [($this->mode=='allocate'? 'required' : 'nullable'),'numeric'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if ($propertyName === 'admissionid2') {
            $this->validate([
                'admissionid2' => ['required', 'different:' . $this->admissionid],
            ]);
        }
    }

    public function messages()
    {
        return [
            'fee.required' => 'The Fee For This Seating Type In The Current Academic Year Is Not Available.',
        ];
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }


    public function save()
    {
      $valideteData= $this->validate();
        $allocation= new Allocation;
        if( $allocation)
        {
            $allocation->admission_id = $valideteData['admission_id'];
            $allocation->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Allocation Created Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }


    public function edit($id)
    {
        $allocation=Allocation::find($id);
        if( $allocation)
        {
            $admission = Admission::find($allocation->admission_id);
            $this->c_id=$allocation->id;
            $this->academic_year_id=$admission->AcademicYear->id;
            $this->admission_id=$admission->id;
            $this->setmode('edit');
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function update($id)
    {
        $valideteData= $this->validate();
        $allocation=Allocation::find($id);
        if( $allocation)
        {
            $allocation->admission_id = $valideteData['admission_id'];
            $allocation->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Allocation Updated Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }
    public function allocate($id)
    {
        $this->admissionid=$id;
        $admission= Admission::find($id);
        if($admission)
        {
            $this->gender= $admission->Student->gender;
            $this->academic_year_id=$admission->academic_year_id;
            // $this->seated_id=$admission->seated_id;

        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
        $allocation= Allocation::where('admission_id',$id)->first();
        if($allocation)
        {
            $this->fee_id=$allocation->fee_id;

            $bed=Bed::find($allocation->bed_id);
            if($bed)
            {
                $this->hostel_id=$bed->Room->Floor->Building->Hostel->id;
                $this->building_id=$bed->Room->Floor->Building->id;
                $this->floor_id=$bed->Room->Floor->id;
                $this->room_id=$bed->Room->id;
            }
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
        $this->setmode('allocate');
    }

    public function allocatebed($admissionid)
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
                $bed=Bed::find($validatedData['bed_id']);
                if($bed)
                {
                    $fee=Fee::where('seated_id',$bed->Room->Seated->id)->first();
                    if($fee)
                    {   $allocation=Allocation::where('admission_id',$admissionid)->first();
                        $oldbed=Bed::find($allocation->bed_id);
                        if($oldbed)
                        {
                            $oldbed->status=0;
                            $oldbed->update();
                        }
                        if($allocation)
                        {
                            $allocation->bed_id=$validatedData['bed_id'];
                            $allocation->update();
                        }
                        $studentpayment->amount=$fee->amount;
                        $studentpayment->total_amount= ($fee->amount - $studentpayment->deposite );
                    }
                    $studentpayment->update();
                    $admission->seated_id=$bed->Room->Seated->id;
                    $admission->update();
                    $bed->status=1;
                    $bed->update();
                }

                $this->resetinput();
                $this->setmode('all');
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'success',
                    'message'=>"Bed Re Allocated Successfully !!"
                ]);
            }
            else
            {
                $studentpayment= new StudentPayment;
                if($studentpayment)
                {
                    $studentpayment->admission_id=$admission->id;
                    $studentpayment->student_id=$admission->student_id;
                    $studentpayment->academic_year_id=$admission->academic_year_id;
                    $bed=Bed::find($validatedData['bed_id']);
                    if($bed)
                    {
                        $fee=Fee::where('seated_id',$bed->Room->Seated->id)->first();
                        if($fee)
                        {
                            $allocation=Allocation::where('admission_id',$admissionid)->first();
                            if($allocation)
                            {
                                $allocation->bed_id=$validatedData['bed_id'];
                                $allocation->update();
                            }
                            $studentpayment->amount=$fee->amount;
                            $studentpayment->total_amount= ($fee->amount - $studentpayment->deposite );
                        }
                        $admission->seated_id=$bed->Room->Seated->id;
                        $admission->update();
                        $bed->status=1;
                        $bed->update();
                    }
                    $studentpayment->save();
                }

                $this->resetinput();
                $this->setmode('all');
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'success',
                    'message'=>"Bed  Allocated Successfully !!"
                ]);
            }
        }
    }

    public function exchange($id)
    {
        $this->admissionid=$id;
        $this->setmode('exchange');
    }


    public function exchangebed($id)
    {
         $this->validate([
            'admissionid2' => ['required'],
        ]);
        $add1 = Admission::find($id);
        $add2 = Admission::find($this->admissionid2);

        if($add1  && $add2)
        {
            $all1 = Allocation::where('admission_id', $id)->first();
            $all2 = Allocation::where('admission_id', $this->admissionid2)->first();

            if ($all1 && $all2)
            {
                $b1=Bed::find($all1->bed_id);
                $b2=Bed::find($all2->bed_id);
                if($b1 && $b2)
                {
                    $fee1=Fee::where('seated_id',$b1->Room->Seated->id)->first();
                    $fee2=Fee::where('seated_id',$b2->Room->Seated->id)->first();
                    if($fee1 && $fee2)
                    {
                        $payment1=StudentPayment::where('admission_id', $id)->first();
                        $payment2=StudentPayment::where('admission_id', $this->admissionid2)->first();
                        if($payment1 && $payment2)
                        {
                            $payment1->total_amount = ($fee2->amount - $payment1->deposite);
                            $payment2->total_amount = ($fee1->amount- $payment2->deposite);
                            $payment1->amount= $fee2->amount;
                            $payment2->amount=$fee1->amount;
                            $payment1->update();
                            $payment2->update();
                        }
                    }
                }

                $temp1= $all1->bed_id;
                $all1->bed_id= $all2->bed_id;
                $all2->bed_id=$temp1;
                $all1->update();
                $all2->update();
            }

            $temp3 = $add1->seated_id;
            $add1->seated_id = $add2->seated_id;
            $add2->seated_id = $temp3;
            $add1->update();
            $add2->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Bed Exchanged Successfully !!"
            ]);

        }else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function deallocate($id)
    {
        $admission= Admission::find($id);
        if($admission)
        {
            $allocation =Allocation::where('admission_id',$id)->first();
            if(isset($allocation->bed_id))
            {
                $bed=Bed::find($allocation->bed_id);
                if($bed)
                {
                    $bed->status=0;
                    $bed->update();
                }
                $allocation->bed_id=null;
                $allocation->update();
            }
            $studentpayment=StudentPayment::where('admission_id',$id)->first();
            if($studentpayment)
            {
                $studentpayment->amount=0;
                $studentpayment->total_amount=0- $studentpayment->deposite;
                $studentpayment->update();
            }
            $admission->seated_id=null;
            $admission->update();

            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Bed De Allocated Successfully !!"
            ]);

        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function softdelete($id)
    {
        $allocation = Allocation::find($id);
        if($allocation)
        {
            $this->deallocate($allocation->admission_id);
            $allocation->delete();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Allocation Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function restore($id)
    {
        $allocation = Allocation::withTrashed()->find($id);
        if($allocation)
        {
            $this->deallocate($allocation->admission_id);
            $allocation->restore();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Allocation Restored Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function delete()
    {
        $allocation = Allocation::withTrashed()->find($this->delete_id);
        if($allocation)
        {
            $this->deallocate($allocation->admission_id);
            $allocation->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Allocation Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function render()
    {
        if($this->mode=='add'|| $this->mode=='edit')
        {
              // Allocation Add , Edit
            $academicyears=AcademicYear::select('id','year')->where('status',0)->orderBy('year', 'DESC')->get();
            $admissions=Admission::where('academic_year_id',$this->academic_year_id)->get();
        }else
        {
            $academicyears=[];
            $admissions=[];
        }

        if($this->mode=='allocate'|| $this->mode=='exchange')
        {
            // Allocation Allocate , Re Allocate
            $hostels = Hostel::where('status', 0)->where('gender',$this->gender)->get();
            $buildings = Building::where('status', 0)->where('hostel_id', $this->hostel_id)->get();
            $floors = Floor::where('status', 0)->where('building_id', $this->building_id)->get();
            $rooms=Room::where('floor_id', $this->floor_id)->get();
            $beds=Bed::where('status',0)->where('room_id', $this->room_id)->get();
            $r=Room::where('id',$this->room_id)->first();
            if($r)
            {
                $this->seated_id=$r->seated_id;
                $se=Seated::find($r->seated_id);
                if($se)
                {
                $this->seated = $se->seated;
                }
            }
            if($this->room_id)
            {
                $fees=Fee::where('status',0)->where('academic_year_id',$this->academic_year_id)->where('seated_id',$this->seated_id)->first();
                if($fees)
                {
                    $this->fee_id=$fees->id;
                    $this->fee=$fees->amount;
                }else
                {
                    $this->fee_id=null;
                    $this->fee=null;
                }
            }

            // for alllocation Student Information
            if($this->admissionid!=null)
            {
                $admission=Admission::find($this->admissionid);
                $alloc1=Allocation::where('admission_id',$this->admissionid)->first();
            }
            else
            {
                $admission=null;
                $alloc1=null;
            }

            $students=Student::where('status',0)->orderBy('name', 'ASC')->get();
            if($this->admissionid2!=$this->admissionid)
            {
                $admission2=Admission::find($this->admissionid2);
                $alloc2=Allocation::where('admission_id',$this->admissionid2)->first();
                if(!$admission2 && $this->admissionid2)
                {
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'error',
                        'message'=>"Admission Not Found !!"
                    ]);
                }
            }else
            {
                $admission2=null;
                $alloc2=null;
                if($this->mode=="exchange")
                {
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'info',
                        'message'=>"Enter Unother Admission ID , You Have Enter Same Admission ID!!"
                    ]);
                }
            }
        }else
        {
            $alloc2=null;
            $alloc1=null;
            $admission=null;
            $admission2=null;
            $beds=[];
            $hostels=[];
            $buildings=[];
            $floors=[];
            $rooms=[];
        }



        $query =Allocation::select('id','admission_id','bed_id','deleted_at')->with(['Admission'])->orderBy('created_at', 'DESC');
        if ($this->ad) {
            $admissionIds = Admission::where('id', 'like',$this->ad. '%')->pluck('id');
            $query->whereIn('admission_id', $admissionIds);
        }
        if ($this->a) {
            $query->whereHas('Admission', function ($q) {
                $q->whereHas('AcademicYear', function ($q) {
                    $q->where('status', 0)->where('year', 'like', '%' . $this->a . '%');
                });
            });
        }
        if ($this->s) {
            $query->whereHas('Admission', function ($q) {
                $q->whereHas('Student', function ($q) {
                    $q->where('status', 0)->where('name', 'like', '%' . $this->s . '%');
                });
            });
        }if ($this->c) {
            $query->whereHas('Admission', function ($q) {
                $q->whereHas('Class', function ($q) {
                    $q->where('status', 0)->where('name', 'like', '%' . $this->c . '%');
                });
            });
        }
        $allocations = $query->withTrashed()->paginate($this->per_page);
        return view('livewire.backend.allocation.all-allocation',compact('alloc1','alloc2','admission','admission2','beds','allocations','academicyears','admissions','hostels','buildings','floors','rooms',))->extends('layouts.admin.admin')->section('admin');
    }
}
