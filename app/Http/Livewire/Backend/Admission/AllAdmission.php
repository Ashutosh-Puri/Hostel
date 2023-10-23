<?php

namespace App\Http\Livewire\Backend\Admission;

use App\Models\Bed;
use App\Models\Cast;
use App\Models\Quota;
use App\Models\Classes;
use App\Models\Student;
use Livewire\Component;
use App\Models\Category;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\StudentPayment;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Models\StudentEducation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AllAdmission extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $admissionfull=0;
    public $ad = '';
    public $s = '';
    public $a = '';
    public $c = '';
    public $stream = '';
    public $stream_type = '';
    public $per_page = 10;
    public $mode='all';
    public $c_id;
    public $academic_year_id;
    public $last_academic_year_id;
    public $student_id;
    public $class_id;
    public $last_class_id;
    public $sgpa;
    public $percentage;
    public $name;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $mobile;
    public $photo;
    public $cast_id;
    public $category_id;
    public $dob;
    public $blood_group;
    public $is_allergy;
    public $is_ragging=0;
    public $mother_name;
    public $parent_name;
    public $parent_mobile;
    public $parent_address;
    public $local_parent_name;
    public $local_parent_mobile;
    public $local_parent_address;
    public $address_type;
    public $member_id;
    public $photoold;
    public $viewid=null;
    public $allocateid=null;
    public $reallocateid=null;
    public $current_id;
    public $mindate;
    public $gender;
    public $status;

    public function resetinput()
    {
        $this->name=null;
        $this->c_id=null;
        $this->ad =null;
        $this->a =null;
        $this->s =null;
        $this->c =null;
        $this->academic_year_id=null;
        $this->last_academic_year_id=null;
        $this->student_id=null;
        $this->class_id = null;
        $this->stream=null;
        $this->stream_type=null;
        $this->status =null;
        $this->last_name = null;
        $this->first_name =null;
        $this->middle_name =null;
        $this->mobile =null;
        $this->mother_name =null;
        $this->dob =null;
        $this->cast_id =null;
        $this->category_id =null;
        $this->parent_name =null;
        $this->parent_mobile =null;
        $this->parent_address =null;
        $this->local_parent_name =null;
        $this->local_parent_mobile =null;
        $this->local_parent_address =null;
        $this->blood_group =null;
        $this->is_allergy =null;
        $this->is_ragging =null;
        $this->address_type=null;
        $this->member_id =null;
        $this->photoold =null;
        $this->photo =null;
        $this->last_class_id=null;
        $this->sgpa=null;
        $this->percentage=null;
        $this->viewid=null;
        $this->allocateid=null;
        $this->reallocateid=null;
        $this->current_id=null;
        $this->gender=null;
    }

    protected function rules()
    {
        return [
            'student_id'=>['required','integer', Rule::exists(Student::class, 'id')],
            'gender'=>['required','integer','in:0,1' ],
            'academic_year_id'=>['required','integer', Rule::exists(AcademicYear::class, 'id')],
            'last_academic_year_id'=>['required','integer', Rule::exists(AcademicYear::class, 'id')],
            'first_name'=>['required','string','max:255'],
            'middle_name'=>['required','string','max:255'],
            'last_name'=>['required','string','max:255'],
            'dob'=>['required','date','before_or_equal:15 years ago'],
            'cast_id'=>['required','integer', Rule::exists(Cast::class, 'id')],
            'category_id'=>['required','integer', Rule::exists(Category::class, 'id')],
            'blood_group'=>['required','string','max:255'],
            'stream'=>['required','string','max:255'],
            'stream_type'=>['required','string','max:255'],
            'class_id'=>['required','integer', Rule::exists(Classes::class, 'id')],
            'last_class_id'=>['required','integer',Rule::exists(Classes::class, 'id')],
            'percentage'=>['required','numeric','min:0','max:100'],
            'sgpa'=>['nullable','numeric','min:0.00','max:10.00'],
            'parent_name'=>['required','string','max:255'],
            'mother_name'=>['required','string','max:255'],
            'parent_mobile'=>['required','numeric','digits:10','unique:students,parent_mobile,'.($this->mode=='edit'? $this->student_id : ($this->mode=='add'? Auth::user()->id :'')),],
            'parent_address'=>['required','string','max:255'],
            'local_parent_name'=>['nullable','string','max:255'],
            'local_parent_mobile'=>['nullable','numeric','digits:10','unique:students,local_parent_mobile,'.($this->mode=='edit'? $this->student_id :($this->mode=='add'? Auth::user()->id :'')),],
            'local_parent_address'=>['nullable','string','max:255'],
            'address_type'=>['required','integer','max:255'],
            'is_allergy'=>['nullable','string','max:255'],
            'is_ragging'=>['nullable', 'in:0,1'],
            'mobile'=>['required','numeric','digits:10','unique:students,mobile,'.($this->mode=='edit'? $this->student_id :($this->mode=='add'? Auth::user()->id :'')),],
            'member_id'=>['required','numeric','unique:students,member_id,'.($this->mode=='edit'? $this->student_id :($this->mode=='add'? Auth::user()->id :'')),],
            'photo'=>[($this->mode=='edit'? 'nullable' : ($this->photoold!=null? 'nullable' : 'required')),'image','mimes:jpeg,jpg,png','max:1024'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        if ($propertyName === 'class_id') {
            $this->checkfull();
        }
    }
    public function checkfull()
    {
        $quota = Quota::where('academic_year_id', $this->academic_year_id)->where('class_id', $this->class_id)->first();
        if ($quota) {
            $maxCapacity = $quota->max_capacity;
            $admissionCount = Admission::where('academic_year_id', $this->academic_year_id)->where('class_id', $this->class_id)->count();
            if ($admissionCount >= $maxCapacity) {
                $this->admissionfull=1;
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'info',
                    'message'=>"Admission Full In This  Academic Year For This class !!"
                ]);
            } else {
                $this->admissionfull=0;
            }
        }
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
        if($mode=="add")
        {
            $student = Student::find(Auth::user()->id);
            if ($student)
            {
                $nameParts = explode(' ', $student->name);
                $this->last_name = isset($nameParts[0]) ? $nameParts[0] : '';
                $this->first_name = isset($nameParts[1]) ? $nameParts[1] : '';
                $this->middle_name = isset($nameParts[2]) ? $nameParts[2] : '';
                $this->mobile = $student->mobile;
                $this->mother_name = $student->mother_name;
                $this->dob = $student->dob;
                if(isset($student->cast_id))
                {
                    $tempccat=Cast::find($student->cast_id)->category()->pluck('id');
                    if( $tempccat[0])
                    {
                        $this->category_id = $tempccat[0];
                    }
                }
                $this->cast_id = $student->cast_id;
                $this->parent_name = $student->parent_name;
                $this->parent_mobile = $student->parent_mobile;
                $this->parent_address = $student->parent_address;
                $this->local_parent_name = $student->local_parent_name;
                $this->local_parent_mobile = $student->local_parent_mobile;
                $this->local_parent_address = $student->local_parent_address;
                $this->blood_group = $student->blood_group;
                $this->is_allergy = $student->is_allergy;
                $this->is_ragging = $student->is_ragging;
                $this->gender = $student->gender;
                $this->address_type = $student->address_type;
                $this->member_id = $student->member_id;
                $this->photoold = $student->photo;
            }
        }
    }

    public function save()
    {
        if( $this->admissionfull==1)
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'info',
                'message'=>"Admission Full In This  Academic Year For This class !!"
            ]);
        }
        $validatedData = $this->validate();


        if($this->admissionfull==0)
        {
            $student = Student::find($this->student_id);
            if ($student){
                $student->name = $this->name;
                $student->mobile = $validatedData['mobile'];
                $student->mother_name = $validatedData['mother_name'];
                $student->dob = $validatedData['dob'];
                $student->cast_id = $validatedData['cast_id'];
                $student->parent_name = $validatedData['parent_name'];
                $student->parent_mobile = $validatedData['parent_mobile'];
                $student->parent_address = $validatedData['parent_address'];
                $student->local_parent_name = $validatedData['local_parent_name'];
                $student->local_parent_mobile = $validatedData['local_parent_mobile'];
                $student->local_parent_address = $validatedData['local_parent_address'];
                $student->blood_group = $validatedData['blood_group'];
                $student->is_allergy = $validatedData['is_allergy'];
                $student->is_ragging = $this->is_ragging == 1 ? '1' : '0';
                $student->gender = $this->gender == 1 ? '1' : '0';
                $student->address_type = $this->address_type == 1 ? '1' : '0';
                $student->member_id = $this->member_id;
                if ($this->photo) {
                    if($student->photo)
                    {
                        File::delete($student->photo);
                    }
                    $path = 'uploads/profile/photo/';
                    $fileName = 'user-' . time(). '.' . $this->photo->getClientOriginalExtension();
                    $this->photo->storeAs($path, $fileName, 'public');
                    $student->photo = 'storage/' . $path . $fileName;
                    $this->reset('photo');
                }
                $student->update();
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'error',
                    'message'=>"Student Not Found !!"
                ]);
            }

            $admission = new Admission;
            if($admission){
                $admission->academic_year_id =$validatedData['academic_year_id'];
                $admission->student_id =$validatedData['student_id'];
                $admission->class_id = $validatedData['class_id'];
                $admission->status = '0';
                $admission->save();
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'error',
                    'message'=>"Admission Not Stored !!"
                ]);
            }
            $allocation =new Allocation;
            if($allocation){
                $allocation->admission_id= $admission->id;
                $allocation->save();
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'error',
                    'message'=>"Allocation Not Stored !!"
                ]);
            }
            $education = new StudentEducation;
            if($education){
                $education->admission_id = $admission->id;
                $education->academic_year_id =$validatedData['last_academic_year_id'];
                $education->student_id =$validatedData['student_id'];
                $education->last_class_id = $validatedData['last_class_id'];
                $education->sgpa = $validatedData['sgpa'];
                $education->percentage = $validatedData['percentage'];
                $education->save();
                $this->resetinput();
                $this->setmode('all');
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'success',
                    'message'=>"Admission Created Successfully !!"
                ]);
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'error',
                    'message'=>"Student Eduction Not Stored !!"
                ]);
            }
        }
    }

    public function edit($id)
    {
        $this->current_id=$id;
        $admission = Admission::find($id);
        if ($admission)
        {
            $this->c_id = $admission->id;
            $this->academic_year_id = $admission->academic_year_id;
            $this->student_id = $admission->student_id;
            $this->class_id = $admission->class_id;
            $this->status = $admission->status;

            $class = Classes::where('id', $admission->class_id)->latest()->first();
            if ($class)
            {
                $this->stream = $class->stream;
                $this->stream_type = $class->type;
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'error',
                    'message'=>"Stream And Stream Type Not Found !!"
                ]);
            }

            $student = Student::find($this->student_id);
            if ($student)
            {
                $nameParts = explode(' ', $student->name);
                $this->last_name = isset($nameParts[0]) ? $nameParts[0] : '';
                $this->first_name = isset($nameParts[1]) ? $nameParts[1] : '';
                $this->middle_name = isset($nameParts[2]) ? $nameParts[2] : '';
                $this->mobile = $student->mobile;
                $this->mother_name = $student->mother_name;
                $this->dob = $student->dob;
                $this->cast_id = $student->cast_id;
                if(isset($student->cast_id))
                {
                    $tempccat=Cast::find($student->cast_id)->category()->pluck('id');
                    if( $tempccat[0])
                    {
                        $this->category_id = $tempccat[0];
                    }
                }else{
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'error',
                        'message'=>"Cast And Category Not Found !!"
                    ]);
                }
                $this->parent_name = $student->parent_name;
                $this->parent_mobile = $student->parent_mobile;
                $this->parent_address = $student->parent_address;
                $this->local_parent_name = $student->local_parent_name;
                $this->local_parent_mobile = $student->local_parent_mobile;
                $this->local_parent_address = $student->local_parent_address;
                $this->blood_group = $student->blood_group;
                $this->is_allergy = $student->is_allergy;
                $this->is_ragging = $student->is_ragging;
                $this->gender = $student->gender;
                $this->address_type = $student->address_type;
                $this->member_id = $student->member_id;
                $this->photoold = $student->photo;
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'error',
                    'message'=>"Student Not Found !!"
                ]);
            }

            $education = StudentEducation::where('admission_id',$admission->id)->latest()->first();
            if ($education)
            {
                $this->last_academic_year_id = $education->academic_year_id;
                $this->last_class_id = $education->last_class_id;
                $this->sgpa = $education->sgpa;
                $this->percentage = $education->percentage;
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'error',
                    'message'=>"Last Education Not Found !!"
                ]);
            }
            $this->setmode('edit');
        }

    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $admission = Admission::find($id);
        if($admission){
            $oldyearid=$admission->academic_year_id;
            $oldstudentid=$admission->student_id;
            $admission->academic_year_id=$this->academic_year_id;
            $admission->student_id= $this->student_id;
            $admission->class_id = $validatedData['class_id'];
            $admission->status ='0';
            $admission->update();
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Admission Not Found !!"
            ]);
        }
        $education =StudentEducation::where('admission_id', $id)->latest()->first();
        if ($education)
        {
            $education->academic_year_id=$validatedData['last_academic_year_id'];
            $education->last_class_id = $validatedData['last_class_id'];
            $education->sgpa = $validatedData['sgpa'];
            $education->percentage = $validatedData['percentage'];
            $education->update();
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Student Education Not Found !!"
            ]);
        }
        $student= Student::find($this->student_id);
        if($student)
        {
            $student->name = $this->name;
            $student->mobile = $this->mobile;
            $student->mother_name = $validatedData['mother_name'];
            $student->dob = $validatedData['dob'];
            $student->cast_id = $validatedData['cast_id'];
            $student->parent_name = $validatedData['parent_name'];
            $student->parent_mobile = $validatedData['parent_mobile'];
            $student->parent_address = $validatedData['parent_address'];
            $student->local_parent_name = $validatedData['local_parent_name'];
            $student->local_parent_mobile = $validatedData['local_parent_mobile'];
            $student->local_parent_address = $validatedData['local_parent_address'];
            $student->blood_group = $validatedData['blood_group'];
            $student->is_allergy = $validatedData['is_allergy'];
            $student->is_ragging = $this->is_ragging==1?'1':'0';
            $student->gender = $this->gender==1?'1':'0';
            $student->address_type = $this->address_type==1?'1':'0';
            $student->member_id = $this->member_id;
            if($this->photo)
            {
                if($student->photo)
                {
                    File::delete($student->photo);
                }
                $path='uploads/profile/photo/';
                $FileName = 'user-'.time().'.'.$this->photo->getClientOriginalExtension();
                $this->photo->storeAs($path,$FileName,'public');
                $student->photo='storage/'.$path.$FileName ;
                $this->reset('photo');
            }
            $student->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Admission Updated Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Student Not Found !!"
            ]);
        }
    }

    public function view($id)
    {
        $this->viewid=$id;
        $this->setmode('view');
    }


    public function status($id)
    {
        $status = Admission::find($id);
        if($status->status==1)
        {
            $status->status=0;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Admission In Wating List !!"
            ]);
        }elseif($status->status==0)
        {
            $status->status=1;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Admission Confirm Successfully !!"
            ]);
        }
        $status->update();
    }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function softdelete($id)
    {
        $admission = Admission::find($id);
        if ($admission)
        {
            $stdedu= StudentEducation::where('student_id', $admission->student_id)->where('academic_year_id', $admission->academic_year_id)->first();
            if($stdedu){
                $stdedu->delete();
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'error',
                    'message'=>"Something Went Wrong !!"
                ]);
            }
            $admission->delete();
            $this->delete_id=null;
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Admission Deleted Successfully !!"
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
        $admission = Admission::withTrashed()->find($id);
        if ($admission)
        {
            $stdedu= StudentEducation::where('student_id', $admission->student_id)->where('academic_year_id', $admission->academic_year_id)->first();
            if($stdedu){
                $stdedu->delete();
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'error',
                    'message'=>"Something Went Wrong !!"
                ]);
            }
            $admission->restore();
            $this->delete_id=null;
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Admission Restored Successfully !!"
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
        $admission = Admission::withTrashed()->find($this->delete_id);
        if ($admission)
        {
            $stdedu= StudentEducation::where('student_id', $admission->student_id)->where('academic_year_id', $admission->academic_year_id)->first();
            if($stdedu){
                $stdedu->delete();
            }else{
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'error',
                    'message'=>"Something Went Wrong !!"
                ]);
            }
            $admission->forceDelete();
            $this->delete_id=null;
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Admission Deleted Successfully !!"
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

        $today = Carbon::today();
        $this->mindate=$minus15Years = $today->copy()->subYears(15)->format('Y-m-d');
        $this->name = $this->last_name." ".$this->first_name." ".$this->middle_name;
        if (is_numeric($this->sgpa) && $this->sgpa >=1) {
            $this->percentage = (($this->sgpa * 10) - 7.5);
        }

        $academicyears = AcademicYear::select('id','year')->where('status', 0)->orderBy('year', 'DESC')->get();
        $lastacademicyears = AcademicYear::select('id','year')->where('year', '<', function ($query) {
            $query->selectRaw('MAX(year)')->from('academic_years');
        })->orderBy('year', 'DESC')->get();

        $streams=Classes::select('stream')->where('status',0)->distinct('stream')->get();

        if ($this->stream) {
            $types=Classes::select('type')->select('type')->where('status',0)->where('stream',$this->stream)->distinct('type')->get();
        } else {
            $types = [];
        }

        if ($this->stream_type) {
            $classes=Classes::select('id','name')->where('status',0)->where('type',$this->stream_type)->orderBy('name',"ASC")->get();
        } else {
            $classes = [];
        }

        $students=Student::select('id','username')->where('status',0)->orderBy('username',"ASC")->get();
        $casts=Cast::select('id','name')->where('status',0)->orderBy('name',"ASC")->get();

        if ($this->cast_id) {
            $categories =Cast::find($this->cast_id)->category()->orderBy('name', 'ASC')->get();
        } else {
            $categories = [];
        }

        $query =Admission::select('id','academic_year_id','student_id','class_id','seated_id', 'status','deleted_at')->orderBy('academic_year_id', 'DESC');
        if ($this->ad) {
            $admissionIds = Admission::where('id', 'like','%'.$this->ad. '%')->pluck('id');
            $query->whereIn('id', $admissionIds);
        }
        if ($this->a) {
            $academicyearIds = AcademicYear::where('status', 0)->where('year', 'like', '%' . $this->a. '%')->pluck('id');
            $query->whereIn('academic_year_id', $academicyearIds);
        }
        if ($this->s) {
            $studentIds = Student::where('name', 'like','%'. $this->s. '%')->pluck('id');
            $query->whereIn('student_id', $studentIds);
        }
        if ($this->c) {
            $classIds = Classes::where('status', 0)->where('name', 'like', '%' . $this->c. '%')->pluck('id');
            $query->whereIn('class_id', $classIds);
        }

        $admissions = $query->withTrashed()->paginate($this->per_page);

        if($this->viewid!=null)
        {
            $viewadmission=Admission::where('id',$this->viewid)->get();
            $lastclass=StudentEducation::where('admission_id',$this->viewid)->first();
        }
       else
        {
            $viewadmission=null;
            $lastclass=null;
        }
        return view('livewire.backend.Admission.all-Admission',compact('lastacademicyears','categories','casts','lastclass','viewadmission','students','admissions','classes','streams','types','academicyears'))->extends('layouts.admin.admin')->section('admin');
    }
}
