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
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="deposite" class="form-label">Deposite</label>
                                            <input type="text" min="0"  class="form-control readonly @error('deposite') is-invalid @enderror" wire:model="deposite" value="{{ old('deposite') }}" id="deposite" placeholder="Enter Fee Amount">
                                            @error('deposite')
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
                Edit Student Payment
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Student Payment</h2>
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
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="deposite" class="form-label">Deposite</label>
                                            <input type="text" min="0"  class="form-control readonly @error('deposite') is-invalid @enderror" wire:model="deposite" value="{{ old('deposite') }}" id="deposite" placeholder="Enter Fee Amount">
                                            @error('deposite')
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
                                @can('Add Student Payment')
                                    <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success ">
                                        Add Student Payment<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
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
                                    <label class=" col-4 col-md-1  py-1  ">Records</label>
                                    <span class="col-12 col-md-9 p-0">
                                        <span class="row">
                                            <div class="col-12 col-md-3 ">
                                                    <label class="w-100 p-1  text-md-end">Search</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input class="w-100" wire:model.debounce.1000ms="admission_name" type="search" placeholder="Admission ID">
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input class="w-100" wire:model.debounce.1000ms="year" type="search" placeholder="Academic Year">
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input class="w-100" wire:model.debounce.1000ms="student_name" type="search" placeholder="Student Name">
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
                                            @can('Pay Student Payment')
                                            <th>Paymet</th>
                                            @endcan
                                            @can('Edit Student Payment')
                                                <th>Action</th>
                                            @elsecan('Delete Student Payment')
                                                <th>Action</th>
                                            @endcan
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
                                                <td>
                                                    @if ( $item->total_amount>0)
                                                        <span class="badge p-2 bg-success text-white">{{ $item->total_amount }} Rs.</span>
                                                    @elseif ( $item->total_amount<0)
                                                        <span class="badge p-2 bg-danger text-white">{{ $item->total_amount }} Rs.</span>
                                                    @else
                                                        <span class="badge p-2 bg-primary text-white">{{ $item->total_amount }} Rs.</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ( $item->status == '0')
                                                        <span class="badge bg-warning text-white">Not Paid</span>
                                                    @elseif ( $item->status == '1')
                                                        <span class="badge bg-success text-white">Paid</span>
                                                    @elseif ( $item->status == '2')
                                                        <span class="badge bg-danger text-white">Cancelled</span>
                                                    @elseif ( $item->status == '3')
                                                        <span class="badge bg-info text-white">Refunded</span>
                                                    @endif
                                                </td>
                                                @can('Pay Student Payment')
                                                <td>
                                                    @if ($item->status==0)
                                                        @if ($item->total_amount >0)
                                                            <a class="btn btn-sm btn-success" data-turbolinks="false" href="{{ route('pay_fee',$item->id) }}" >Pay</a>
                                                        @endif
                                                    @endif
                                                    @if ($item->status==2)
                                                        @if ($item->total_amount >=0)
                                                            @if (isset($item->transaction->status))
                                                                @if ($item->transaction->status==2)
                                                                    <a  class="btn  btn-sm btn-primary" data-turbolinks="false" href="{{ route('refund_fee',$item->id) }}" >Refund</a>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                </td>
                                                @endcan
                                                
                                                @can('View Student Payment Reciept')
                                                    <td>
                                                        @can('View Student Payment Reciept')
                                                            <a   target="_blank"  class="btn btn-warning " href="{{ route('view_fee_recipet', $item->id) }}"> <i class="mdi mdi-eye"></i></a>
                                                        @endcan
                                                        @can('Download Student Payment Reciept')
                                                            <a   target="_blank"  class="btn btn-warning " href="{{ route('download_fee_recipet', $item->id) }}"> <i class="mdi mdi-download"></i></a>
                                                        @endcan
                                                        @can('Edit Student Payment')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                            @if ($item->status==1)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-danger "> <i class="mdi mdi-thumb-down"></i> </a>
                                                            @elseif ($item->status==2)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-warning "> <i class="mdi mdi-clock"></i> </a>
                                                            @elseif ($item->status==0)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-thumb-up"></i> </a>
                                                            @endif
                                                        @endcan
                                                        @can('Delete Student Payment')
                                                            @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                        @endcan
                                                    </td>
                                                @elsecan('Edit Student Payment')
                                                    <td>
                                                        @can('View Student Payment Reciept')
                                                            <a   target="_blank"  class="btn btn-warning " href="{{ route('view_fee_recipet', $item->id) }}"> <i class="mdi mdi-eye"></i></a>
                                                        @endcan
                                                        @can('Download Student Payment Reciept')
                                                            <a   target="_blank"  class="btn btn-warning " href="{{ route('download_fee_recipet', $item->id) }}"> <i class="mdi mdi-download"></i></a>
                                                        @endcan
                                                        @can('Edit Student Payment')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                            @if ($item->status==1)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-danger "> <i class="mdi mdi-thumb-down"></i> </a>
                                                            @elseif ($item->status==2)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-warning "> <i class="mdi mdi-clock"></i> </a>
                                                            @elseif ($item->status==0)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-thumb-up"></i> </a>
                                                            @endif
                                                        @endcan
                                                        @can('Delete Student Payment')
                                                            @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                        @endcan
                                                    </td>
                                                @elsecan('Delete Student Payment')
                                                    <td>
                                                        @can('View Student Payment Reciept')
                                                            <a   target="_blank"  class="btn btn-warning " href="{{ route('view_fee_recipet', $item->id) }}"> <i class="mdi mdi-eye"></i></a>
                                                        @endcan
                                                        @can('Download Student Payment Reciept')
                                                            <a   target="_blank"  class="btn btn-warning " href="{{ route('download_fee_recipet', $item->id) }}"> <i class="mdi mdi-download"></i></a>
                                                        @endcan
                                                        @can('Edit Student Payment')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                            @if ($item->status==1)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-danger "> <i class="mdi mdi-thumb-down"></i> </a>
                                                            @elseif ($item->status==2)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-warning "> <i class="mdi mdi-clock"></i> </a>
                                                            @elseif ($item->status==0)
                                                                <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-thumb-up"></i> </a>
                                                            @endif
                                                        @endcan
                                                        @can('Delete Student Payment')
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
                                    {{ $student_payments->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>


