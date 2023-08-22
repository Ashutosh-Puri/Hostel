<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Student Payment
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Add Student Payment</h2>
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
                                            <label for="academic_year_id" class="form-label">Select Academic Year</label>
                                            <select class="form-select @error('academic_year_id') is-invalid @enderror" id="academic_year_id" wire:model="academic_year_id" >
                                                <option value="" hidden>Select Academic Year</option>
                                                @foreach ($academic_years as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->year }} </option>
                                                @endforeach
                                            </select>
                                            @error('academic_year_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="admission_id" class="form-label">Select Admission</label>
                                            <select class="form-select @error('admission_id') is-invalid @enderror" id="admission_id" wire:model="admission_id" >
                                                <option value="" hidden>Select Admission</option>
                                                @foreach ($admissions as $item1)
                                                    <option  value="{{ $item1->id }}">Admisstion ID : {{ $item1->id }} --> Year : {{  $item1->AcademicYear->year }} --> Student Name : {{ $item1->Student->name==null?$item1->Student->username:$item1->Student->name; }} </option>
                                                @endforeach
                                            </select>
                                            @error('admission_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="student_id" class="form-label">Select Student</label>
                                            <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" wire:model="student_id" >
                                                <option value="" hidden>Select Student</option>
                                                @foreach ($students as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->name!=null? $item1->name: $item1->username; }} </option>
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
                                            <label for="seated_id" class="form-label">Select Seated</label>
                                            <select class="form-select @error('seated_id') is-invalid @enderror" id="seated_id" wire:model="seated_id" >
                                                <option value="" hidden>Select Seated</option>
                                                @foreach ($seateds as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->seated }} Seated</option>
                                                @endforeach
                                            </select>
                                            @error('seated_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="totalamount" class="form-label">Total Amount</label>
                                            <label for="totalamount"class="form-control @error('totalamount') is-invalid @enderror" wire:model="totalamount">{{ isset($totalamount)?$totalamount.' Rs.':''; }} </label>
                                            {{-- <input type="text" min="0" @if (1) readonly @endif class="form-control readonly @error('totalamount') is-invalid @enderror" wire:model="totalamount" value="{{ old('totalamount') }}" id="totalamount" placeholder="Enter Fee Amount"> --}}
                                            @error('totalamount')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                Edit Student Payment
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Student Payment</h2>
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
                                            <label for="academic_year_id" class="form-label">Select Academic Year</label>
                                            <select class="form-select @error('academic_year_id') is-invalid @enderror" id="academic_year_id" wire:model="academic_year_id" >
                                                <option value="" hidden>Select Academic Year</option>
                                                @foreach ($academic_years as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->year }} </option>
                                                @endforeach
                                            </select>
                                            @error('academic_year_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="admission_id" class="form-label">Select Admission</label>
                                            <select class="form-select @error('admission_id') is-invalid @enderror" id="admission_id" wire:model="admission_id" >
                                                <option value="" hidden>Select Admission</option>
                                                @foreach ($admissions as $item1)
                                                    <option  value="{{ $item1->id }}">Admisstion ID : {{ $item1->id }} --> Year : {{  $item1->AcademicYear->year }} --> Student Name : {{ $item1->Student->name==null?$item1->Student->username:$item1->Student->name; }} </option>
                                                @endforeach
                                            </select>
                                            @error('admission_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="student_id" class="form-label">Select Student</label>
                                            <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" wire:model="student_id" >
                                                <option value="" hidden>Select Student</option>
                                                @foreach ($students as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->name!=null? $item1->name: $item1->username; }} </option>
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
                                            <label for="seated_id" class="form-label">Select Seated</label>
                                            <select class="form-select @error('seated_id') is-invalid @enderror" id="seated_id" wire:model="seated_id" >
                                                <option value="" hidden>Select Seated</option>
                                                @foreach ($seateds as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->seated }} Seated</option>
                                                @endforeach
                                            </select>
                                            @error('seated_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="totalamount" class="form-label">Total Amount</label>
                                            <label for="totalamount"class="form-control @error('totalamount') is-invalid @enderror" wire:model="totalamount">{{ isset($totalamount)?$totalamount.' Rs.':''; }} </label>
                                            {{-- <input type="text" min="0" class="form-control @error('totalamount') is-invalid @enderror" wire:model="totalamount" value="{{ old('totalamount') }}" id="totalamount" placeholder="Enter Fee Amount"> --}}
                                            @error('totalamount')
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
        @elseif($mode="all")
            <div>
                @section('title')
                    All Student Payments
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h3>Data Student Payments</h3>
                            </div>
                            <div class="float-end">
                                <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Student Payment<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
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
                                            <div class="col-12 col-md-3 ">
                                                    <label class="w-100 p-1  text-md-end">Search</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input class="w-100" wire:model="admission_name" type="search" placeholder="Admission ID">
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input class="w-100" wire:model="year" type="search" placeholder="Academic Year">
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input class="w-100" wire:model="student_name" type="search" placeholder="Student Name">
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
                                            <th>Admission ID</th>
                                            <th>Academic Year</th>
                                            <th>Student Name</th>
                                            <th>Amount</th>
                                            <th>Deposite</th>
                                            <th>Total Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student_payments as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->Admission->id }}</td>
                                                <td>{{ $item->AcademicYear->year}}</td>
                                                <td>{{ $item->Student->name!=null? $item->Student->name: $item->Student->username; }}</td>
                                                <td>{{ $item->amount }} Rs.</td>
                                                <td>{{ $item->deposite }} Rs.</td>
                                                <td>{{ $item->total_amount }} Rs.</td>
                                                <td>
                                                    @if ( $item->status == '0')
                                                        <span class="badge bg-warning text-white">Not Paid</span>
                                                    @elseif ( $item->status == '1')
                                                        <span class="badge bg-success text-white">Paid</span>
                                                    @elseif ( $item->status == '2')
                                                        <span class="badge bg-danger text-white">Cancelled</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-lead-pencil"></i></a>
                                                    @if ($item->status==1) 
                                                        <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-danger waves-effect waves-light"> <i class="mdi mdi-thumb-down"></i> </a>
                                                    @elseif ($item->status==2)
                                                        <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-warning waves-effect waves-light"> <i class="mdi mdi-clock"></i> </a>
                                                    @elseif ($item->status==0)
                                                        <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success waves-effect waves-light"> <i class="mdi mdi-thumb-up"></i> </a>
                                                    @endif
                                                    <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
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


