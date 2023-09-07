<html>
<body >
    <div style="text-align: center;">
        <table style="width:100% ; border: 1px solid; border-collapse: collapse; font-size: 12px;" >
            <thead>
                <tr>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">No</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Year</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Class</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Student Name</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Email</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Mobile</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Parent Mobile</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Student Status</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Admission Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admission as $key => $item)
                    <tr>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $key+1 }} </td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $item->AcademicYear->year }} </td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $item->Class->name }} </td>                                  
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $item->Student->name }} </td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $item->Student->email }} </td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $item->Student->mobile }} </td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $item->Student->parent_mobile }} </td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> @if ($item->Student->status ==0) Active  @else In Active @endif </td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> @if ($item->status ==0) Waiting  @elseif($item->status ==1) Confirmed @else Canceled @endif </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>