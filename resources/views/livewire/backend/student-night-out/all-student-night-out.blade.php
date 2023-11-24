<div class="content">
    <div class="container-fluid">
        @if ($mode == 'add') @section('title')
            Add Night Out Entry
        @endsection
        <div class="row">
            <div class="col-12">
                <div class="bg-success">
                    <div class="float-start pt-2 px-2">
                        <h2>Add Night Out Entry</h2>
                    </div>
                    <div class="float-end">
                        <a wire:loading.attr="disabled" wire:click="setmode('all')" class="btn btn-success ">
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
                        <form wire:submit.prevent="save" method="post" action="" id="myForm">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="going_date" class="form-label">Going Date</label>
                                        <input type="date"
                                            class="form-control @error('going_date') is-invalid @enderror"
                                            wire:model.debounce.1000ms="going_date" value="{{ old('going_date') }}"
                                            min="{{ date('Y-m-d') }}" id="going_date" />
                                        @error('going_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="comming_date" class="form-label">Comming Date</label>
                                        <input type="date"
                                            class="form-control @error('comming_date') is-invalid @enderror"
                                            wire:model.debounce.1000ms="comming_date"
                                            value="{{ old('comming_date') }}" min="{{ date('Y-m-d') }}"
                                            id="comming_date" />
                                        @error('comming_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="reason" class="form-label">Hostel Leaving Reasone</label>
                                        <textarea class="w-100 @error('reason') is-invalid @enderror" wire:model.debounce.1000ms="reason" id="reason"
                                            placeholder="Enter Reasone To Leave Hostel" cols="30" rows="4">
                                            {{ old('reason') }}</textarea>
                                        @error('reason')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @elseif($mode == 'edit')
        @section('title')
            Edit Night Out Entry
        @endsection
        <div class="row">
            <div class="col-12">
                <div class="bg-success">
                    <div class="float-start pt-2 px-2">
                        <h2> Edit Night Out Entry</h2>
                    </div>
                    <div class="float-end">
                        <a wire:loading.attr="disabled" wire:click="setmode('all')" class="btn btn-success ">
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
                        <form wire:submit.prevent="update({{ isset($c_id) ? $c_id : '' }})" method="post"
                            action="" id="myForm">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="going_date" class="form-label">Going Date</label>
                                        <input type="date"
                                            class="form-control @error('going_date') is-invalid @enderror"
                                            wire:model.debounce.1000ms="going_date" value="{{ old('going_date') }}"
                                            min="{{ date('Y-m-d') }}" id="going_date" />
                                        @error('going_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="comming_date" class="form-label">Comming Date</label>
                                        <input type="date"
                                            class="form-control @error('comming_date') is-invalid @enderror"
                                            wire:model.debounce.1000ms="comming_date"
                                            value="{{ old('comming_date') }}" min="{{ date('Y-m-d') }}"
                                            id="comming_date" />
                                        @error('comming_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="reason" class="form-label">Hostel Leaving Reasone</label>
                                        <textarea class="w-100 @error('reason') is-invalid @enderror" wire:model.debounce.1000ms="reason" id="reason"
                                            placeholder="Enter Reasone To Leave Hostel" cols="30" rows="4">
                                            {{ old('reason') }}</textarea>
                                        @error('reason')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ">
                                Update Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @elseif($mode = 'all')
        <div>
            @section('title')
                All Student Night Out Register
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Data Student Night Out Register</h2>
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
                                <span class="spinner-border spinner-border-sm " role="status"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Loading...</span>
                            </a>
                            @can('Add Student Night Out Form')
                                <a wire:loading.attr="disabled" wire:click="setmode('add')" class="btn btn-success ">
                                    Add Night Out Entry<span class="btn-label-right mx-2"><i
                                            class="mdi mdi-plus-circle fw-bold"></i></span>
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
                                <label class="col-4 col-md-1 py-1">Per Page</label>
                                <select class="col-4 col-md-1" wire:loading.attr="disabled"
                                    wire:model="per_page">
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                </select>
                                <label class="col-4 col-md-1 py-1">Records</label>
                                <span class="col-12 col-md-9 p-0">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <label class="w-100 p-1 text-md-end">Search</label>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <input class="w-100" wire:model.debounce.1000ms="year"
                                                type="search" placeholder="Academic Year" />
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <input class="w-100" wire:model.debounce.1000ms="class_name"
                                                type="search" placeholder="Class Name" />
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <input class="w-100" wire:model.debounce.1000ms="student_name"
                                                type="search" placeholder="Student Name" />
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="data-table" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        <th>Student</th>
                                        {{-- <th>Reason</th> --}}
                                        <th>Going Date</th>
                                        <th>Comming Date</th>
                                        <th>Room</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($night_out as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                {{ $item->allocation->admission->academicyear->year }}
                                            </td>
                                            <td>
                                                {{ $item->allocation->admission->Class->name }}
                                            </td>
                                            <td>
                                                {{ $item->allocation->admission->Student->name }}
                                            </td>
                                            {{-- <td class="text-wrap lh-lg">
                                            {{ $item->reason }}
                                        </td> --}}
                                            <td>
                                                {{ date('d / m / Y', strtotime($item->going_date)) }}
                                            </td>
                                            <td>
                                                {{ date('d / m / Y', strtotime($item->comming_date)) }}
                                            </td>
                                            <td>
                                                {{ $item->allocation->Bed->Room->id }} - (
                                                {{ $item->allocation->Bed->Room->label }} )
                                            </td>
                                            <td>
                                                @if ($item->status == '0')
                                                    <span class="badge bg-warning text-white">Pending</span>
                                                @elseif ($item->status == '1')
                                                    <span class="badge bg-success text-white">Approved</span>
                                                @else
                                                    <span class="badge bg-danger text-white">Done</span>
                                                @endif
                                            </td>
                                            @can('View Student Night Out Form')
                                                <td>
                                                    @can('View Student Night Out Form')
                                                        <a target="_blank" class="btn btn-warning "
                                                            href="{{ route('view_night_out_form', $item->id) }}"> <i
                                                                class="mdi mdi-eye"></i></a>
                                                    @endcan
                                                    @can('Download Student Night Out Form')
                                                        <a target="_blank" class="btn btn-warning "
                                                            href="{{ route('download_night_out_form', $item->id) }}"> <i
                                                                class="mdi mdi-download"></i></a>
                                                    @endcan
                                                    @can('Edit Student Night Out Form')
                                                        <a wire:loading.attr="disabled"
                                                            wire:click="edit({{ $item->id }})"
                                                            class="btn btn-success "><i
                                                                class="mdi mdi-lead-pencil"></i></a>
                                                        @if ($item->status == 1)
                                                            <a wire:loading.attr="disabled"
                                                                wire:click="status({{ $item->id }})"
                                                                class="btn btn-danger ">
                                                                <i class="mdi mdi-thumb-down"></i>
                                                            </a>
                                                        @elseif ($item->status == 0)
                                                            <a wire:loading.attr="disabled"
                                                                wire:click="status({{ $item->id }})"
                                                                class="btn btn-success ">
                                                                <i class="mdi mdi-thumb-up"></i>
                                                            </a>
                                                        @endif
                                                        @endcan @can('Delete Student Night Out Form')
                                                        @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                    @endcan
                                                </td>
                                            @elsecan('Edit Student Night Out Form')
                                                <td>
                                                    @can('View Student Night Out Form')
                                                        <a target="_blank" class="btn btn-warning "
                                                            href="{{ route('view_night_out_form', $item->id) }}"> <i
                                                                class="mdi mdi-eye"></i></a>
                                                    @endcan
                                                    @can('Download Student Night Out Form')
                                                        <a target="_blank" class="btn btn-warning "
                                                            href="{{ route('download_night_out_form', $item->id) }}"> <i
                                                                class="mdi mdi-download"></i></a>
                                                    @endcan
                                                    @can('Edit Student Night Out Form')
                                                        <a wire:loading.attr="disabled"
                                                            wire:click="edit({{ $item->id }})"
                                                            class="btn btn-success "><i
                                                                class="mdi mdi-lead-pencil"></i></a>
                                                        @if ($item->status == 1)
                                                            <a wire:loading.attr="disabled"
                                                                wire:click="status({{ $item->id }})"
                                                                class="btn btn-danger ">
                                                                <i class="mdi mdi-thumb-down"></i>
                                                            </a>
                                                        @elseif ($item->status == 0)
                                                            <a wire:loading.attr="disabled"
                                                                wire:click="status({{ $item->id }})"
                                                                class="btn btn-success ">
                                                                <i class="mdi mdi-thumb-up"></i>
                                                            </a>
                                                        @endif
                                                        @endcan @can('Delete Student Night Out Form')
                                                        @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                    @endcan
                                                </td>
                                            @elsecan('Delete Student Night Out Form')
                                                <td>
                                                    @can('View Student Night Out Form')
                                                        <a target="_blank" class="btn btn-warning "
                                                            href="{{ route('view_night_out_form', $item->id) }}"> <i
                                                                class="mdi mdi-eye"></i></a>
                                                    @endcan
                                                    @can('Download Student Night Out Form')
                                                        <a target="_blank" class="btn btn-warning "
                                                            href="{{ route('download_night_out_form', $item->id) }}"> <i
                                                                class="mdi mdi-download"></i></a>
                                                    @endcan
                                                    @can('Edit Student Night Out Form')
                                                        <a wire:loading.attr="disabled"
                                                            wire:click="edit({{ $item->id }})"
                                                            class="btn btn-success "><i
                                                                class="mdi mdi-lead-pencil"></i></a>
                                                        @if ($item->status == 1)
                                                            <a wire:loading.attr="disabled"
                                                                wire:click="status({{ $item->id }})"
                                                                class="btn btn-danger ">
                                                                <i class="mdi mdi-thumb-down"></i>
                                                            </a>
                                                        @elseif ($item->status == 0)
                                                            <a wire:loading.attr="disabled"
                                                                wire:click="status({{ $item->id }})"
                                                                class="btn btn-success ">
                                                                <i class="mdi mdi-thumb-up"></i>
                                                            </a>
                                                        @endif
                                                        @endcan @can('Delete Student Night Out Form')
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
                                {{ $night_out->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
</div>
