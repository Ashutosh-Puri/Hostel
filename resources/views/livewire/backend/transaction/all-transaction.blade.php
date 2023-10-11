<div class="content">
    <div class="container-fluid">
        <div>
            @section('title')
                All Transaction
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Data Transactions</h2>
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
                                <span class="col-12 col-md-10 px-1">
                                    <span class="row">
                                        <div class="col-12 col-md-3">
                                            <input class="w-100 py-1" wire:model.debounce.500ms="student_name" type="search" placeholder="Student Name">
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <input class="w-100 py-1" wire:model.debounce.500ms="payment_id" type="search" placeholder="Payment ID">
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <input class="w-100  py-1" wire:model.debounce.500ms="refund_id" type="search" placeholder="Refund ID">
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <input class="w-100  py-1" wire:model.debounce.500ms="order_id" type="search" placeholder="Order ID">
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <select class="py-1"  wire:model="status">
                                               
                                                <option value="0">Created</option>
                                                <option value="1">Authorized</option>
                                                <option value="2">Captured</option>
                                                <option value="3">Refunded</option>
                                                <option value="4">Failed</option>
                                                <option value="null">All</option>
                                            </select>
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
                                        <th>Student</th>
                                        <th>Fee</th>
                                        <th>Fine</th>
                                        <th>Payment ID</th>
                                        <th>Refund ID</th>
                                        <th>Order ID</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        {{-- <th>Signature</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->student->name }}</td>
                                            <td>{{ $item->student_payment_id }}</td>
                                            <td>{{ $item->student_fine_id }}</td>
                                            <td>{{ $item->razorpay_payment_id }}</td>
                                            <td>{{ $item->razorpay_refund_id }}</td>
                                            <td>{{ $item->order_id }}</td>
                                            <td>{{ $item->amount}}</td>
                                            <td>
                                                @if ($item->status ==0)
                                                <span class="badge bg-warning text-white">Created</span>
                                                @elseif ($item->status ==1)
                                                <span class="badge bg-info text-white">Authorized</span>
                                                @elseif ($item->status ==2)
                                                <span class="badge bg-success text-white">Captured</span>
                                                @elseif ($item->status ==3)
                                                <span class="badge bg-primary text-white">Refunded</span>
                                                @elseif ($item->status ==4)
                                                <span class="badge bg-danger text-white">Failed</span>
                                                @endif
                                            </td>
                                            {{-- <td>{{ $item->razorpay_signature }}</td> --}}
                                        </tr>
                                    @endforeach   
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $transactions->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
