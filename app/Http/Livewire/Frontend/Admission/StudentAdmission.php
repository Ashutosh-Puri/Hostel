<?php

namespace App\Http\Livewire\Frontend\Admission;

use App\Models\Cast;
use App\Models\Classes;
use App\Models\Student;
use Livewire\Component;
use App\Models\Category;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Models\StudentEducation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class StudentAdmission extends Component
{   
    use WithPagination;
    use WithFileUploads;
    protected $listeners = ['delete-confirmed'=>'delete'];
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
        $this->academic_year_id=null;
        $this->last_academic_year_id=null;
        // $this->student_id=null;
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
            'gender'=>['required','integer','in:0,1' ],
            'academic_year_id'=>['required','integer',Rule::exists(AcademicYear::class, 'id')],
            'last_academic_year_id'=>['required','integer',Rule::exists(AcademicYear::class, 'id')],
            'first_name'=>['required','string','max:255'],
            'middle_name'=>['required','string','max:255'],
            'last_name'=>['required','string','max:255'],
            'dob'=>['required','date','before_or_equal:15 years ago'],
            'cast_id'=>['required','integer',Rule::exists(Cast::class, 'id')],
            'category_id'=>['required','integer',Rule::exists(Category::class, 'id')],
            'blood_group'=>['required','string','max:255'],    
            'stream'=>['required','string','max:255'],
            'stream_type'=>['required','string','max:255'],
            'class_id'=>['required','integer',Rule::exists(Classes::class, 'id')],
            'last_class_id'=>['required','integer',Rule::exists(Classes::class, 'id')],
            'percentage'=>['required','numeric','min:0','max:100'],
            'sgpa'=>['nullable','numeric','min:0.00','max:10.00'],
            'parent_name'=>['required','string','max:255'],
            'mother_name'=>['required','string','max:255'],
            'parent_mobile'=>['required','numeric','digits:10'],
            'parent_address'=>['required','string','max:255'],
            'local_parent_name'=>['nullable','string','max:255'],
            'local_parent_mobile'=>['nullable','numeric','digits:10'],
            'local_parent_address'=>['nullable','string','max:255'],
            'address_type'=>['required','integer','max:255'],
            'is_allergy'=>['nullable','string','max:255'],
            'is_ragging'=>['nullable','in:0,1'],
            'mobile'=>['required','numeric','digits:10'],
            'member_id'=>['required','numeric','unique:students,member_id,'.($this->mode=='edit'? $this->student_id :($this->mode=='add'? Auth::user()->id :'')),],
            'photo'=>[($this->mode=='edit'? 'nullable' : ($this->photoold!=null? 'nullable' : 'required')),'image','mimes:jpeg,jpg,png','max:1024'],
        ];
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
        if($mode=="add")
        {   
            $this->resetinput();
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
        $validatedData = $this->validate();
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
            $admission->student_id =$this->student_id;
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
            $education->student_id =$this->student_id;
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
            if ($student->status==0)
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
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Your Admission Is Confirmed Please Contact The Administrator To Request Cancellation Of The Admission Form.!!"
            ]);
        }
       
    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $admission = Admission::find($id);
        if($admission){
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
            $education =new StudentEducation;
            $education->student_id=$this->student_id;
            $education->admission_id=$id;
            $education->academic_year_id=$validatedData['last_academic_year_id'];
            $education->last_class_id = $validatedData['last_class_id'];
            $education->sgpa = $validatedData['sgpa'];
            $education->percentage = $validatedData['percentage'];
            $education->save();
        }
        $student= Student::find($this->student_id);
        if($student)
        {
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
            $student->is_ragging = $this->is_ragging==1?'1':'0';
            $student->address_type = $this->address_type==1?'1':'0';
            $student->gender = $this->gender==1?'1':'0';
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


    public function render()
    {   
        $this->student_id=Auth::guard('student')->user()->id;

        $academicyears = AcademicYear::where('status', 0)->orderBy('year', 'DESC')->get();
        $hasAdmission = true;
        foreach ($academicyears as $academicYear) {
            $admission = Admission::where('academic_year_id', $academicYear->id)->where('student_id',$this->student_id)->first();
            if (!is_null($admission)) {
                $hasAdmission = false;
                break;
            }
        }

        $today = Carbon::today();
        $this->mindate=$minus15Years = $today->copy()->subYears(15)->format('Y-m-d');
        $this->name = $this->last_name." ".$this->first_name." ".$this->middle_name;
        if (is_numeric($this->sgpa) && $this->sgpa >=1) {
            $this->percentage = (($this->sgpa * 10) - 7.5);
        }
        $lastacademicyears = AcademicYear::where('year', '<', function ($query) { 
            $query->selectRaw('MAX(year)')->from('academic_years');
        })->orderBy('year', 'DESC')->get();
        $streams=Classes::select('stream')->where('status',0)->distinct('stream')->get();
        $types=Classes::select('type')->where('status',0)->where('stream',$this->stream)->distinct('type')->get();
        $classes=Classes::select('id','name')->where('status',0)->where('type',$this->stream_type)->orderBy('name',"ASC")->get();

        $casts=Cast::where('status',0)->orderBy('name',"ASC")->get();
        $query =Admission::orderBy('academic_year_id', 'DESC');
        if ($this->cast_id) {
            $categories =Cast::find($this->cast_id)->category()->orderBy('name', 'ASC')->get();
        } else { 
            $categories = [];
        }

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
        $admissions = Admission::where('student_id',$this->student_id)->paginate($this->per_page);
        return view('livewire.frontend.admission.student-admission',compact('hasAdmission','lastacademicyears','categories','casts','lastclass','viewadmission','admissions','classes','streams','types','academicyears'))->extends('layouts.student.student')->section('student');
    }
}
