<div class="content">
    <div class="container-fluid">
        <div>
            @section('title')
                Razorpay Payments
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Data Payments</h2>
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
                        <div class="card-body table-responsive">
                            <table id="data-table" class="table  dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Payment ID</th>
                                        <th>Order ID</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments->items as  $item)
                                        <tr>
                               
                                            <td>{{  $item->id }}</td>
                                            <td>{{  $item->order_id }}</td>
                                            <td>{{  $item->amount}}</td>
                                            <td>{{  $item->method}}</td>
                                            <td>{{  $item->email}}</td>
                                            <td>{{  $item->contact}}</td>
                                            <td>{{ date("Y / m / d h:i:s A", $item->created_at); }}</td>
                                            <td>{{  $item->status }}</td>
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
