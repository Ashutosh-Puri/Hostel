<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Admission Form
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Admission Form</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading class="btn btn-primary btn-sm " style="padding:10px; ">
                                <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                                <span class="visually-hidden">Loading...</span>
                            </a>
                            <a wire:loading.attr="disabled"  wire:click="setmode('all')"class="btn btn-success ">
                                Back<span class="btn-label-right mx-2"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  wire:submit.prevent="save" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                        Admin Option
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="student_id" class="form-label">Select Student</label>
                                            <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" wire:model="student_id">
                                                <option  hidden value="">Select Students</option>
                                                @foreach($students as $item2)
                                                    <option class="py-4" value="{{ $item2->id  }}">{{  $item2->name!=null?$item2->name: $item2->username; }}</option>
                                                @endforeach
                                            </select>
                                            @error('student_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                        Student Information
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <input type="text"  class="form-control @error('first_name') is-invalid @enderror" wire:model.debounce.500ms="first_name" value="{{ old('first_name') }}" id="first_name" placeholder="Enter First Name">
                                            @error('first_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="middle_name" class="form-label">Middle Name</label>
                                            <input type="text"  class="form-control @error('middle_name') is-invalid @enderror" wire:model.debounce.500ms="middle_name" value="{{ old('middle_name') }}" id="middle_name" placeholder="Enter Middle Name">
                                            @error('middle_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <input type="text"  class="form-control @error('last_name') is-invalid @enderror" wire:model.debounce.500ms="last_name" value="{{ old('last_name') }}" id="last_name" placeholder="Enter Last Name">
                                            @error('last_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="mobile" class="form-label">Mobile</label>
                                                    <input type="text"  class="form-control @error('mobile') is-invalid @enderror" wire:model.debounce.500ms="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Enter Mobile">
                                                    @error('mobile')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="dob" class="form-label">Date Of Birth</label>
                                                    <input type="date" max="{{ $mindate }}" class="form-control @error('dob') is-invalid @enderror" wire:model.debounce.500ms="dob" value="{{ old('dob') }}" id="dob" placeholder=" Select Date Of Birth">
                                                    @error('dob')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="cast_id" class="form-label">Select Cast</label>
                                                    <select class="form-select @error('cast_id') is-invalid @enderror" id="cast_id" wire:model="cast_id">
                                                        <option  hidden value="">Select Cast</option>
                                                        @foreach($casts as $item2)
                                                            <option class="py-4" value="{{ $item2->id  }}">{{  $item2->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('cast_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="category_id" class="form-label">Select Category</label>
                                                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" wire:model="category_id">
                                                        <option  hidden value="">Select Category</option>
                                                        @foreach($categories as $item2)
                                                            <option class="py-4" value="{{ $item2->id  }}">{{  $item2->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="gender" class="form-label">Select Gender</label>
                                                    <select class="form-select  @error('gender') is-invalid @enderror" id="gender" wire:model.debounce.500ms="gender" >
                                                        <option hidden value="" >Select </option>
                                                        <option  value="0">Male</option>
                                                        <option  value="1">Female</option>
                                                    </select>
                                                    @error('gender')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="blood_group" class="form-label">Select Blood Group</label>
                                                    <select class="form-select @error('blood_group') is-invalid @enderror" id="blood_group" wire:model.debounce.500ms="blood_group" >
                                                        <option hidden value="" >Select Blood Group</option>
                                                        <option  value="A+" >A +</option>
                                                        <option  value="A-" >A -</option>
                                                        <option  value="B+" >B +</option>
                                                        <option  value="B-" >B -</option>
                                                        <option  value="O+" >O +</option>
                                                        <option  value="O-" >O -</option>
                                                        <option  value="AB+" >AB +</option>
                                                        <option  value="AB-" >AB -</option>
                                                    </select>
                                                    @error('blood_group')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="member_id" class="form-label">Member ID</label>
                                                    <input type="text" class="form-control @error('member_id') is-invalid @enderror" wire:model.debounce.500ms="member_id" id="member_id" value="{{ old('member_id') }}" placeholder="Enter Member ID">
                                                    @error('member_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    @if ($photo)
                                                        <img src="{{ isset($photo)?$photo->temporaryUrl():asset('assets/images/no_image.jpg'); }}" alt="Image" class="img-fluid mb-3" style="height: 155px; width:150px;" >
                                                    @else
                                                        <img src="{{ isset($photoold)?asset($photoold):asset('assets/images/no_image.jpg'); }}" alt="Image" class="img-fluid mb-3" style="height: 155px; width:150px;" >
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3 form-group">
                                                    <label for="photo" class="form-label">Photo</label>
                                                    <input type="file"  class="form-control @error('photo') is-invalid @enderror" wire:model.debounce.500ms="photo" value="{{ old('photo') }}" id="photo" placeholder="Enter Mobile">
                                                    @error('photo')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <div class="mb-3 form-group">
                                            <label for="is_allergy" class="form-label">Mention should be made in case of serious illness or allergy</label>
                                            <input type="text"class="form-control @error('is_allergy') is-invalid @enderror" wire:model.debounce.500ms="is_allergy" id="is_allergy" value="{{ old('is_allergy') }}" placeholder="Enter About Illness or Allergy ">
                                            @error('is_allergy')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="is_ragging" class="form-label">Were you involved in ragging earlier?</label>
                                            <div class="form-group mt-2 ">
                                                <input class="form-check-input @error('is_ragging') is-invalid @enderror" type="checkbox" value="1" {{ $is_ragging==1?'checked':''; }} id="Class_is_ragging"  wire:model.debounce.500ms="is_ragging" >
                                                <label class="form-check-label m-1" for="Class_is_ragging">Yes</label>
                                                @error('is_ragging')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                        Academic Information
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="academic_year_id" class="form-label">Select Academic Year</label>
                                            <select class="form-select @error('academic_year_id') is-invalid @enderror" id="academic_year_id" wire:model="academic_year_id">
                                                <option  hidden value="">Select Academic Year</option>
                                                @foreach($academicyears as $item2)
                                                    <option class="py-4" value="{{ $item2->id  }}">{{ $item2->year }}</option>
                                                @endforeach
                                            </select>
                                            @error('academic_year_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="stream" class="form-label">Select Stream</label>
                                            <select class="form-select @error('stream') is-invalid @enderror" id="stream" wire:model="stream">
                                                <option  hidden value="">Select Stream</option>
                                                @forelse($streams as $item2)
                                                    <option class="py-4" value="{{ $item2->stream  }}">{{ $item2->stream }}</option>
                                                @empty
                                                    <option  hidden value="">Streams Not Found</option>
                                                @endforelse
                                            </select>
                                            @error('stream')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="stream_type" class="form-label">Select Student Level</label>
                                            <select class="form-select @error('stream_type') is-invalid @enderror" id="stream_type" wire:model="stream_type">
                                                <option  hidden value="">Select Student Level</option>
                                                @forelse ($types as $item2)
                                                    <option class="py-4" value="{{ $item2->type  }}">{{ $item2->type }}</option>
                                                @empty
                                                    <option  hidden value=""> Select Stream First</option>
                                                @endforelse
                                            </select>
                                            @error('stream_type')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="class_id" class="form-label">Select Class</label>
                                            <select class="form-select @error('class_id') is-invalid @enderror" id="class_id" wire:model="class_id">
                                                <option  hidden value="">Select Class</option>
                                                @forelse ($classes as $item2)
                                                    <option class="py-4" value="{{ $item2->id }}">{{ $item2->name }}</option>
                                                @empty
                                                    <option  hidden value=""> Select Student Level First</option>
                                                @endforelse
                                            </select>
                                            @error('class_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                      Previous Educational Information
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="last_academic_year_id" class="form-label">Select Last Academic Year</label>
                                            <select class="form-select @error('last_academic_year_id') is-invalid @enderror" id="last_academic_year_id" wire:model="last_academic_year_id">
                                                <option  hidden value="">Select Last Academic Year</option>
                                                @foreach($lastacademicyears as $item2)
                                                    <option class="py-4" value="{{ $item2->id  }}">{{ $item2->year }}</option>
                                                @endforeach
                                            </select>
                                            @error('last_academic_year_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="last_class_id" class="form-label">Select Last Class</label>
                                            <select class="form-select @error('last_class_id') is-invalid @enderror" id="last_class_id" wire:model="last_class_id">
                                                <option  hidden value="">Select Last Class</option>
                                                @foreach ($classes as $item2)
                                                    <option class="py-4" value="{{ $item2->id }}">{{ $item2->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('last_class_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="sgpa" class="form-label">SGPA</label>
                                            <input type="text"  class="form-control @error('sgpa') is-invalid @enderror" wire:model="sgpa" value="{{ old('sgpa') }}" id="sgpa" placeholder="Enter SGPA">
                                            @error('sgpa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="percentage" class="form-label">Percentage</label>
                                            <input type="text"  class="form-control @error('percentage') is-invalid @enderror" wire:model.debounce.500ms="percentage" value="{{ old('percentage') }}" id="percentage" placeholder="Enter Percentage">
                                            @error('percentage')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                      Parents Information
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="parent_name" class="form-label">Parent Name</label>
                                            <input type="text"   class="form-control @error('parent_name') is-invalid @enderror" wire:model.debounce.500ms="parent_name" value="{{ old('parent_name') }}" id="parent_name" placeholder="Enter Parent Name">
                                            @error('parent_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="parent_mobile" class="form-label">Parent Mobile Number</label>
                                            <input type="text"   class="form-control @error('parent_mobile') is-invalid @enderror" wire:model.debounce.500ms="parent_mobile" value="{{ old('parent_mobile') }}" id="parent_mobile" placeholder="Enter Parent Mobile Number">
                                            @error('parent_mobile')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="mother_name" class="form-label">Mother Name</label>
                                            <input type="text"  class="form-control @error('mother_name') is-invalid @enderror" wire:model.debounce.500ms="mother_name" value="{{ old('mother_name') }}" id="mother_name" placeholder="Enter Mother Name">
                                            @error('mother_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="local_parent_name" class="form-label">Parent Name In Sangamner</label>
                                            <input type="text"   class="form-control @error('local_parent_name') is-invalid @enderror" wire:model.debounce.500ms="local_parent_name" value="{{ old('local_parent_name') }}" id="local_parent_name" placeholder="Enter Parent Name In Sangamner">
                                            @error('local_parent_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="local_parent_mobile" class="form-label">Parent Mobile Number In Sangamner</label>
                                            <input type="text"   class="form-control @error('local_parent_mobile') is-invalid @enderror" wire:model.debounce.500ms="local_parent_mobile" value="{{ old('local_parent_mobile') }}" id="local_parent_mobile" placeholder="Enter Parent Mobile Number In Sangamner">
                                            @error('local_parent_mobile')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                     Address Information
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-2">
                                        <div class="mb-3 form-group">
                                            <label for="address_type" class="form-label">Select Address Type</label>
                                            <select class="form-select  @error('address_type') is-invalid @enderror" id="address_type" wire:model.debounce.500ms="address_type" >
                                                <option hidden value="" >Select </option>
                                                <option  value="0" >Rural</option>
                                                <option  value="1" >Urbon</option>
                                            </select>
                                            @error('address_type')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="mb-3 form-group">
                                            <label for="parent_address" class="form-label">Parent Address</label>
                                            <textarea class="form-control @error('parent_address') is-invalid @enderror" wire:model.debounce.500ms="parent_address" id="parent_address" placeholder="Enter Parent Address"   cols="30" rows="1"> {{ old('parent_address') }}{{ $parent_address }}</textarea>
                                            @error('parent_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="mb-3 form-group">
                                            <label for="local_parent_address" class="form-label">Parent Address In Sangamner</label>
                                            <textarea class="form-control @error('local_parent_address') is-invalid @enderror" wire:model.debounce.500ms="local_parent_address" id="local_parent_address" placeholder="Enter Parent Address In Sangamner"   cols="30" rows="3">{{ old('local_parent_address') }} {{ $local_parent_address }}</textarea>
                                            @error('local_parent_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"  class="btn btn-primary ">Save Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=='edit')
            @section('title')
                Edit Admission Form
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Admission Form</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading.attr="disabled"  wire:click="setmode('all')"class="btn btn-success ">
                                Back<span class="btn-label-right mx-2"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  wire:submit.prevent="update({{ isset($c_id)?$c_id:''; }})" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                        Admin Option
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="student_id" class="form-label">Select Student</label>
                                            <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" wire:model="student_id">
                                                <option  hidden value="">Select Students</option>
                                                @foreach($students as $item2)
                                                    <option class="py-4" value="{{ $item2->id  }}">{{  $item2->name!=null?$item2->name: $item2->username; }}</option>
                                                @endforeach
                                            </select>
                                            @error('student_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                        Student Information
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <input type="text"  class="form-control @error('first_name') is-invalid @enderror" wire:model.debounce.500ms="first_name" value="{{ old('first_name') }}" id="first_name" placeholder="Enter First Name">
                                            @error('first_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="middle_name" class="form-label">Middle Name</label>
                                            <input type="text"  class="form-control @error('middle_name') is-invalid @enderror" wire:model.debounce.500ms="middle_name" value="{{ old('middle_name') }}" id="middle_name" placeholder="Enter Middle Name">
                                            @error('middle_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <input type="text"  class="form-control @error('last_name') is-invalid @enderror" wire:model.debounce.500ms="last_name" value="{{ old('last_name') }}" id="last_name" placeholder="Enter Last Name">
                                            @error('last_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="mobile" class="form-label">Mobile</label>
                                                    <input type="text"  class="form-control @error('mobile') is-invalid @enderror" wire:model.debounce.500ms="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Enter Mobile">
                                                    @error('mobile')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="dob" class="form-label">Date Of Birth</label>
                                                    <input type="date" max="{{ $mindate }}" class="form-control @error('dob') is-invalid @enderror" wire:model.debounce.500ms="dob" value="{{ old('dob') }}" id="dob" placeholder=" Select Date Of Birth">
                                                    @error('dob')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="cast_id" class="form-label">Select Cast</label>
                                                    <select class="form-select @error('cast_id') is-invalid @enderror" id="cast_id" wire:model="cast_id">
                                                        <option  hidden value="">Select Cast</option>
                                                        @foreach($casts as $item2)
                                                            <option class="py-4" value="{{ $item2->id  }}">{{  $item2->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('cast_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="category_id" class="form-label">Select Category</label>
                                                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" wire:model="category_id">
                                                        <option  hidden value="">Select Category</option>
                                                        @foreach($categories as $item2)
                                                            <option class="py-4" value="{{ $item2->id  }}">{{  $item2->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="gender" class="form-label">Select Gender</label>
                                                    <select class="form-select  @error('gender') is-invalid @enderror" id="gender" wire:model.debounce.500ms="gender" >
                                                        <option hidden value="" >Select </option>
                                                        <option  value="0">Male</option>
                                                        <option  value="1">Female</option>
                                                    </select>
                                                    @error('gender')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="blood_group" class="form-label">Select Blood Group</label>
                                                    <select class="form-select @error('blood_group') is-invalid @enderror" id="blood_group" wire:model.debounce.500ms="blood_group" >
                                                        <option hidden value="" >Select Blood Group</option>
                                                        <option  value="A+" >A +</option>
                                                        <option  value="A-" >A -</option>
                                                        <option  value="B+" >B +</option>
                                                        <option  value="B-" >B -</option>
                                                        <option  value="O+" >O +</option>
                                                        <option  value="O-" >O -</option>
                                                        <option  value="AB+" >AB +</option>
                                                        <option  value="AB-" >AB -</option>
                                                    </select>
                                                    @error('blood_group')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="member_id" class="form-label">Member ID</label>
                                                    <input type="text" class="form-control @error('member_id') is-invalid @enderror" wire:model.debounce.500ms="member_id" id="member_id" value="{{ old('member_id') }}" placeholder="Enter Member ID">
                                                    @error('member_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    @if ($photo)
                                                    <img src="{{ isset($photo)?$photo->temporaryUrl():asset('assets/images/no_image.jpg'); }}" alt="Image" class="img-fluid mb-3" style="height: 155px; width:150px;" >
                                                    @else
                                                        <img src="{{ isset($photoold)?asset($photoold):asset('assets/images/no_image.jpg'); }}" alt="Image" class="img-fluid mb-3" style="height: 155px; width:150px;" >
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3 form-group">
                                                    <label for="photo" class="form-label">Photo</label>
                                                    <input type="file"  class="form-control @error('photo') is-invalid @enderror" wire:model.debounce.500ms="photo" value="{{ old('photo') }}" id="photo" placeholder="Enter Mobile">
                                                    @error('photo')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <div class="mb-3 form-group">
                                            <label for="is_allergy" class="form-label">Mention should be made in case of serious illness or allergy</label>
                                            <input type="text"class="form-control @error('is_allergy') is-invalid @enderror" wire:model.debounce.500ms="is_allergy" id="is_allergy" value="{{ old('is_allergy') }}" placeholder="Enter About Illness or Allergy ">
                                            @error('is_allergy')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="is_ragging" class="form-label">Were you involved in ragging earlier?</label>
                                            <div class="form-group mt-2 ">
                                                <input class="form-check-input @error('is_ragging') is-invalid @enderror" type="checkbox" value="1" {{ $is_ragging==1?'checked':''; }} id="Class_is_ragging"  wire:model.debounce.500ms="is_ragging" >
                                                <label class="form-check-label m-1" for="Class_is_ragging">Yes</label>
                                                @error('is_ragging')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                        Academic Information
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="academic_year_id" class="form-label">Select Academic Year</label>
                                            <select class="form-select @error('academic_year_id') is-invalid @enderror" id="academic_year_id" wire:model="academic_year_id">
                                                <option  hidden value="">Select Academic Year</option>
                                                @foreach($academicyears as $item2)
                                                    <option class="py-4" value="{{ $item2->id  }}">{{ $item2->year }}</option>
                                                @endforeach
                                            </select>
                                            @error('academic_year_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="stream" class="form-label">Select Stream</label>
                                            <select class="form-select @error('stream') is-invalid @enderror" id="stream" wire:model="stream">
                                                <option  hidden value="">Select Stream</option>
                                                @foreach($streams as $item2)
                                                    <option class="py-4" value="{{ $item2->stream }}">{{ $item2->stream }}</option>
                                                @endforeach
                                            </select>
                                            @error('stream')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="stream_type" class="form-label">Select Student Level</label>
                                            <select class="form-select @error('stream_type') is-invalid @enderror" id="stream_type" wire:model="stream_type">
                                                <option  hidden value="">Select Student Level</option>
                                                @forelse ($types as $item2)
                                                    <option class="py-4" value="{{ $item2->type  }}">{{ $item2->type }}</option>
                                                @empty
                                                    <option  hidden value=""> Select Stream First</option>
                                                @endforelse
                                            </select>
                                            @error('stream_type')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="class_id" class="form-label">Select Class</label>
                                            <select class="form-select @error('class_id') is-invalid @enderror" id="class_id" wire:model="class_id">
                                                <option  hidden value="">Select Class</option>
                                                @forelse ($classes as $item2)
                                                    <option class="py-4" value="{{ $item2->id }}">{{ $item2->name }}</option>
                                                @empty
                                                    <option  hidden value=""> Select Student Level First</option>
                                                @endforelse
                                            </select>
                                            @error('class_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                      Previous Educational Information
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="last_academic_year_id" class="form-label">Select Last Academic Year</label>
                                            <select class="form-select @error('last_academic_year_id') is-invalid @enderror" id="last_academic_year_id" wire:model="last_academic_year_id">
                                                <option  hidden value="">Select Last Academic Year</option>
                                                @foreach($lastacademicyears as $item2)
                                                    <option class="py-4" value="{{ $item2->id  }}">{{ $item2->year }}</option>
                                                @endforeach
                                            </select>
                                            @error('last_academic_year_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="last_class_id" class="form-label">Select Last Class</label>
                                            <select class="form-select @error('last_class_id') is-invalid @enderror" id="last_class_id" wire:model="last_class_id">
                                                <option  hidden value="">Select Last Class</option>
                                                @foreach ($classes as $item2)
                                                    <option class="py-4" value="{{ $item2->id }}">{{ $item2->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('last_class_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="sgpa" class="form-label">SGPA</label>
                                            <input type="text"  class="form-control @error('sgpa') is-invalid @enderror" wire:model="sgpa" value="{{ old('sgpa') }}" id="sgpa" placeholder="Enter SGPA">
                                            @error('sgpa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="percentage" class="form-label">Percentage</label>
                                            <input type="text"  class="form-control @error('percentage') is-invalid @enderror" wire:model.debounce.500ms="percentage" value="{{ old('percentage') }}" id="percentage" placeholder="Enter Percentage">
                                            @error('percentage')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                      Parents Information
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="parent_name" class="form-label">Parent Name</label>
                                            <input type="text"   class="form-control @error('parent_name') is-invalid @enderror" wire:model.debounce.500ms="parent_name" value="{{ old('parent_name') }}" id="parent_name" placeholder="Enter Parent Name">
                                            @error('parent_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="parent_mobile" class="form-label">Parent Mobile Number</label>
                                            <input type="text"   class="form-control @error('parent_mobile') is-invalid @enderror" wire:model.debounce.500ms="parent_mobile" value="{{ old('parent_mobile') }}" id="parent_mobile" placeholder="Enter Parent Mobile Number">
                                            @error('parent_mobile')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="mother_name" class="form-label">Mother Name</label>
                                            <input type="text"  class="form-control @error('mother_name') is-invalid @enderror" wire:model.debounce.500ms="mother_name" value="{{ old('mother_name') }}" id="mother_name" placeholder="Enter Mother Name">
                                            @error('mother_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="local_parent_name" class="form-label">Parent Name In Sangamner</label>
                                            <input type="text"   class="form-control @error('local_parent_name') is-invalid @enderror" wire:model.debounce.500ms="local_parent_name" value="{{ old('local_parent_name') }}" id="local_parent_name" placeholder="Enter Parent Name In Sangamner">
                                            @error('local_parent_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="local_parent_mobile" class="form-label">Parent Mobile Number In Sangamner</label>
                                            <input type="text"   class="form-control @error('local_parent_mobile') is-invalid @enderror" wire:model.debounce.500ms="local_parent_mobile" value="{{ old('local_parent_mobile') }}" id="local_parent_mobile" placeholder="Enter Parent Mobile Number In Sangamner">
                                            @error('local_parent_mobile')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                     Address Information
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-2">
                                        <div class="mb-3 form-group">
                                            <label for="address_type" class="form-label">Select Address Type</label>
                                            <select class="form-select  @error('address_type') is-invalid @enderror" id="address_type" wire:model.debounce.500ms="address_type" >
                                                <option hidden value="" >Select </option>
                                                <option  value="0">Rural</option>
                                                <option  value="1">Urban</option>
                                            </select>
                                            @error('address_type')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="mb-3 form-group">
                                            <label for="parent_address" class="form-label">Parent Address</label>
                                            <textarea class="form-control @error('parent_address') is-invalid @enderror" wire:model.debounce.1000ms="parent_address" id="parent_address" placeholder="Enter Parent Address"   cols="30" rows="1"> {{ $parent_address }}</textarea>
                                            @error('parent_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="mb-3 form-group">
                                            <label for="local_parent_address" class="form-label">Parent Address In Sangamner</label>
                                            <textarea class="form-control @error('local_parent_address') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_address" id="local_parent_address" placeholder="Enter Parent Address In Sangamner"   cols="30" rows="3">{{ $local_parent_address }}</textarea>
                                            @error('local_parent_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"  class="btn btn-primary ">Update Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=="view")
            <div>
                @section('title')
                View Admission Form
             @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>View Admission Form</h2>
                            </div>
                            <div class="float-end">
                                <a wire:loading.attr="disabled"  wire:click="setmode('all')"class="btn btn-success ">
                                    Back<span class="btn-label-right mx-2"><i class="mdi mdi-arrow-left-thick"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-6 col-md-3 mb-3">
                                        <label for="">Admission ID :</label>
                                        <label for="">{{ $viewadmission[0]->id }}</label>
                                    </div>
                                    <div class="col-6 col-md-3 mb-3">
                                        <label for="">Status :</label>
                                        <label>
                                            @if ( $viewadmission[0]->status == '0')
                                                <span class="badge bg-warning text-white">Wating</span>
                                            @elseif( $viewadmission[0]->status == '1')
                                                <span class="badge bg-success text-white">Confirmed</span>
                                            @else
                                                <span class="badge bg-danger text-white">Canceled</span>
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-6 col-md-3 mb-3">
                                        <label for="">seated:</label>
                                        <label for="">
                                            @if ( $viewadmission[0]->seated_id==null)
                                            <span class="badge bg-danger text-white">NA</span>
                                            @else
                                            <span class="badge bg-success mx-1 text-white">{{ $viewadmission[0]->seated->seated." seated"; }}</span>
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-6 col-md-3 mb-3">
                                        @if ($viewadmission[0]->status!=2)
                                            @if ($viewadmission[0]->status==1)
                                                <a wire:loading.attr="disabled"  wire:click="status({{ $viewadmission[0]->id }})" class="btn btn-warning "> <i class="mdi mdi-clock"></i> </a>
                                            @elseif ($viewadmission[0]->status==0)
                                                <a wire:loading.attr="disabled"  wire:click="status({{ $viewadmission[0]->id }})" class="btn btn-success "> <i class="mdi mdi-thumb-up"></i> </a>
                                            @endif
                                            <a wire:loading.attr="disabled"  wire:click="cancel({{ $viewadmission[0]->id }})" class="btn btn-danger "><i class="mdi mdi-thumb-down"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 text-center mb-3">
                                    <hr>
                                        <h3 for="">Student Information</h3>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-2 text-center mb-3 border p-2">
                                        <img src="{{ asset($viewadmission[0]->Student->photo) }}" alt="" style="max-width: 160px; height: 200px;" class=" mx-auto d-block img-fluid ">
                                    </div>
                                    <div class="col-12 col-md-10 mb-3">
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="">Member ID :</label>
                                                <label for="">{{ $viewadmission[0]->Student->member_id }}</label>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="">Student Name :</label>
                                                <label for="">{{ $viewadmission[0]->Student->name }}</label>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="">Email :</label>
                                                <label for="">{{ $viewadmission[0]->Student->email }}</label>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="">Mobile :</label>
                                                <label for="">{{ $viewadmission[0]->Student->mobile }}</label>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="">Date Of Birth :</label>
                                                <label for="">{{ $viewadmission[0]->Student->dob }}</label>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="">Gender:</label>
                                                <label for="">{{ $viewadmission[0]->Student->gender==1?'Female':'Male'; }}</label>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="">Cast :</label>
                                                <label for="">{{ $viewadmission[0]->Student->Cast->name }}</label>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="">Category :</label>
                                                <label for="">{{ $viewadmission[0]->Student->Cast->Category->name}}</label>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="">Blood Group :</label>
                                                <label for="">{{ $viewadmission[0]->Student->blood_group }}</label>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="">Are you involved in ragging? :</label>
                                                <label for="">{{ $viewadmission[0]->Student->is_ragging==0?'No':'Yes'; }}</label>
                                            </div>
                                            <div class="col-12 col-md-12 mb-3">
                                                <label for="">Illness / Allergy :</label>
                                                <label for="">{{ $viewadmission[0]->Student->is_allergy==null?'No':$viewadmission[0]->Student->is_allergy; }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 text-center mb-3">
                                    <hr>
                                        <h3 for="">Academic Information</h3>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-4">
                                        <label for="">Academic Year :</label>
                                        <label for="">{{ $viewadmission[0]->AcademicYear->year.' - '.$viewadmission[0]->AcademicYear->year+1 }}</label>
                                    </div>
                                    <div class="col-12 col-md-3 mb-4">
                                        <label for="">Stream :</label>
                                        <label for="">{{ $viewadmission[0]->Class->stream }}</label>
                                    </div>
                                    <div class="col-12 col-md-3 mb-4">
                                        <label for="">Student Level :</label>
                                        <label for="">{{ $viewadmission[0]->Class->type }}</label>
                                    </div>
                                    <div class="col-12 col-md-3 mb-4">
                                        <label for="">Class :</label>
                                        <label for="">{{ $viewadmission[0]->Class->name }}</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 text-center mb-3">
                                    <hr>
                                        <h3 for="">Previous Qualification Information</h3>
                                    <hr>
                                </div>
                                <div class="row">
                                    @if (isset($lastclass->sgpa))
                                        <div class="col-12 col-md-3 mb-4">
                                            <label for="">Academic Year :</label>
                                            <label for="">{{ $lastclass->AcademicYear->year}} - {{ $lastclass->AcademicYear->year+1}}</label>
                                        </div>
                                        <div class="col-12 col-md-3 mb-4">
                                            <label for="">Class :</label>
                                            <label for="">{{ $lastclass->Class->name }}</label>
                                        </div>
                                        <div class="col-12 col-md-3 mb-3">
                                            <label for="">SGPA :</label>
                                            <label for="">{{ $lastclass->sgpa}}</label>
                                        </div>
                                        <div class="col-12 col-md-3 mb-3">
                                            <label for="">Percentage :</label>
                                            <label for="">&nbsp;{{ $lastclass->percentage }} %</label>
                                        </div>
                                    @else
                                        <div class="col-12 col-md-4 mb-4">
                                            <label for="">Academic Year :</label>
                                            <label for="">{{ $lastclass->AcademicYear->year}} - {{ $lastclass->AcademicYear->year+1}}</label>
                                        </div>
                                        <div class="col-12 col-md-4 mb-4">
                                            <label for="">Class :</label>
                                            <label for="">{{ $lastclass->class->name }}</label>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="">Percentage :</label>
                                            <label for="">&nbsp;{{ $lastclass->percentage }} %</label>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-12 text-center mb-3">
                                    <hr>
                                        <h3 for="">Parent Information</h3>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4 mb-4">
                                        <label for="">Parents Name :</label>
                                        <label for="">{{ $viewadmission[0]->Student->parent_name }}</label>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="">Parent Mobile :</label>
                                        <label for="">{{ $viewadmission[0]->Student->parent_mobile }}</label>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="">Mother Name :</label>
                                        <label for="">{{ $viewadmission[0]->Student->mother_name }}</label>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="">Address Type :</label>
                                        <label for="">{{ $viewadmission[0]->Student->adress_type==0?'Rural':'Urbon'; }}</label>
                                    </div>
                                    <div class="col-12 col-md-8 mb-3">
                                        <label for="">Parent Address :</label>
                                        <label for="">{{ $viewadmission[0]->Student->parent_address }}</label>
                                    </div>
                                </div>
                                @if ($viewadmission[0]->Student->local_parent_name || $viewadmission[0]->Student->local_parent_mobile || $viewadmission[0]->Student->local_parent_address)
                                    <div class="col-12 col-md-12 text-center mb-3">
                                        <hr>
                                            <h3 for="">Parent Live In Sangamner Information</h3>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        @if ($viewadmission[0]->Student->local_parent_name)
                                            <div class="col-12 col-md-4 mb-4">
                                                <label for="">Parent Name :</label>
                                                <label for="">{{ $viewadmission[0]->Student->local_parent_name }}</label>
                                            </div>
                                        @endif
                                        @if ($viewadmission[0]->Student->local_parent_mobile)
                                            <div class="col-12 col-md-3 mb-3">
                                                <label for="">Parent Mobile :</label>
                                                <label for="">{{ $viewadmission[0]->Student->local_parent_mobile }}</label>
                                            </div>
                                        @endif
                                        @if ($viewadmission[0]->Student->local_parent_address)
                                            <div class="col-12 col-md-5 mb-3">
                                                <label for="">Parent Address :</label>
                                                <label for="">{{ $viewadmission[0]->Student->local_parent_address }}</label>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=="all")
            <div>
                @section('title')
                    All Admissions
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Data Admission Forms</h2>
                                <div wire:loading wire:target="per_page" class="loading-overlay">
                                    <div class="loading-spinner">
                                        <div class="spinner-border spinner-border-lg text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <a wire:loading class="btn btn-primary btn-sm " style="padding:10px; ">
                                    <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                                    <span class="visually-hidden">Loading...</span>
                                </a>
                                @can('Add Admission')
                                    <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success ">
                                        Add Admission Form<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <label class=" col-4 col-md-1 py-1 ">Per Page</label>
                                    <select class=" col-4 col-md-1" wire:loading.attr="disabled" wire:model="per_page">
                                        <option value="10">10</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                    </select>
                                    <label class=" col-4 col-md-1  py-1 ">Records</label>
                                    <span class="col-12 col-md-9 p-0">
                                            <div class="row ">
                                                <div class="col-12 col-md-2 ">
                                                    <label class="w-100 p-1  text-md-end">Search</label>
                                                </div>
                                                <div class="col-12 col-md-2 ">
                                                    <input  class="w-100" wire:model.debounce.1000ms="ad" type="search" placeholder="Admission ID ">
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <input  class="w-100" wire:model.debounce.1000ms="a" type="search" placeholder="Academic Year">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input class="w-100"  wire:model.debounce.1000ms="s" type="search" placeholder="Student Name">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input class="w-100"  wire:model.debounce.1000ms="c" type="search" placeholder="Class Name">
                                                </div>
                                            </div>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="data-table" class="table  dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Academic Year</th>
                                            <th>Student Name</th>
                                            <th>Class Name</th>
                                            <th>seated</th>
                                            <th>Status</th>
                                            @can('View Admission Form')
                                                <th>Action</th>
                                            @elsecan('Edit Admission')
                                                <th>Action</th>
                                            @elsecan('Delete Admission')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admissions as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->AcademicYear->year }}</td>
                                                <td>{{ $item->Student->name!=null?$item->Student->name: $item->Student->username; }}</td>
                                                <td>{{ $item->Class->name}}</td>
                                                <td>{{ isset($item->seated->seated)?$item->seated->seated." seated":'NA'; }}</td>
                                                <td>
                                                    @if ( $item->status == '0')
                                                        <span class="badge bg-warning text-white">Wating</span>
                                                    @elseif ( $item->status == '1')
                                                        <span class="badge bg-success text-white">Confirmed</span>
                                                    @else
                                                        <span class="badge bg-danger text-white">Canceled</span>
                                                    @endif
                                                </td>
                                                @can('View Admission Form')
                                                    <td>
                                                        @can('View Admission Form')
                                                            <a   target="_blank"  class="btn btn-warning " href="{{ route('view_admission_form', $item->id) }}"> <i class="mdi mdi-eye"></i></a>
                                                        @endcan
                                                        @can('Download Admission Form')
                                                            <a   target="_blank"  class="btn btn-warning " href="{{ route('download_admission_form', $item->id) }}"> <i class="mdi mdi-download"></i></a>
                                                        @endcan
                                                        @can('Edit Admission')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-primary "><i class="mdi mdi-lead-pencil"></i></a>
                                                            @if ($item->status==1)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-warning "> <i class="mdi mdi-clock"></i> </a>
                                                            @elseif ($item->status==0)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-thumb-up"></i> </a>
                                                            @endif
                                                            @if ($item->status!=2)
                                                                <a wire:loading.attr="disabled"  wire:click="cancel({{ $item->id }})" class="btn btn-danger "><i class="mdi mdi-thumb-down"></i></a>
                                                            @endif
                                                        @endcan
                                                        @can('Delete Admission')
                                                            @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                        @endcan
                                                    </td>
                                                @elsecan('Edit Admission')
                                                    <td>
                                                        @can('View Admission Form')
                                                            <a   target="_blank"  class="btn btn-warning " href="{{ route('view_admission_form', $item->id) }}"> <i class="mdi mdi-eye"></i></a>
                                                        @endcan
                                                        @can('Download Admission Form')
                                                            <a   target="_blank"  class="btn btn-warning " href="{{ route('download_admission_form', $item->id) }}"> <i class="mdi mdi-download"></i></a>
                                                        @endcan
                                                        @can('Edit Admission')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-primary "><i class="mdi mdi-lead-pencil"></i></a>
                                                            @if ($item->status==1)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-warning "> <i class="mdi mdi-clock"></i> </a>
                                                            @elseif ($item->status==0)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-thumb-up"></i> </a>
                                                            @endif
                                                            @if ($item->status!=2)
                                                                <a wire:loading.attr="disabled"  wire:click="cancel({{ $item->id }})" class="btn btn-danger "><i class="mdi mdi-thumb-down"></i></a>
                                                            @endif
                                                        @endcan
                                                        @can('Delete Admission')
                                                            @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                        @endcan
                                                    </td>
                                                @elsecan('Delete Admission')
                                                    <td>
                                                         @can('View Admission Form')
                                                            <a   target="_blank"  class="btn btn-warning " href="{{ route('view_admission_form', $item->id) }}"> <i class="mdi mdi-eye"></i></a>
                                                        @endcan
                                                        @can('Download Admission Form')
                                                            <a   target="_blank"  class="btn btn-warning " href="{{ route('download_admission_form', $item->id) }}"> <i class="mdi mdi-download"></i></a>
                                                        @endcan
                                                        @can('Edit Admission')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-primary "><i class="mdi mdi-lead-pencil"></i></a>
                                                            @if ($item->status==1)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-warning "> <i class="mdi mdi-clock"></i> </a>
                                                            @elseif ($item->status==0)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-thumb-up"></i> </a>
                                                            @endif
                                                            @if ($item->status!=2)
                                                                <a wire:loading.attr="disabled"  wire:click="cancel({{ $item->id }})" class="btn btn-danger "><i class="mdi mdi-thumb-down"></i></a>
                                                            @endif
                                                        @endcan
                                                        @can('Delete Admission')
                                                            @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                        @endcan
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $admissions->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

