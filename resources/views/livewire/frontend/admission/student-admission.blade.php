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
                                        Student Information
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <input type="text"  class="form-control @error('first_name') is-invalid @enderror" wire:model.debounce.1000ms="first_name" value="{{ old('first_name') }}" id="first_name" placeholder="Enter First Name">
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
                                            <input type="text"  class="form-control @error('middle_name') is-invalid @enderror" wire:model.debounce.1000ms="middle_name" value="{{ old('middle_name') }}" id="middle_name" placeholder="Enter Middle Name">
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
                                            <input type="text"  class="form-control @error('last_name') is-invalid @enderror" wire:model.debounce.1000ms="last_name" value="{{ old('last_name') }}" id="last_name" placeholder="Enter Last Name">
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
                                                    <input type="text"  class="form-control @error('mobile') is-invalid @enderror" wire:model.debounce.1000ms="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Enter Mobile">
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
                                                    <input type="date" max="{{ $mindate }}" class="form-control @error('dob') is-invalid @enderror" wire:model.debounce.1000ms="dob" value="{{ old('dob') }}" id="dob" placeholder=" Select Date Of Birth">
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
                                                        <option hidden  >Select </option>
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
                                                    <select class="form-select @error('blood_group') is-invalid @enderror" id="blood_group" wire:model.debounce.1000ms="blood_group" >
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
                                                    <input type="text" class="form-control @error('member_id') is-invalid @enderror" wire:model.debounce.1000ms="member_id" id="member_id" value="{{ old('member_id') }}" placeholder="Enter Member ID">
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
                                                    <input type="file"  class="form-control @error('photo') is-invalid @enderror" wire:model.debounce.1000ms="photo" value="{{ old('photo') }}" id="photo" placeholder="Enter Mobile">
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
                                            <input type="text"class="form-control @error('is_allergy') is-invalid @enderror" wire:model.debounce.1000ms="is_allergy" id="is_allergy" value="{{ old('is_allergy') }}" placeholder="Enter About Illness or Allergy ">
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
                                                <input class="form-check-input @error('is_ragging') is-invalid @enderror" type="checkbox" value="1" {{ $is_ragging==1?'checked':''; }} id="class_is_ragging"  wire:model.debounce.1000ms="is_ragging" >
                                                <label class="form-check-label m-1" for="class_is_ragging">Yes</label>
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
                                            <input type="text"   class="form-control @error('parent_name') is-invalid @enderror" wire:model.debounce.1000ms="parent_name" value="{{ old('parent_name') }}" id="parent_name" placeholder="Enter Parent Name">
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
                                            <input type="text"   class="form-control @error('parent_mobile') is-invalid @enderror" wire:model.debounce.1000ms="parent_mobile" value="{{ old('parent_mobile') }}" id="parent_mobile" placeholder="Enter Parent Mobile Number">
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
                                            <input type="text"  class="form-control @error('mother_name') is-invalid @enderror" wire:model.debounce.1000ms="mother_name" value="{{ old('mother_name') }}" id="mother_name" placeholder="Enter Mother Name">
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
                                            <input type="text"   class="form-control @error('local_parent_name') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_name" value="{{ old('local_parent_name') }}" id="local_parent_name" placeholder="Enter Parent Name In Sangamner">
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
                                            <input type="text"   class="form-control @error('local_parent_mobile') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_mobile" value="{{ old('local_parent_mobile') }}" id="local_parent_mobile" placeholder="Enter Parent Mobile Number In Sangamner">
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
                                            <select class="form-select  @error('address_type') is-invalid @enderror" id="address_type" wire:model.debounce.1000ms="address_type" >
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
                                            <textarea class="w-100 @error('parent_address') is-invalid @enderror" wire:model.debounce.1000ms="parent_address" id="parent_address" placeholder="Enter Parent Address"   cols="30" rows="4"> {{ old('parent_address') }}{{ $parent_address }}</textarea>
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
                                            <textarea class="w-100 @error('local_parent_address') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_address" id="local_parent_address" placeholder="Enter Parent Address In Sangamner"   cols="30" rows="4">{{ old('local_parent_address') }} {{ $local_parent_address }}</textarea>
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
                            <form  wire:submit.prevent="update({{ isset($c_id)?$c_id:''; }})" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3 h3">
                                        Student Information
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <input type="text"  class="form-control @error('first_name') is-invalid @enderror" wire:model.debounce.1000ms="first_name" value="{{ old('first_name') }}" id="first_name" placeholder="Enter First Name">
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
                                            <input type="text"  class="form-control @error('middle_name') is-invalid @enderror" wire:model.debounce.1000ms="middle_name" value="{{ old('middle_name') }}" id="middle_name" placeholder="Enter Middle Name">
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
                                            <input type="text"  class="form-control @error('last_name') is-invalid @enderror" wire:model.debounce.1000ms="last_name" value="{{ old('last_name') }}" id="last_name" placeholder="Enter Last Name">
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
                                                    <input type="text"  class="form-control @error('mobile') is-invalid @enderror" wire:model.debounce.1000ms="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Enter Mobile">
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
                                                    <input type="date" max="{{ $mindate }}" class="form-control @error('dob') is-invalid @enderror" wire:model.debounce.1000ms="dob" value="{{ old('dob') }}" id="dob" placeholder=" Select Date Of Birth">
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
                                                    <select class="form-select @error('blood_group') is-invalid @enderror" id="blood_group" wire:model.debounce.1000ms="blood_group" >
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
                                                    <input type="text" class="form-control @error('member_id') is-invalid @enderror" wire:model.debounce.1000ms="member_id" id="member_id" value="{{ old('member_id') }}" placeholder="Enter Member ID">
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
                                                    <input type="file"  class="form-control @error('photo') is-invalid @enderror" wire:model.debounce.1000ms="photo" value="{{ old('photo') }}" id="photo" placeholder="Enter Mobile">
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
                                            <input type="text"class="form-control @error('is_allergy') is-invalid @enderror" wire:model.debounce.1000ms="is_allergy" id="is_allergy" value="{{ old('is_allergy') }}" placeholder="Enter About Illness or Allergy ">
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
                                                <input class="form-check-input @error('is_ragging') is-invalid @enderror" type="checkbox" value="1" {{ $is_ragging==1?'checked':''; }} id="class_is_ragging"  wire:model.debounce.1000ms="is_ragging" >
                                                <label class="form-check-label m-1" for="class_is_ragging">Yes</label>
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
                                            <input type="text"   class="form-control @error('parent_name') is-invalid @enderror" wire:model.debounce.1000ms="parent_name" value="{{ old('parent_name') }}" id="parent_name" placeholder="Enter Parent Name">
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
                                            <input type="text"   class="form-control @error('parent_mobile') is-invalid @enderror" wire:model.debounce.1000ms="parent_mobile" value="{{ old('parent_mobile') }}" id="parent_mobile" placeholder="Enter Parent Mobile Number">
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
                                            <input type="text"  class="form-control @error('mother_name') is-invalid @enderror" wire:model.debounce.1000ms="mother_name" value="{{ old('mother_name') }}" id="mother_name" placeholder="Enter Mother Name">
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
                                            <input type="text"   class="form-control @error('local_parent_name') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_name" value="{{ old('local_parent_name') }}" id="local_parent_name" placeholder="Enter Parent Name In Sangamner">
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
                                            <input type="text"   class="form-control @error('local_parent_mobile') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_mobile" value="{{ old('local_parent_mobile') }}" id="local_parent_mobile" placeholder="Enter Parent Mobile Number In Sangamner">
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
                                            <select class="form-select  @error('address_type') is-invalid @enderror" id="address_type" wire:model.debounce.1000ms="address_type" >
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
                                            <textarea class="w-100 @error('parent_address') is-invalid @enderror" wire:model.debounce.1000ms="parent_address" id="parent_address" placeholder="Enter Parent Address"   cols="30" rows="4">{{ old('parent_address') }}</textarea>
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
                                            <textarea class="w-100 @error('local_parent_address') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_address" id="local_parent_address" placeholder="Enter Parent Address In Sangamner"   cols="30" rows="4">{{ old('local_parent_address') }}</textarea>
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
        @elseif($mode=="all")
            <div>
                @section('title')
                    Admissions
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Admission's</h2>
                            </div>
                            <div class="float-end">
                                @if ($hasAdmission)
                                    <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success ">
                                        New Admission<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table id="data-table" class="table  dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Admission ID</th>
                                            <th>Academic Year</th>
                                            <th>Student Name</th>
                                            <th>Class Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admissions as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->AcademicYear->year}}</td>
                                                <td>{{ $item->Student->name!=null?$item->Student->name: $item->Student->username; }}</td>
                                                <td>{{ $item->Class->name}}</td>
                                                <td>
                                                    @if ( $item->status == '0')
                                                        <span class="badge bg-warning text-white">Wating</span>
                                                    @elseif ( $item->status == '1')
                                                        <span class="badge bg-success text-white">Confirmed</span>
                                                    @else
                                                        <span class="badge bg-danger text-white">Canceled</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a   target="_blank"  class="btn btn-warning " href="{{ route('student_view_admission_form', $item->id) }}"> <i class="mdi mdi-eye"></i></a>
                                                    <a   target="_blank"  class="btn btn-warning " href="{{ route('student_download_admission_form', $item->id) }}"> <i class="mdi mdi-download"></i></a>
                                                    @if ( $item->status==0) 
                                                        <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-primary "><i class="mdi mdi-lead-pencil"></i></a>
                                                    @endif
                                                </td>
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


