<div class="content">
    <div class="container-fluid">
        @if ($mode == 'add') @section('title')
        Add Come From Home Entry
        @endsection
        <div class="row">
            <div class="col-12">
                <div class="bg-success">
                    <div class="float-start pt-2 px-2">
                        <h2>Add Come From Home Entry</h2>
                    </div>
                    <div class="float-end">
                        <a wire:loading.attr="disabled" wire:click="setmode('all')"
                            class="btn btn-success ">
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
                        <form wire:submit="save" method="post" action="" id="myForm">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="student_id" class="form-label">Select Student</label>
                                        <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" wire:model.change="student_id">
                                            <option  hidden value="">Select Students</option>
                                            @foreach($students as $item2)
                                                <option class="py-4" value="{{ $item2->id  }}">{{  $item2->name!=null?$item2->name: $item2->username; }}</option>
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
                                        <label for="come_time" class="form-label">Come Time</label>
                                        <input type="time" wire:model.live="come_time"
                                            class="form-control @error('come_time') is-invalid @enderror " id="time"
                                            placeholder="Enter Come Time" />
                                        @error('come_time')
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
        Edit Come From Home Entry
        @endsection
        <div class="row">
            <div class="col-12">
                <div class="bg-success">
                    <div class="float-start pt-2 px-2">
                        <h2> Edit Come From Home Entry</h2>
                    </div>
                    <div class="float-end">
                        <a wire:loading.attr="disabled" wire:click="setmode('all')"
                            class="btn btn-success ">
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
                        <form wire:submit="update({{ isset($c_id) ? $c_id : '' }})" method="post" action=""
                            id="myForm">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="student_id" class="form-label">Select Student</label>
                                        <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" wire:model.change="student_id">
                                            <option  hidden value="">Select Students</option>
                                            @foreach($students as $item2)
                                                <option class="py-4" value="{{ $item2->id  }}">{{  $item2->name!=null?$item2->name: $item2->username; }}</option>
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
                                        <label for="come_time" class="form-label">Come Time</label>
                                        <input type="time" wire:model.live="come_time"
                                            class="form-control @error('come_time') is-invalid @enderror " id="time"
                                            placeholder="Enter Come Time" />
                                        @error('come_time')
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
            All Student Come From Home
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Data Student Come From Home</h2>
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
                            @can('Add Student Come From Home Form')
                            <a wire:loading.attr="disabled" wire:click="setmode('add')"
                                class="btn btn-success ">
                                Add Come From Home Entry<span class="btn-label-right mx-2"><i
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
                                <select class="col-4 col-md-1" wire:loading.attr="disabled" wire:model.change="per_page">
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
                                            <input class="w-100" wire:model.live.debounce.1000ms="year" type="search"
                                                placeholder="Academic Year" />
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <input class="w-100" wire:model.live.debounce.1000ms="class_name" type="search"
                                                placeholder="Class Name" />
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <input class="w-100" wire:model.live.debounce.1000ms="student_name" type="search"
                                                placeholder="Student Name" />
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
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Come Date</th>
                                        <th>Come Time</th>
                                        <th>Room</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($come_from_home as $key => $item)
                                    <tr wire:key='{{ $item->id }}'>
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
                                        <td>
                                            {{ $item->allocation->admission->Student->mobile }}
                                        </td>
                                        <td class="text-wrap lh-lg">
                                            {{ $item->allocation->admission->Student->parent_address }}
                                        </td>
                                        <td>{{ date('d / m / Y', strtotime($item->come_time)) }}
                                        </td>
                                        <td>
                                            {{ date('h:i A', strtotime($item->come_time)) }}
                                        </td>
                                        <td>
                                            @if (isset($item->allocation->bed_id))
                                                {{  $item->allocation->Bed->Room->id }} - (  {{  $item->allocation->Bed->Room->label }} )
                                            @else
                                                N.A
                                            @endif
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
                                        @can('Edit Student Come From Home Form')
                                        <td>
                                            @if (!$item->deleted_at)
                                                @can('Edit Student Come From Home Form')
                                                    <a wire:loading.attr="disabled" wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                    @if ($item->status == 1)
                                                        <a wire:loading.attr="disabled" wire:click="update_status({{ $item->id }})" class="btn btn-danger "><i class="mdi mdi-thumb-down"></i></a>
                                                    @elseif ($item->status == 0)
                                                        <a wire:loading.attr="disabled" wire:click="update_status({{ $item->id }})"class="btn btn-success "> <i class="mdi mdi-thumb-up"></i></a>
                                                    @endif
                                                @endcan 
                                            @endif
                                            @can('Delete Student Come From Home Form')
                                                @if ($item->deleted_at)
                                                    <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                    <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                @else
                                                    <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                @endif
                                            @endcan
                                        </td>
                                        @elsecan('Delete Student Come From Home Form')
                                        <td>
                                            @if (!$item->deleted_at)
                                                @can('Edit Student Come From Home Form')
                                                    <a wire:loading.attr="disabled" wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                    @if ($item->status == 1)
                                                        <a wire:loading.attr="disabled" wire:click="update_status({{ $item->id }})" class="btn btn-danger "><i class="mdi mdi-thumb-down"></i> </a>
                                                    @elseif ($item->status == 0)
                                                        <a wire:loading.attr="disabled" wire:click="update_status({{ $item->id }})"class="btn btn-success "><i class="mdi mdi-thumb-up"></i></a>
                                                    @endif
                                                @endcan 
                                            @endif
                                            @can('Delete Student Come From Home Form')
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
                                {{ $come_from_home->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @section('scripts')
    @endsection
</div>