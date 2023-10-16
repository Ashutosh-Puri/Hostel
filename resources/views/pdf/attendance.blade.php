
<html>
    <head>
        <title>Attendance</title>
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
        <h3>Attendance</h3>
        <table style="width:100% ;border-collapse: collapse; font-size: 12px;" >
            <thead>
                <tr >
                    <th width="5%"></th>
                    <th width="5%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tbody>
                <tr >
                    <td style="text-align: center; text-decoration:bold;" colspan="1">No</td>
                    <td colspan="4">Student Name</td>
                    <td colspan="2">RFID</td>
                    <td colspan="2">Date</td>
                    <td colspan="2">Time</td>
                </tr>
                @foreach ($attendance as $key => $item) 
                    <tr>
                        <td colspan="1">{{ $key+1 }}</td>
                        <td colspan="4">{{ $item->student->name }}</td>
                        <td colspan="2">{{ $item->rfid }}</td>
                        <td colspan="2">{{ date('d / m / Y', strtotime($item->entry_time)) }}</td>
                        <td colspan="2">{{ date('h:m:s - a', strtotime($item->entry_time)) }}</td>
                    </tr>
                @endforeach
             
            </tbody>
        </table>
    </div>
</body>
</html>