<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Student Profile
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Add Student Profile</h4>
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
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="student_id" class="form-label">Select Student</label>
                                            <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" wire:model="student_id" >
                                                <option hidden value="" >Select Student</option>
                                                @foreach ($students as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('student_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
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
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="dob" class="form-label">Date Of Birth</label>
                                            <input type="date"  class="form-control @error('dob') is-invalid @enderror" wire:model.debounce.1000ms="dob" value="{{ old('dob') }}" id="dob" placeholder=" Select Date Of Birth">
                                            @error('dob')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="blood_group" class="form-label">Select Blood Group</label>
                                            <select class="form-select @error('blood_group') is-invalid @enderror" id="blood_group" wire:model="blood_group" >
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
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="cast" class="form-label">Cast</label>
                                            <input type="text"  class="form-control @error('cast') is-invalid @enderror" wire:model.debounce.1000ms="cast" value="{{ old('cast') }}" id="cast" placeholder="Enter Cast">
                                            @error('cast')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="category" class="form-label">Category</label>
                                            <input type="text"   class="form-control @error('category') is-invalid @enderror" wire:model.debounce.1000ms="category" value="{{ old('category') }}" id="category" placeholder="Enter Category">
                                            @error('category')
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
                                            <label for="parent_name" class="form-label">Parent Name</label>
                                            <input type="text"   class="form-control @error('parent_name') is-invalid @enderror" wire:model.debounce.1000ms="parent_name" value="{{ old('parent_name') }}" id="parent_name" placeholder="Enter Parent Name">
                                            @error('parent_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="parent_mobile" class="form-label">Parent Mobile Number</label>
                                            <input type="number" min="0"  class="form-control @error('parent_mobile') is-invalid @enderror" wire:model.debounce.1000ms="parent_mobile" value="{{ old('parent_mobile') }}" id="parent_mobile" placeholder="Enter Parent Mobile Number">
                                            @error('parent_mobile')
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
                                            <label for="local_parent_name" class="form-label">Local Parent Name</label>
                                            <input type="text"   class="form-control @error('local_parent_name') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_name" value="{{ old('local_parent_name') }}" id="local_parent_name" placeholder="Enter Local Parent Name">
                                            @error('local_parent_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="local_parent_mobile" class="form-label">Local Parent Mobile Number</label>
                                            <input type="number" min="0"  class="form-control @error('local_parent_mobile') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_mobile" value="{{ old('local_parent_mobile') }}" id="local_parent_mobile" placeholder="Enter Parent Mobile Number">
                                            @error('local_parent_mobile')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <div class="mb-3 form-group">
                                            <label for="parent_address" class="form-label">Parent Address</label>
                                            <textarea class="form-control @error('parent_address') is-invalid @enderror" wire:model.debounce.1000ms="parent_address" id="parent_address" placeholder="Enter Parent Address"   cols="30" rows="2">{{ old('parent_address') }}</textarea>
                                            @error('parent_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="mb-3 form-group">
                                            <label for="local_parent_address" class="form-label">Local Parent Address</label>
                                            <textarea class="form-control @error('local_parent_address') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_address" id="local_parent_address" placeholder="Enter Local Parent Address"   cols="30" rows="2">{{ old('local_parent_address') }}</textarea>
                                            @error('local_parent_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="mb-3 form-group">
                                            <label for="address_type" class="form-label">Select Address Type</label>
                                            <select class="form-select @error('address_type') is-invalid @enderror" id="address_type" wire:model="address_type" >
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
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
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
                                    <div class="col-12 col-md-6">
                                         <div class="mb-3 form-group">
                                            <label for="is_ragging" class="form-label">Were you involved in ragging earlier?</label>
                                            <div class="form-group form-check-primary form-check">
                                                <input class="form-check-input @error('is_ragging') is-invalid @enderror" type="checkbox" value="1" {{ $is_ragging==1?'checked':''; }} id="class_is_ragging"  wire:model.debounce.1000ms="is_ragging" >
                                                <label class="form-check-label" for="class_is_ragging">Yes</label>
                                                @error('is_ragging')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"  class="btn btn-primary waves-effect waves-light">Save Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        @elseif($mode=='edit')
            @section('title')
                Edit Student Profile
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Edit Student Profile</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  wire:submit.prevent="update({{ isset($C_id)?$C_id:''; }})" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="student_id" class="form-label">Select Student</label>
                                            <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" wire:model="student_id" >
                                                <option hidden value="" >Select Student</option>
                                                @foreach ($students as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('student_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
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
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="dob" class="form-label">Date Of Birth</label>
                                            <input type="date"  class="form-control @error('dob') is-invalid @enderror" wire:model.debounce.1000ms="dob" value="{{ old('dob') }}" id="dob" placeholder=" Select Date Of Birth">
                                            @error('dob')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="blood_group" class="form-label">Select Blood Group</label>
                                            <select class="form-select @error('blood_group') is-invalid @enderror" id="blood_group" wire:model="blood_group" >
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
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="cast" class="form-label">Cast</label>
                                            <input type="text"  class="form-control @error('cast') is-invalid @enderror" wire:model.debounce.1000ms="cast" value="{{ old('cast') }}" id="cast" placeholder="Enter Cast">
                                            @error('cast')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="category" class="form-label">Category</label>
                                            <input type="text"   class="form-control @error('category') is-invalid @enderror" wire:model.debounce.1000ms="category" value="{{ old('category') }}" id="category" placeholder="Enter Category">
                                            @error('category')
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
                                            <label for="parent_name" class="form-label">Parent Name</label>
                                            <input type="text"   class="form-control @error('parent_name') is-invalid @enderror" wire:model.debounce.1000ms="parent_name" value="{{ old('parent_name') }}" id="parent_name" placeholder="Enter Parent Name">
                                            @error('parent_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="parent_mobile" class="form-label">Parent Mobile Number</label>
                                            <input type="number" min="0"  class="form-control @error('parent_mobile') is-invalid @enderror" wire:model.debounce.1000ms="parent_mobile" value="{{ old('parent_mobile') }}" id="parent_mobile" placeholder="Enter Parent Mobile Number">
                                            @error('parent_mobile')
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
                                            <label for="local_parent_name" class="form-label">Local Parent Name</label>
                                            <input type="text"   class="form-control @error('local_parent_name') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_name" value="{{ old('local_parent_name') }}" id="local_parent_name" placeholder="Enter Local Parent Name">
                                            @error('local_parent_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="local_parent_mobile" class="form-label">Local Parent Mobile Number</label>
                                            <input type="number" min="0"  class="form-control @error('local_parent_mobile') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_mobile" value="{{ old('local_parent_mobile') }}" id="local_parent_mobile" placeholder="Enter Parent Mobile Number">
                                            @error('local_parent_mobile')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <div class="mb-3 form-group">
                                            <label for="parent_address" class="form-label">Parent Address</label>
                                            <textarea class="form-control @error('parent_address') is-invalid @enderror" wire:model.debounce.1000ms="parent_address" id="parent_address" placeholder="Enter Parent Address"   cols="30" rows="2">{{ old('parent_address') }}</textarea>
                                            @error('parent_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="mb-3 form-group">
                                            <label for="local_parent_address" class="form-label">Local Parent Address</label>
                                            <textarea class="form-control @error('local_parent_address') is-invalid @enderror" wire:model.debounce.1000ms="local_parent_address" id="local_parent_address" placeholder="Enter Local Parent Address"   cols="30" rows="2">{{ old('local_parent_address') }}</textarea>
                                            @error('local_parent_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="mb-3 form-group">
                                            <label for="address_type" class="form-label">Select Address Type</label>
                                            <select class="form-select @error('address_type') is-invalid @enderror" id="address_type" wire:model="address_type" >
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
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
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
                                    <div class="col-12 col-md-6">
                                         <div class="mb-3 form-group">
                                            <label for="is_ragging" class="form-label">Were you involved in ragging earlier?</label>
                                            <div class="form-group form-check-primary form-check">
                                                <input class="form-check-input @error('is_ragging') is-invalid @enderror" type="checkbox" value="1" {{ $is_ragging==1?'checked':''; }} id="class_is_ragging"  wire:model.debounce.1000ms="is_ragging" >
                                                <label class="form-check-label" for="class_is_ragging">Yes</label>
                                                @error('is_ragging')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"  class="btn btn-primary waves-effect waves-light">Update Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div >
                @section('title')
                    All Student Profilees
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <a wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Student Profile<span class="btn-label-right"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                </a>
                            </div>
                            <h4 class="page-title">Data Student Profiles</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title"></h4>
                                <table id="data-table" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Student Name</th>
                                            <th>Mother Name</th>
                                            <th>Date Of Birth</th>
                                            <th>Parent Name</th>
                                            <th>Parent Mobile Number</th>
                                            <th>Adress Type</th>
                                            <th>Parent Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student_profiles as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>  
                                                <td>{{ $item->Student->name}}</td>      
                                                <td>{{ $item->mother_name}}</td>     
                                                <td>{{ $item->dob}}</td> 
                                                <td>{{ $item->parent_name}}</td>    
                                                <td>{{ $item->parent_mobile}}</td>    
                                                <td>{{ $item->address_type==0?'Rural':'Urbon'; }}</td>  
                                                <td>{{ $item->parent_address }}</td>                                   
                                                <td>
                                                    <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-lead-pencil"></i></a>
                                                    <a wire:loading.attr="disabled" wire:click="delete({{ $item->id }})"  class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

