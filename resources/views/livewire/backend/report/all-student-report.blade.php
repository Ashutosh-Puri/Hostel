<div>
    @section('title')
        Student Report
    @endsection
    <div class="row">
        <div class="col-12">
            <div class="bg-success">
                <div class="float-start pt-2 px-2">
                    <h2>Data Students Report</h2>
                    <div wire:loading wire:target="per_page" class="loading-overlay">
                        <div class="loading-spinner">
                            <div class="spinner-border spinner-border-lg text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-end">
                    @can('View Student Report')
                        <a target="_blank"  class="btn btn-warning " href="{{ route('admin_view_student_report',['array' => json_encode($admissionArray['id'])]) }}"> <i class="mdi mdi-eye"></i></a>
                    @endcan
                    @can('Download Student Report')
                    
                        <a target="_blank"  class="btn btn-warning " href="{{ route('admin_download_student_report',['array' => json_encode($admissionArray['id'])]) }}"> <i class="mdi mdi-download"></i></a>
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
                                <div class="col-6 col-md-3 ">
                                    <input class="w-100 py-1" type="search" wire:model.debounce.1000ms="student_name" id="" placeholder="Student Name">
                                </div>
                                <div class="col-6 col-md-2">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="admission_status">
                                        <option value="" hidden>Admission Status</option>
                                        <option value="0">Waiting</option>
                                        <option value="1">Confirmed</option>
                                        <option value="2">Canceled</option>
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
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Parent Mobile</th>
                                <th>Student Status</th>
                                <th>Admission Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admission as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->AcademicYear->year }}</td>
                                    <td>{{ $item->Class->name }}</td>
                                    <td>{{ $item->Student->name}}</td>
                                    <td>{{ $item->Student->email }}</td>
                                    <td>{{ $item->Student->mobile}}</td>
                                    <td>{{ $item->Student->parent_mobile}}</td>
                                    <td>{{ $item->Student->status ==0?"Active":"In Active";}}</td>
                                    <td>{{ $item->status ==0?"Waiting":($item->status ==1?"Confirmed":"Canceled"); }}</td>
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

