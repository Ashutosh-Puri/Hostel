
<html>
<body >
    <div style="text-align: center;">
        <table style="width:100% ; border: 1px solid; border-collapse: collapse; font-size: 12px;" >
            <thead>
                <tr>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">No</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">College</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Hostel</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Building</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Floor</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Room</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Bed</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Room Status</th>
                    <th style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;">Bed Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beds as $key => $item)
                    <tr>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $key+1 }} </td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $item->Room->Floor->building->Hostel->College->name }} </td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $item->Room->Floor->building->Hostel->name }} </td>                                  
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $item->Room->Floor->building->name }} </td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> @switch ($item->Room->Floor->floor)  @case(0) Ground @break @case(1) First @break @case(2) Second  @break @case(3) Third @break @case(4) Fourth @break  @case(5) Fifth @break @case(6) Sixth @break  @case(7) Seventh @break @case(8) Eighth @break @case(9) Nineth @break @case(10) Tenth @break @default {{ $item->Room->Floor->floor }} @endswitch</td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $item->Room->id }}-({{ $item->Room->label }})</td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> {{ $item->id }} </td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> @if ($item->Room->status==0) Free  @else Full @endif </td>
                        <td style="border: 1px solid; padding: 1px; text-align:center; vertical-align: center;"> @if ($item->status ==0) Free @else Full @endif </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>