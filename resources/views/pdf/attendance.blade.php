
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
                    <td colspan="1">No</td>
                    <td colspan="3">Student Name</td>
                    <td colspan="1">RFID</td>
                    <td colspan="3">Entry Time</td>
                    <td colspan="3">Exit Time</td>
                </tr>
                @foreach ($attendance as $key => $item) 
                    <tr>
                        <td colspan="1">{{ $key+1 }}</td>
                        <td colspan="3">{{ $item->student->name }}</td>
                        <td colspan="1">{{ $item->rfid }}</td>
                        <td colspan="3"> 
                            @if ($item->entry_time)
                                {{ date('d-m-Y h:i:s A', strtotime($item->entry_time)) }}
                            @endif
                        </td>
                        <td colspan="3">
                            @if ($item->exit_time)
                                {{ date('d-m-Y h:i:s A', strtotime($item->exit_time)) }}
                            @endif
                        </td>
                    </tr>
                @endforeach
             
            </tbody>
        </table>
    </div>
</body>
</html>