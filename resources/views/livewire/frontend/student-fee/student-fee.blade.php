<div class="content">
    <div class="container-fluid">
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
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student_payments as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->Admission->id }}</td>
                                    <td>{{ $item->AcademicYear->year}}</td>
                                    <td>{{ $item->Student->name!=null? $item->Student->name: $item->Student->username;
                                        }}</td>
                                    <td>{{ $item->amount }} Rs.</td>
                                    <td>{{ $item->deposite }} Rs.</td>
                                    <td>
                                        @if ( $item->total_amount>0)
                                        <span class="badge p-2 bg-success text-white">{{ $item->total_amount }}
                                            Rs.</span>
                                        @elseif ( $item->total_amount<0) <span class="badge p-2 bg-danger text-white">{{
                                            $item->total_amount }} Rs.</span>
                                            @else
                                            <span class="badge p-2 bg-primary text-white">{{ $item->total_amount }}
                                                Rs.</span>
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
                                    <td>
                                        @if ($item->status==0)
                                            @if ($item->total_amount >0)
                                                <a class="btn btn-sm btn-success" data-turbolinks="false" href="{{ route('student_pay_fee',$item->id) }}">Pay</a>
                                            @endif
                                        @endif
                                        @if ($item->status==2)
                                            @if ($item->total_amount >=0)
                                                @if (isset($item->transaction->status))
                                                    @if ($item->transaction->status==2)
                                                        <a class="btn  btn-sm btn-primary" data-turbolinks="false" href="{{ route('student_refund_fee',$item->id) }}">Refund</a>
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                        @if ($item->status == 1)
                                            <a target="_blank" class="btn btn-warning "  href="{{ route('student.view_fee_recipet', $item->id) }}"> <i   class="mdi mdi-eye"></i></a>
                                            <a target="_blank" class="btn btn-warning "  href="{{ route('student.download_fee_recipet', $item->id) }}"> <i class="mdi mdi-download"></i></a> 
                                        @endif
                                    </td>

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
</div>