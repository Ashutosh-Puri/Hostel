<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Student Fine
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Add Student Fine</h4>
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
                                    <label for="fine_id" class="form-label">Select Fine</label>
                                    <select class="form-select @error('fine_id') is-invalid @enderror" id="fine_id" wire:model="fine_id" >
                                        <option value="" hidden>Select Fine</option>
                                        @foreach ($fines as $item1)
                                            <option  value="{{ $item1->id }}"> {{ $item1->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('fine_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="amount" class="form-label">Fine Amount</label>
                                    <input type="number" min="0" class="form-control @error('amount') is-invalid @enderror" wire:model="amount" value="{{ old('amount') }}" id="amount" placeholder="Enter Amount">
                                    @error('amount')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group form-check-primary form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ old('status')==true?'checked':''; }} id="class_status"  wire:model="status" >
                                    <label class="form-check-label" for="class_status">In-Active Student Fine</label>
                                    @error('status')
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
                Edit Student Fine
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Edit Student Fine</h4>
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
                                    <label for="fine_id" class="form-label">Select Fine</label>
                                    <select class="form-select @error('fine_id') is-invalid @enderror" id="fine_id" wire:model="fine_id" >
                                        <option value="" hidden>Select Fine</option>
                                        @foreach ($fines as $item1)
                                            <option  value="{{ $item1->id }}"> {{ $item1->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('fine_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="amount" class="form-label">Fine Amount</label>
                                    <input type="number" min="0" class="form-control @error('amount') is-invalid @enderror" wire:model="amount" value="{{ old('amount') }}" id="amount" placeholder="Enter Amount">
                                    @error('amount')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group form-check-primary form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ $status==1?'checked':''; }} id="class_status"  wire:model="status" >
                                    <label class="form-check-label" for="class_status">In-Active Student Fine</label>
                                    @error('status')
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
                    All Student Fines
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <a wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Student Fine<span class="btn-label-right"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                </a>
                            </div>
                            <h4 class="page-title">Data Student Fines</h4>
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
                                            <th>Fine Name</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student_fines as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>                                     
                                                <td>{{ $item->AcademicYear->year}}</td>
                                                <td>{{ $item->Student->name }}</td>  
                                                <td>{{ $item->Fine->name }}</td>  
                                                <td>{{ $item->amount }}</td>       
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

