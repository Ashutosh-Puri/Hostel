<html>
    <head>
        <title>Payment Report</title>
        <style>
            table
            {
                border: none;
            }
            td{
                border: 1px solid balck;
                padding: 4px;
            }
        </style>
    </head>
<body >
    <div style="text-align: center;">
        <h3>Payment Report</h3>
        <table style="width:100% ;border-collapse: collapse; font-size: 12px;" >
            <thead>
                <tr >
                    <th width="5%"></th>
                    <th width="6%"></th>
                    <th width="15%"></th>
                    <th width="26%"></th>
                    <th width="8%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>No</td>
                    <td>Year</td>
                    <td>Class</td>
                    <td>Student</td>
                    <td>Gender</td>
                    <td>Amount</td>
                    <td>Deposite</td>
                    <td>Total Amount</td>
                    <td>Status</td>
                </tr>
                @foreach ($payment as $key => $p)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $p->AcademicYear->year }}</td>
                        <td>{{ $p->Admission->Class->name }}</td>
                        <td>{{ $p->Student->name }}</td>
                        <td>{{ $p->Student->gender==0?"Male":"Female"; }}</td>
                        <td>{{ $p->amount}}</td>
                        <td>{{ $p->deposite}}</td>
                        <td>{{ $p->total_amount}}</td>
                        <td>
                            @if ($p->status==0)
                                Not Paid
                            @elseif ($p->status==1)
                                Paid
                            @else
                                Cancel
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
