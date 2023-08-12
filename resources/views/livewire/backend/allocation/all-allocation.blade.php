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
                            <form  wire:submit.prevent="save" method="post" action="" id="myForm">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="academic_year_id" class="form-label">Select Academic Year</label>
                                 
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="student_id" class="form-label">Select Student</label>
                                   
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="class_id" class="form-label">Select  Class</label>
                                   
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="bed_id" class="form-label">Select  Bed</label>
                                    
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="fee_id" class="form-label">Select  Fee</label>
                                    <select class="form-select @error('fee_id') is-invalid @enderror" id="fee_id" wire:model="fee_id" >
                                        <option value="" hidden>Select  Fee</option>
                                        @foreach ($fees as $item1)
                                            <option  value="{{ $item1->id }}"> {{ $item1->type }} - {{  $item1->amount }} </option>
                                        @endforeach
                                    </select>
                                    @error('fee_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit"  class="btn btn-primary waves-effect waves-light">Save Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=='edit')
            @section('title')
                Edit Allocation
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Allocation</h2>
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
                                
                              

                                <button type="submit"  class="btn btn-primary waves-effect waves-light">Update Data</button>
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
                                                <div class="col-12 col-md-3 ">
                                                    <label class="w-100 p-1  text-sm-center">Search</label>
                                                </div>
                                                <div class="col-12 col-md-3">
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
                                            <th>Bed ID</th>
                                            <th>Fee ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allocations as $key => $item)
                                            @if ( $item->Admission->status==2)
                                            <tr>
                                                <td>{{ $key+1 }}</td>                                     
                                                <td>{{ $item->Admission->id }}</td>                                     
                                                <td>{{ $item->Admission->AcademicYear->year }}</td>
                                                <td>{{ $item->Admission->Student->name ?$item->Admission->Student->name:$item->Admission->Student->username; }}</td>  
                                                <td>{{ $item->Admission->Class->name }}</td>  
                                                <td>{{ $item->Admission->bed_id }}</td>        
                                                <td>{{ $item->fee_id }}</td>        
                                                <td>
                                                    <a wire:loading.attr="disabled"  wire:click="allocate({{ $item->Admission->id }})" class="btn btn-success waves-effect waves-light">Allocate</a>
                                                    <a wire:loading.attr="disabled" wire:click="reallocate({{ $item->Admission->id }})"  class="btn btn-info waves-effect waves-light">Re Allocate</a>
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

