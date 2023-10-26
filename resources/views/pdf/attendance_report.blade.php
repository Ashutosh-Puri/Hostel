
<html>
    <head>
        <title> Attendance Report</title>
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
        <h3>Attendance Report</h3>
        <table style="width:100% ;border-collapse: collapse; font-size: 12px;" >
            <thead>
                <tr >
                    <th width="2%"></th>
                    <th width="30%"></th>
                    <th width="8%"></th>
                    <th width="30%"></th>
                    <th width="30%"></th>
                </tr>
            </thead>
            <tbody>
                <tr >
                    <td style="text-align: center; text-decoration:bold;" >No</td>
                    <td >Student</td>
                    <td>Gender</td>
                    <td >Entry Time</td> 
                    <td >Exit Time</td> 
                </tr>
                @foreach ($attendance as $key => $item) 
                    <tr>
                        <td >{{ $key+1 }}</td>
                        <td >{{ $item->Student->name }}</td>
                        <td >
                            @if ($item->Student->gender==1)
                                Female
                            @else
                                Male
                            @endif
                        </td>
                        <td >{{ date('d / m / Y - h : m : s - A',strtotime($item->entry_time))}}</td>
                        <td > 
                            @if ($item->exit_time)
                                {{ date('d / m / Y - h : m : s - A',strtotime($item->exit_time)) }} 
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>