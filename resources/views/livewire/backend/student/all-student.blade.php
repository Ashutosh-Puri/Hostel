<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Student
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Add Student</h4>
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
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text"  class="form-control @error('name') is-invalid @enderror" wire:model.debounce.1000ms="name" value="{{ old('name') }}" id="name" placeholder="Enter Name">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email"   class="form-control @error('email') is-invalid @enderror" wire:model.debounce.1000ms="email" value="{{ old('email') }}" id="email" placeholder="Enter Email">
                                            @error('email')
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
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password"   class="form-control @error('password') is-invalid @enderror" wire:model.debounce.1000ms="password" value="{{ old('password') }}" id="password" placeholder="Enter Password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="mobile" class="form-label">Mobile</label>
                                            <input type="number"   class="form-control @error('mobile') is-invalid @enderror" wire:model.debounce.1000ms="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Enter Mobile">
                                            @error('mobile')
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
                                            <label for="member_id" class="form-label">Member ID</label>
                                            <input type="number" min="0"  class="form-control @error('member_id') is-invalid @enderror" wire:model.debounce.1000ms="member_id" value="{{ old('member_id') }}" id="member_id" placeholder="Enter Member ID">
                                            @error('member_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="prn" class="form-label">P.R.N. Number</label>
                                            <input type="number" min="0"  class="form-control @error('prn') is-invalid @enderror" wire:model.debounce.1000ms="prn" value="{{ old('prn') }}" id="prn" placeholder="Enter PRN Number">
                                            @error('prn')
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
                                            <label for="abc_id" class="form-label">ABC ID</label>
                                            <input type="number" min="0"  class="form-control @error('abc_id') is-invalid @enderror" wire:model.debounce.1000ms="abc_id" value="{{ old('abc_id') }}" id="abc_id" placeholder="Enter ABC ID">
                                            @error('abc_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="eligibility_no" class="form-label">Eligibility Number</label>
                                            <input type="number" min="0"  class="form-control @error('eligibility_no') is-invalid @enderror" wire:model.debounce.1000ms="eligibility_no" value="{{ old('eligibility_no') }}" id="eligibility_no" placeholder="Enter Eligibility Number">
                                            @error('eligibility_no')
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
                                            <label for="photo" class="form-label">Photo</label>
                                            <input type="file" class="form-control  @error('photo') is-invalid @enderror" wire:model.debounce.1000ms="photo" id="photo"   >
                                            @error('photo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-1">
                                        <div class="mb-3 form-group">
                                            <label for="photo" class="form-label"></label>
                                            <img id="showImage" src="{{ isset($photo)?asset($photo->temporaryUrl()):asset('assets/images/no_image.jpg'); }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="status" class="form-label">Status</label>
                                            <div class="form-group form-check-primary form-check">
                                                <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ $status==1?'checked':''; }} id="class_status"  wire:model.debounce.1000ms="status" >
                                                <label class="form-check-label" for="class_status">In-Active Student</label>
                                                @error('status')
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
                Edit Student
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Edit Student</h4>
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
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text"  class="form-control @error('name') is-invalid @enderror" wire:model.debounce.1000ms="name" value="{{ old('name') }}" id="name" placeholder="Enter Name">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email"   class="form-control @error('email') is-invalid @enderror" wire:model.debounce.1000ms="email" value="{{ old('email') }}" id="email" placeholder="Enter Email">
                                            @error('email')
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
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password"   class="form-control @error('password') is-invalid @enderror" wire:model.debounce.1000ms="password" value="{{ old('password') }}" id="password" placeholder="Enter Password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="mobile" class="form-label">Mobile</label>
                                            <input type="number"   class="form-control @error('mobile') is-invalid @enderror" wire:model.debounce.1000ms="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Enter Mobile">
                                            @error('mobile')
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
                                            <label for="member_id" class="form-label">Member ID</label>
                                            <input type="number" min="0"  class="form-control @error('member_id') is-invalid @enderror" wire:model.debounce.1000ms="member_id" value="{{ old('member_id') }}" id="member_id" placeholder="Enter Member ID">
                                            @error('member_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="prn" class="form-label">P.R.N. Number</label>
                                            <input type="number" min="0"  class="form-control @error('prn') is-invalid @enderror" wire:model.debounce.1000ms="prn" value="{{ old('prn') }}" id="prn" placeholder="Enter PRN Number">
                                            @error('prn')
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
                                            <label for="abc_id" class="form-label">ABC ID</label>
                                            <input type="number" min="0"  class="form-control @error('abc_id') is-invalid @enderror" wire:model.debounce.1000ms="abc_id" value="{{ old('abc_id') }}" id="abc_id" placeholder="Enter ABC ID">
                                            @error('abc_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="eligibility_no" class="form-label">Eligibility Number</label>
                                            <input type="number" min="0"  class="form-control @error('eligibility_no') is-invalid @enderror" wire:model.debounce.1000ms="eligibility_no" value="{{ old('eligibility_no') }}" id="eligibility_no" placeholder="Enter Eligibility Number">
                                            @error('eligibility_no')
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
                                            <label for="photo" class="form-label">Photo</label>
                                            <input type="file" class="form-control  @error('photo') is-invalid @enderror" wire:model.debounce.1000ms="photo" id="photo"   >
                                            @error('photo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-1">
                                        <div class="mb-3 form-group">
                                            <label for="photo" class="form-label"></label>
                                            <img id="showImage" src="{{ isset($photo)?asset($photo->temporaryUrl()):asset('assets/images/no_image.jpg'); }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="status" class="form-label">Status</label>
                                            <div class="form-group form-check-primary form-check">
                                                <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ $status==1?'checked':''; }} id="class_status"  wire:model.debounce.1000ms="status" >
                                                <label class="form-check-label" for="class_status">In-Active Student</label>
                                                @error('status')
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
            <div>
                @section('title')
                    All Studentes
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <a wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Student<span class="btn-label-right"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                </a>
                            </div>
                            <h4 class="page-title">Data Students</h4>
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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>  
                                                <td>
                                                    <img id="showImage" src="{{ (!empty($item->photo)) ? asset($item->photo) : asset('assets/images/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" style="height: 45px; width:45px;">
                                                </td>                                   
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->mobile }}</td>
                                                <td>
                                                    @if ( $item->status == '1')
                                                        <span class="badge bg-success text-white">Active</span>
                                                    @else
                                                        <span class="badge bg-danger text-white">In-Active</span>
                                                    @endif
                                                </td>   
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

