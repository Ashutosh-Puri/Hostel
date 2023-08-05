<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Student Payment
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Add Student Payment</h4>
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
                                <div class="mb-3 form-group">
                                    <label for="student_id" class="form-label">Select Student</label>
                                    <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" wire:model="student_id" >
                                        <option value="" hidden>Select Student</option>
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
                                <div class="mb-3 form-group">
                                    <label for="admission_id" class="form-label">Select Admission</label>
                                    <select class="form-select @error('admission_id') is-invalid @enderror" id="admission_id" wire:model="admission_id" >
                                        <option value="" hidden>Select Admission</option>
                                        @foreach ($admissions as $item1)
                                            <option  value="{{ $item1->id }}"> {{ $item1->id }} </option>
                                        @endforeach
                                    </select>
                                    @error('admission_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="totalamount" class="form-label">Total Amount</label>
                                    <input type="number" min="0" class="form-control @error('totalamount') is-invalid @enderror" wire:model="totalamount" value="{{ old('totalamount') }}" id="totalamount" placeholder="Enter Amount">
                                    @error('totalamount')
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
                Edit Student Payment
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Edit Student Payment</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  wire:submit.prevent="update({{ isset($C_id)?$C_id:''; }})" method="post" action="" id="myForm">
                                @csrf
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
                                <div class="mb-3 form-group">
                                    <label for="student_id" class="form-label">Select Student</label>
                                    <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" wire:model="student_id" >
                                        <option value="" hidden>Select Student</option>
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
                                <div class="mb-3 form-group">
                                    <label for="admission_id" class="form-label">Select Admission</label>
                                    <select class="form-select @error('admission_id') is-invalid @enderror" id="admission_id" wire:model="admission_id" >
                                        <option value="" hidden>Select Admission</option>
                                        @foreach ($admissions as $item1)
                                            <option  value="{{ $item1->id }}"> {{ $item1->id }} </option>
                                        @endforeach
                                    </select>
                                    @error('admission_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="totalamount" class="form-label">Total Amount</label>
                                    <input type="number" min="0" class="form-control @error('totalamount') is-invalid @enderror" wire:model="totalamount" value="{{ old('totalamount') }}" id="totalamount" placeholder="Enter Amount">
                                    @error('totalamount')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                    All Student Payments
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <a wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Student Payment<span class="btn-label-right"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                </a>
                            </div>
                            <h4 class="page-title">Data Student Payments</h4>
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
                                            <th>Academic Year</th>
                                            <th>Student Name</th>
                                            <th>Admission Name</th>
                                            <th>Total Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student_payments as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>                                     
                                                <td>{{ $item->AcademicYear->year}}</td>
                                                <td>{{ $item->Student->name }}</td>  
                                                <td>{{ $item->Admission->id }}</td>  
                                                <td>{{ $item->total_amount }}</td>       
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


