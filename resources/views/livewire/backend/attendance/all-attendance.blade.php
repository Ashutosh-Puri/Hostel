<div class="content" >
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Attendance
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Add Attendance</h2>
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
                            <form wire:submit.prevent="save" method="post" action="" id="myForm">
                                @csrf
                                <div class="row text-start">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="student_id" class="form-label">Select Student</label>
                                            <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" wire:model="student_id">
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
                                            <label for="rfid" class="form-label">RFID</label>
                                            <input type="text" class="form-control @error('rfid') is-invalid @enderror"  wire:model="rfid" value="{{ old('rfid') }}" id="rfid" placeholder="Enter RFID">
                                            @error('rfid')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary ">Save Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=='edit')
            @section('title')
                Edit Attendance
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Attendance</h2>
                            <div wire:loading class="loading-overlay">
                                <div class="loading-spinner">
                                    <div class="spinner-border spinner-border-lg text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
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
                                <div class="row text-start">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="student_id" class="form-label">Select Student</label>
                                            <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" wire:model="student_id">
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
                                            <label for="rfid" class="form-label">RFID</label>
                                            <input type="text" class="form-control @error('rfid') is-invalid @enderror"  wire:model="rfid" value="{{ old('rfid') }}" id="rfid" placeholder="Enter RFID">
                                            @error('rfid')
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
                    All Attendance
                @endsection
                <div class="row" wire:poll.5s>
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Data Attendance</h2>
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
                                @can('View Attendance')
                                <a   target="_blank"  class="btn btn-warning " href="{{ route('admin_view_attendance',['array' => json_encode($attendanceArray['id'])]) }}"> <i class="mdi mdi-eye"></i></a>
                                @endcan
                                @can('Download Attendance')
                                    <a   target="_blank"  class="btn btn-warning " href="{{ route('admin_download_attendance',['array' => json_encode($attendanceArray['id'])]) }}"> <i class="mdi mdi-download"></i></a>
                                @endcan
                                @can('Add Attendance')
                                    <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success ">
                                        Add Attendance<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
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
                                    <select class=" col-8 col-md-1" wire:loading.attr="disabled" wire:model="per_page">
                                        <option value="10">10</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                    </select>
                                    <span class="col-12 col-md-10 p-0">
                                        <span class="row">
                                            <div class="col-12 col-md-1 ">
                                                    <label class="w-100 p-1  text-md-end">Search</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input class="w-100 py-1" wire:model.debounce.1000ms="s_name" type="search" placeholder="Student Name">
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input class="w-100 py-1" wire:model.debounce.1000ms="s_rfid" type="search" placeholder="Student RFID">
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="sortby_feild">
                                                    <option value="" hidden>Sort By</option>
                                                    <option value="student_id">Name</option>
                                                    <option value="rfid">RFID</option>
                                                    <option value="entry_time">Entry Time</option>
                                                </select>
                                            </div>
                                            <div class="col-4 col-md-1">
                                                <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="sortby_order">
                                                    <option value="ASC">ASC</option>
                                                    <option value="DESC">DESC</option>
                                                </select>
                                            </div>
                                            <div class="col-2 col-md-1  ">
                                                <button wire:click='clear'class="  btn btn-sm btn-danger "><i class="mdi  mdi-close"></i></button>
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
                                            <th>Student Name</th>
                                            <th>RFID</th>
                                            <th>Entry Time</th>
                                            <th>Exit Time</th>
                                            @can('Edit Attendance')
                                                <th>Action</th>
                                            @elsecan('Delete Attendance')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attendance as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->Student->name!==null?$item->Student->name:$item->Student->username;}}</td>
                                                <td>{{ $item->rfid}}</td>
                                                <td>{{ date('d / m / Y - h : i : s - A',strtotime($item->entry_time))}}</td>
                                                <td> @if ($item->exit_time) {{ date('d / m / Y - h : i : s - A',strtotime($item->exit_time)) }} @endif</td>
                                                @can('Edit Attendance')
                                                <td>
                                                    @can('Edit Attendance')
                                                        <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                    @endcan
                                                    @can('Delete Attendance')
                                                        @if ($item->deleted_at)
                                                            <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                            <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                        @else
                                                            <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                        @endif
                                                    @endcan
                                                </td>
                                            @elsecan('Delete Attendance')
                                                <td>
                                                    @can('Edit Attendance')
                                                        <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                    @endcan
                                                    @can('Delete Attendance')
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
                                    {{ $attendance->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

