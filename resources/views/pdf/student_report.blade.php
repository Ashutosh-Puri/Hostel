<html>
    <head>
        <title>Student Report</title>
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
        <h3>Student Admission Report</h3>
        <table style="width:100% ;border-collapse: collapse; font-size: 12px;" >
            <thead>
                <tr >
                    <th width="5%"></th>
                    <th width="6%"></th>
                    <th width="11%"></th>
                    <th width="20%"></th>
                    <th width="25%"></th>
                    <th width="11%"></th>
                    <th width="11%"></th>
                    <th width="11%"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center; text-decoration:bold;" >No</td>
                    <td>Year</td>
                    <td>Class</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Mobile</td>
                    <td>Parent Mobile</td>
                    <td>S , A Status</td>
                </tr>
                @foreach ($admission as $key => $item)
                <tr>
                    <td> {{ $key+1 }} </td>
                    <td> {{ $item->AcademicYear->year }} </td>
                    <td> {{ $item->Class->name }} </td>                                  
                    <td> {{ $item->Student->name }} </td>
                    <td> {{ $item->Student->email }} </td>
                    <td> {{ $item->Student->mobile }} </td>
                    <td> {{ $item->Student->parent_mobile }} </td>
                    <td> @if ($item->Student->status ==0) A  @else I @endif - @if ($item->status ==0) W @elseif($item->status ==1) C @else CL @endif</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8"> <small>Note:( S , A : Student Admission ) A-Active , I-Inactive , C-Confirmed , W-Wating , CL-Canceled</small></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
