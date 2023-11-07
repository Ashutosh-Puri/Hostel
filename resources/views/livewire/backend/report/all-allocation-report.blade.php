<div>
    @section('title')
        Allocation Report
    @endsection
    <div class="row">
        <div class="col-12">
            <div class="bg-success">
                <div class="float-start pt-2 px-2">
                    <h2>Data Allocation Report</h2>
                    <div wire:loading class="loading-overlay">
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
                    @can('View Allocation Report')
                        <a   target="_blank"  class="btn btn-warning " href="{{ route('admin_view_allocation_report',['array' => json_encode($admissionArray['id']),'bed_status'=>$bed_status]) }}"> <i class="mdi mdi-eye"></i></a>
                    @endcan
                    @can('Download Allocation Report')
                    
                        <a   target="_blank"  class="btn btn-warning " href="{{ route('admin_download_allocation_report',['array' => json_encode($admissionArray['id']),'bed_status'=>$bed_status]) }}"> <i class="mdi mdi-download"></i></a>
                        <a wire:loading.attr="disabled"wire:loading.remove wire:click="generateEXCEL()"class="btn btn-success ">
                            EXCEL<span class="btn-label-right mx-2"><i class=" mdi mdi-arrow-down-bold fw-bold"></i></span>
                        </a>
                        <a  wire:loading wire:target="generateEXCEL" class="btn btn-success ">
                            Processing..<span class="btn-label-right mx-2"><i class=" mdi mdi-arrow-down-bold fw-bold"></i></span>
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
                        <label class=" col-4 col-md-1  py-1 ">Records</label>
                        <span class="col-12 col-md-9 p-0">
                            <div class="row ">
                                <div class="col-12 col-md-2 ">
                                </div>
                                <div class="col-6 col-md-3 ">
                                    <select class="w-100 py-1"  wire:loading.attr="disabled" wire:model="year_id">
                                        <option value="" hidden>Select Year</option>
                                        @foreach ($years as $y) 
                                            <option value="{{ $y->id }}">{{ $y->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-3 ">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="class_id">
                                        <option value="" hidden>Select Class</option>
                                        @foreach ($class as $y) 
                                            <option value="{{ $y->id }}">{{ $y->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-3">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="bed_status">
                                        <option value="" hidden>Select Bed Status</option>
                                        <option value="1">Allocated</option>
                                        <option value="0">Not Allocated</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-1  ">
                                    <button wire:click='clear'class="  btn btn-sm btn-danger "><i class="mdi  mdi-close"></i></button>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <div  class="card-body table-responsive">
                    <table id="data-table-custom" class="table  dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Year</th>
                                <th>Class</th>
                                <th>Student Name</th>
                               
                                @if ($bed_status==null)
                                    <th>Hostel</th>
                                    <th>Building</th>
                                    <th>Floor</th>
                                    <th>Room</th>
                                    <th>Bed</th>  
                                @elseif ($bed_status==1)
                                    <th>Hostel</th>
                                    <th>Building</th>
                                    <th>Floor</th>
                                    <th>Room</th>
                                    <th>Bed</th>  
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admission as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->AcademicYear->year }}</td>
                                    <td>{{ $item->Class->name }}</td>                                   
                                    <td>{{ $item->Student->name}}</td>
                                    @if ($item->allocations->isEmpty())
                                        @if ($bed_status==null)
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td> 
                                        @elseif ($bed_status==1)
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        @endif
                                    @else
                                    @foreach ($item->allocations as $aIndex => $a)
                                        @if ($a->bed_id)
                                            @if ($aIndex === 0)
                                                <td>
                                                    {{ $a->Bed->Room->Floor->Building->Hostel->name }}
                                                </td>
                                            @endif
                                            @if ($aIndex === 0)
                                                <td>
                                                    {{ $a->Bed->Room->Floor->Building->name }}
                                                </td>
                                            @endif
                                            @if ($aIndex === 0)
                                                <td>
                                                    {{ in_array( $a->Bed->Room->Floor->floor, range(0, 10)) ? ['Ground', 'First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth'][ $a->Bed->Room->Floor->floor] :  $a->Bed->Room->Floor->floor }}
                                                </td>
                                            @endif
                                            @if ($aIndex === 0)
                                                <td>
                                                    {{ $a->Bed->Room->id }}-({{ $a->Bed->Room->label }})
                                                </td>
                                            @endif
                                            @if ($aIndex === 0)
                                                <td>
                                                    {{ $a->Bed->id }}
                                                </td>
                                            @endif
                                        @else  
                                        @if ($bed_status==null)
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        @elseif ($bed_status==1)
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        @endif
                                        @endif
                                @endforeach 
                                    @endif
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $admission->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>

           $('#data-table-custom').DataTable({
                searching:false,
                paging:false,
                info:false,
            });

    </script>
    @endpush
</div>
    
