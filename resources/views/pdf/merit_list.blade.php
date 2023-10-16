
<html>
    <head>
        <title> Merit List</title>
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
        <h3>Merit List</h3>
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
                    <td colspan="3">Student Name</td>
                    <td colspan="2">Mobile</td>
                    <td colspan="3">Class Name</td>
                    <td colspan="1">Percentage</td>
                    <td colspan="1">Gender</td> 
                </tr>
                @foreach ($meritlist as $key => $item) 
                    <tr>
                        <td colspan="1">{{ $key+1 }}</td>
                        <td colspan="3">{{ $item->name }}</td>
                        <td colspan="2">{{ $item->mobile }}</td>
                        <td colspan="3">{{ $item->class }}</td>
                        <td colspan="1">{{ $item->percentage }} %</td>
                        <td colspan="1">{{ $item->gender==0?"Male":"Female"; }}</td> 
                    </tr>
                @endforeach
             
            </tbody>
        </table>
    </div>
</body>
</html>