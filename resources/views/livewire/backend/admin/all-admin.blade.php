<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Admin
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Add Admin</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading.attr="disabled"  wire:click="setmode('all')"class="btn btn-success waves-effect waves-light">
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
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="role_id" class="form-label">Select Role</label>
                                            <select class="form-select @error('role_id') is-invalid @enderror" id="role_id" wire:model="role_id" >
                                                <option hidden value="">Select Role</option>
                                                @foreach ($roles as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->role }} </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
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
                                </div>
                                <div class="row">
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
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <input type="password"   class="form-control @error('password_confirmation') is-invalid @enderror" wire:model.debounce.1000ms="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" placeholder="Enter Confirm Password">
                                            @error('password_confirmation')
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
                                    <div class="col-12 col-md-4">
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
                                    <div class="col-12 col-md-2">
                                        <div class="mb-3 form-group">
                                            <label for="photo" class="form-label"></label>
                                            <img id="showImage" src="{{ isset($photo)?asset($photo->temporaryUrl()):asset('assets/images/no_image.jpg'); }}"  alt="Image" class="img-fluid rounded-circle mb-3" style="height: 80px; width:80px;">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="status" class="form-label">Status</label>
                                            <div class="form-group ">
                                                <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ $status==1?'checked':''; }} id="class_status"  wire:model.debounce.1000ms="status" >
                                                <label class="form-check-label m-1" for="class_status">In-Active Admin</label>
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
                Edit Admin
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Admin</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading.attr="disabled"  wire:click="setmode('all')"class="btn btn-success waves-effect waves-light">
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
                            <form  wire:submit.prevent="update({{ isset($C_id)?$C_id:''; }})" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="role_id" class="form-label">Select Role</label>
                                            <select class="form-select @error('role_id') is-invalid @enderror" id="role_id" wire:model="role_id" >
                                                <option hidden value="">Select Role</option>
                                                @foreach ($roles as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->role }} </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
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
                                </div>
                                <div class="row">
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
                                    <div class="col-12 col-md-4">
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
                                    @if ($photo) 
                                        <div class="col-12 col-md-2">
                                            <div class="mb-3 form-group">
                                                <label for="photo" class="form-label"></label>
                                                <img id="showImage" src="{{ isset($photo)?asset($photo->temporaryUrl()):asset('assets/images/no_image.jpg'); }}"  alt="Image" class="img-fluid rounded-circle mb-3" style="height: 80px; width:80px;">
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-12 col-md-2">
                                            <div class="mb-3 form-group">
                                                <label for="photo" class="form-label"></label>
                                                <img id="showImage" src="{{ isset($photoold)?asset($photoold):asset('assets/images/no_image.jpg'); }}"  alt="Image" class="img-fluid rounded-circle mb-3" style="height: 80px; width:80px;">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="status" class="form-label">Status</label>
                                            <div class="form-group ">
                                                <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ $status==1?'checked':''; }} id="class_status"  wire:model.debounce.1000ms="status" >
                                                <label class="form-check-label m-1" for="class_status">In-Active Admin</label>
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
        @elseif($mode=='all')
            <div>
                @section('title')
                    All Admins
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Data Admins</h2>
                            </div>
                            <div class="float-end">
                                <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Admin<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                </a>
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
                                    <label class=" col-4 col-md-1  py-1  ">Records</label>
                                    <span class="col-12 col-md-9 p-0">
                                        <span class="row">
                                            <div class="col-12 col-md-6 ">
                                            </div>
                                            <div class="col-12 col-md-3 ">
                                                    <label class="w-100 p-1  text-md-end">Search</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                    <input class="w-100" wire:model="search" type="search" placeholder="Admin Name">
                                            </div>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="data-table" class="table  dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Admin Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>  
                                                <td>
                                                    <img id="showImage" src="{{ (!empty($item->photo)) ? asset($item->photo) : asset('assets/images/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" style="height: 45px; width:45px;">
                                                </td>                                   
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->mobile }}</td>
                                                <td>{{ $item->Role->role }}</td>
                                                <td>
                                                    @if ( $item->status == '0')
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
                                <div class="mt-4">
                                    {{ $admins->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

