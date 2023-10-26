<div>
    @section('title')
        Payment Report
    @endsection
    <div class="row">
        <div class="col-12">
            <div class="bg-success">
                <div class="float-start pt-2 px-2">
                    <h2>Data Payments Report</h2>  
                    <div wire:loading class="loading-overlay">
                        <div class="loading-spinner">
                            <div class="spinner-border spinner-border-lg text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-end">
                    @can('View Payment Report')
                        <a target="_blank"  class="btn btn-warning " href="{{ route('admin_view_payment_report',['array' => json_encode($paymentArray['id'])]) }}"> <i class="mdi mdi-eye"></i></a>
                    @endcan
                    @can('Download Payment Report')
                        <a target="_blank"  class="btn btn-warning " href="{{ route('admin_download_payment_report',['array' => json_encode($paymentArray['id'])]) }}"> <i class="mdi mdi-download"></i></a>
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
                        <select class=" col-8 col-md-1" wire:loading.attr="disabled" wire:model="per_page">
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
                                <div class="col-6 col-md-1  ">
                                    <select class="w-100 py-1"  wire:loading.attr="disabled" wire:model="year_id">
                                        <option value="" hidden>Year</option>
                                        @foreach ($years as $y) 
                                            <option value="{{ $y->id }}">{{ $y->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-2 ">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="class_id">
                                        <option value="" hidden>Class</option>
                                        @foreach ($class as $y) 
                                            <option value="{{ $y->id }}">{{ $y->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-2 ">
                                    <input  class=" w-100 py-1"type="search" wire:model="student_name" id="" placeholder="Student Name">
                                </div>
                                <div class="col-6 col-md-2">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="gender">
                                        <option value="" hidden>Gender</option>
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-2">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="payment">
                                        <option value="" hidden>Payemnt</option>
                                        <option value="0">Nill</option>
                                        <option value="1">Pay</option>
                                        <option value="2">Refund</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-1">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="payment_status">
                                        <option value="" hidden>Status</option>
                                        <option value="0">Not Paid</option>
                                        <option value="1">Paid</option>
                                        <option value="2">Cancel</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-1  ">
                                    <button wire:click='clear' class="  btn btn-sm btn-danger "><i
                                            class="mdi  mdi-close"></i></button>
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
                                <th>Year</th>
                                <th>Class</th>
                                <th>Student</th>
                                <th>Gender</th>
                                <th>Amount</th>
                                <th>Deposite</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $key = 1;
                                $amount=0;
                                $deposite=0;
                                $total_amount=0;
                            @endphp
                            @foreach ($payments as $p)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $p->AcademicYear->year }}</td>
                                    <td>{{ $p->Admission->Class->name }}</td>
                                    <td>{{ $p->Student->name }}</td>
                                    <td>{{ $p->Student->gender==0?"Male":"Female"; }}</td>
                                    <td>{{ $p->amount}}</td>
                                    <td>{{ $p->deposite}}</td>
                                    <td>{{ $p->total_amount}}</td>
                                    <td>{{ $p->status==0?"Not Paid": ($p->status==1?"Paid":"Cancel") }}</td>
                                    @php
                                        $amount+=$p->amount;
                                        $deposite+=$p->deposite;
                                        $total_amount+=$p->total_amount;
                                    @endphp
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total</td>
                                <td>{{ number_format($amount ,2)}}</td>
                                <td>{{ number_format($deposite,2) }}</td>
                                <td>{{ number_format($total_amount,2) }}</td>
                                <td></td>
                            </tr>

                        </tfoot>
                    </table>
                    <div class="mt-4">
                        {{ $payments->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $('#data-table-custom').DataTable({
                searching: false,
                paging: false,
                info: false,
            });
        </script>
    @endpush
   
</div>
