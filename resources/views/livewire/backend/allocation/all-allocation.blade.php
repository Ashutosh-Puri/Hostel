<div class="content">
    <div class="container-fluid">
        @if ($mode=='allocate')
            @section('title')
                Allocate Bed
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Allocate Bed</h2>
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
                            <form  wire:submit.prevent="save({{ $admission->id }})" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <hr>
                                            <div class="text-center h3">
                                                Current Status
                                            </div>
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="academic_year_id" class="form-label">Academic Year</label>
                                            <label  class="form-control"for=""> {{ $admission->AcademicYear->year }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="student_id" class="form-label">Student Name</label>
                                            <label class="form-control" for=""> {{ $admission->Student->name }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="class_id" class="form-label">Class Name</label>
                                            <label class="form-control" for=""> {{ $admission->Class->name }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="class_id" class="form-label">Class Type</label>
                                            <label class="form-control" for=""> {{ $admission->Class->type }}</label>
                                        </div>
                                    </div>
                                    @if ($admission->bed_id)
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3 form-group">
                                                <label for="class_id" class="form-label">Bed ID</label>
                                                <label class="form-control" for=""> {{  "H-".$admission->Bed->Room->Building->Hostel->name." ---> B-".$admission->Bed->Room->Building->name." ---> R-".$admission->Bed->Room->id."-(".$admission->Bed->Room->label.") ---> Bed-".$admission->bed_id }}</label>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-12 col-md-12">
                                        <hr>
                                            <div class="text-center h3">
                                                Allocate Bed
                                            </div>
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="bed_id" class="form-label">Select  Bed</label>
                                            <select class="form-select @error('bed_id') is-invalid @enderror" id="bed_id" wire:model="bed_id" >
                                                <option value="" hidden>Select  Bed</option>
                                                @foreach ($beds as $item1)
                                                    <option  value="{{ $item1->id }}">{{ "H-".$item1->Room->Building->Hostel->name." ---> B-".$item1->Room->Building->name." ---> R-".$item1->Room->id."-(".$item1->Room->label.") ---> B-".$item1->id }} </option>
                                                @endforeach
                                            </select>
                                            @error('bed_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="fee_id" class="form-label">Select  Fee</label>
                                            <select class="form-select @error('fee_id') is-invalid @enderror" id="fee_id" wire:model="fee_id" >
                                                <option value="" hidden>Select  Fee</option>
                                                @foreach ($fees as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->type }} Seated ---> {{  $item1->amount }} Rs. </option>
                                                @endforeach
                                            </select>
                                            @error('fee_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"  class="btn btn-primary waves-effect waves-light">Update Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=='exchange')
            @section('title')
                Exchange Bed
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Exchange Bed</h2>
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
                            <form  wire:submit.prevent="update({{ $admission->id }})" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <hr>
                                            <div class="text-center h3">
                                                First Student
                                            </div>
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="academic_year_id" class="form-label">Admission ID</label>
                                            <label  class="form-control"for=""> {{ $admission->id }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="academic_year_id" class="form-label">Academic Year</label>
                                            <label  class="form-control"for=""> {{ $admission->AcademicYear->year }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="student_id" class="form-label">Student Name</label>
                                            <label class="form-control" for=""> {{ $admission->Student->name }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="class_id" class="form-label">Class Name</label>
                                            <label class="form-control" for=""> {{ $admission->Class->name }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="class_id" class="form-label">Class Type</label>
                                            <label class="form-control" for="">{{ $admission->Class->type}}</label>
                                        </div>
                                    </div>
                                    @if ($admission->bed_id)
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="class_id" class="form-label">Bed ID</label>
                                                <label class="form-control" for=""> {{  "H-".$admission->Bed->Room->Building->Hostel->name." ---> B-".$admission->Bed->Room->Building->name." ---> R-".$admission->Bed->Room->id."-(".$admission->Bed->Room->label.") ---> Bed-".$admission->bed_id }}</label> 
                                            </div>
                                        </div>
                                    @endif
                                    @if ($alloc[0]->fee_id)
                                        <div class="col-12 col-md-3">
                                            <div class="mb-3 form-group">
                                                <label for="class_id" class="form-label">Fee</label>
                                                <label class="form-control" for=""> {{ $alloc[0]->Fee->type }} Seated ---> {{ $alloc[0]->Fee->amount }} Rs.</label> 
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-12 col-md-12">
                                        <hr>
                                            <div class="text-center h3">
                                                Second Student
                                            </div>
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="academic_year_id" class="form-label">Admission ID</label>
                                            <input type="number"class="form-control  @error('admissionid2') is-invalid @enderror" wire:model="admissionid2">
                                            @error('admissionid2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if($admissionid2>0)
                                        @if (isset($admission2->AcademicYear->year))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="academic_year_id" class="form-label">Academic Year</label>
                                                    <label  class="form-control"for=""> {{ $admission2->AcademicYear->year }}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($admission2->Student->name))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="student_id" class="form-label">Student Name</label>
                                                    <label class="form-control" for=""> {{ $admission2->Student->name }}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($admission2->Class->name ))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="class_id" class="form-label">Class Name</label>
                                                    <label class="form-control" for=""> {{ $admission2->Class->name }}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($admission2->Class->type))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="class_id" class="form-label">Class Type</label>
                                                    <label class="form-control" for="">{{ $admission2->Class->type}}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($admission2->bed_id))
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="class_id" class="form-label">Bed ID</label>
                                                    <label class="form-control" for=""> {{  "H-".$admission2->Bed->Room->Building->Hostel->name." ---> B-".$admission2->Bed->Room->Building->name." ---> R-".$admission2->Bed->Room->id."-(".$admission2->Bed->Room->label.") ---> Bed-".$admission2->bed_id }}</label> 
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($alloc[1]->fee_id))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="class_id" class="form-label">Fee</label>
                                                    <label class="form-control" for=""> {{ $alloc[1]->Fee->type }} Seated ---> {{ $alloc[1]->Fee->amount }} Rs.</label> 
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="col-12 col-md-12">
                                        <hr>
                                            <div class="text-center h3">
                                                <button type="submit"  class="btn btn-primary waves-effect waves-light text-center ">Exchange Bed</button>
                                            </div>
                                        <hr>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode="all")
            <div>
                @section('title')
                    All Allocation
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Data Allocations</h2>
                            </div>
                            <div class="float-end">
                                {{-- <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Allocation<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                </a> --}}
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
                                                    <input  class="w-100" wire:model="ad" type="search" placeholder="Admission ID ">
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <input  class="w-100" wire:model="a" type="search" placeholder="Academic Year">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input class="w-100"  wire:model="s" type="search" placeholder="Student Name">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input class="w-100"  wire:model="c" type="search" placeholder="Class Name">
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
                                            <th>Admission ID</th>
                                            <th>Academic Year</th>
                                            <th>Student Name</th>
                                            <th>Class Name</th>
                                            <th>Bed Status</th>
                                            <th>Fee</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allocations as $key => $item)
                                            @if ( $item->Admission->status==1)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->Admission->id }}</td>
                                                <td>{{ $item->Admission->AcademicYear->year }}</td>
                                                <td>{{ $item->Admission->Student->name ?$item->Admission->Student->name:$item->Admission->Student->username; }}</td>
                                                <td>{{ $item->Admission->Class->name }}</td>
                                                <td>
                                                    @if ($item->Admission->bed_id==null)
                                                        <span class="badge bg-danger text-white">Not Allocated</span>
                                                    @else
                                                        <span class="badge bg-success text-white">Allocated</span><span class="badge bg-success mx-1 text-white">{{ $item->Admission->bed_id }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->fee_id==null)
                                                        <span class="badge bg-danger text-white">Not Allocated</span>
                                                    @else
                                                        <span class="badge bg-success mx-1 text-white">{{ $item->Fee->amount}} Rs.</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a wire:loading.attr="disabled"  wire:click="allocate({{ $item->Admission->id }})" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-checkbox-marked mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                    <a wire:loading.attr="disabled" wire:click="exchange({{ $item->Admission->id }})"  class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-sync mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                    <a wire:loading.attr="disabled" wire:click="deallocate({{ $item->Admission->id }})"  class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-close-box mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                    {{-- <a wire:loading.attr="disabled" wire:click="deleteconfirmation({{ $item->id }})"  class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can"></i></a> --}}
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $allocations->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

