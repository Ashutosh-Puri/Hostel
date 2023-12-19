<div>
    @section('title')
        Attendance Report
    @endsection
    <div class="row">
        <div class="col-12">
            <div class="bg-success">
                <div class="float-start pt-2 px-2">
                    <h2>Data Attendance Report</h2>  
                    <div wire:loading wire:target="per_page" class="loading-overlay">
                        <div class="loading-spinner">
                            <div class="spinner-border spinner-border-lg text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-end">
                    @can('View Attendance Report')
                        <a   target="_blank"  class="btn btn-warning " href="{{ route('admin_view_attendance_report',['array' => json_encode($attendanceArray['id'])]) }}"> <i class="mdi mdi-eye"></i></a>
                    @endcan
                    @can('Download Attendance Report')
                    
                        <a   target="_blank"  class="btn btn-warning " href="{{ route('admin_download_attendance_report',['array' => json_encode($attendanceArray['id'])]) }}"> <i class="mdi mdi-download"></i></a>
                        <a wire:loading.attr="disabled" wire:loading.remove wire:click="generateEXCEL()"
                            class="btn btn-success ">
                            EXCEL<span class="btn-label-right"><i class=" mdi mdi-arrow-down-bold fw-bold"></i></span>
                        </a>
                        <a wire:loading wire:target="generateEXCEL" class="btn btn-success ">
                            Processing..<span class="btn-label-right"><i
                                    class=" mdi mdi-arrow-down-bold fw-bold"></i></span>
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
                        <select class=" col-8 col-md-1" wire:loading.attr="disabled" wire:model.change="per_page">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="500">500</option>
                            <option value="1000">1000</option>
                        </select>
                        <span class="col-12 col-md-10 p-0">
                            <div class="row ">
                                <div class="col-6 col-md-1  ">
                                </div>
                                <div class="col-6 col-md-1 ">
                                    <input  class=" w-100 py-1"type="search" wire:model.live="year" id="" placeholder="Year">
                                </div>
                                <div class="col-6 col-md-1 ">
                                    <input  class=" w-100 py-1"type="search" wire:model.live="month" id="" placeholder="Month">
                                </div>
                                <div class="col-6 col-md-2 ">
                                    <input  class=" w-100 py-1"type="date" wire:model.live="date" id="" >
                                </div>
                                <div class="col-6 col-md-2 ">
                                    <input  class=" w-100 py-1"type="search" wire:model.live="student_name" id="" placeholder="Student Name">
                                </div>
                                <div class="col-6 col-md-2">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model.change="gender">
                                        <option value="" hidden>Gender</option>
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-2">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model.change="filter">
                                        <option value="" hidden>Filter</option>
                                        <option value="1">Today</option>
                                        <option value="2">Yesterday</option>
                                        <option value="3">This Week</option>
                                        <option value="4">This Month</option>
                                        <option value="5">This Year</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-1">
                                    <button wire:click='clear' class="btn btn-sm btn-danger"><i class="mdi  mdi-close"></i></button>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="data-table-custom" class="table  dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Student</th>
                                <th>Gender</th>
                                <th>Entry Time</th>
                                <th>Exit Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $key => $a)
                                <tr wire:key='{{ $a->id }}'>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $a->Student->name!=null?$a->Student->name:$a->Student->username; }}</td>
                                    <th>{{ $a->Student->gender===1?'Female':'Male'; }}</th>
                                    <td>
                                        @if ($a->entry_time)
                                            {{ date('d / m / Y - h : m : s - A',strtotime($a->entry_time)) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($a->exit_time)
                                            {{ date('d / m / Y - h : m : s - A',strtotime($a->exit_time)) }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $attendance->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card my-3">
                    <div class="card-header">
                        <h3>Total Admitted Students In {{  now()->year }}  ( {{ $total_admission }} ) 
                            <span  class="float-end">Attendance  @if ($filter=='1') Today @elseif ($filter=='2') Yesterday @elseif ($filter=='3') This Week @elseif ($filter=='4')  This Month @elseif ($filter=='5') This Year @endif</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card my-3">
                    <div class="card-header d-inline">
                        <h3>Absent Students ( {{ count($absent_students) }} )</h3>
                      
                        <a wire:loading.attr="disabled"  wire:click="notifyall()"class="btn btn-sm btn-primary float-end">
                            <span wire:loading  wire:target='notifyall' class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                            <span wire:loading  wire:target='notifyall'>Sending Email</span>
                            <span wire:loading.remove  wire:target='notifyall'> Notify All</span> 
                        </a>
                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @foreach ($absent_students as $as)  
                                            <tr wire:key='{{ $as->id }}'>
                                                <td scope="row">{{ $as->id }}</td>
                                                <td>{{ $as->name }}</td>
                                                <td>{{ $as->gender==1?'Female':'Male'; }}</td>
                                                <td>
                                                    <a wire:loading.attr="disabled"  wire:click="notify({{ $as->id }})"class="btn btn-sm btn-primary ">
                                                        <span wire:loading  wire:target='notify' class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                                                        <span wire:loading  wire:target='notify'>Sending Email</span>
                                                        <span wire:loading.remove  wire:target='notify'> Notify </span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card  my-3">
                    <div class="card-header">
                        <h3>Present Students ( {{ count($present_students) }} )</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  dt-responsive nowrap w-100">
                                <thead >
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($present_students as $as)  
                                            <tr wire:key='{{ $as->id }}'>
                                                <td scope="row">{{ $as->id }}</td>
                                                <td>{{ $as->name }}</td>
                                                <td>{{ $as->gender==1?'Female':'Male'; }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
