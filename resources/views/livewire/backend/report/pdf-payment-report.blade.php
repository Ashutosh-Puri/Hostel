<div>
    <table border="1" cellspacing="0" cellpadding="0" width="200" align="center" valign="center">
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>