<html>
    <head>
        <title>Room Report</title>
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
        <h3>Room Report</h3>
        <table style="width:100% ;border-collapse: collapse; font-size: 12px;" >
            <thead>
                <tr >
                    <th width="5%"></th>
                    <th width="38%"></th>
                    <th width="11%"></th>
                    <th width="12%"></th>
                    <th width="8%"></th>

                    <th width="10%"></th>
                    <th width="5%"></th>
                    <th width="6%"></th>
                    <th width="5%"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>No</td>
                    <td>College</td>
                    <td>Hostel</td>
                    <td>Building</td>
                    <td>Floor</td>
                    <td>Room</td>
                    <td>Bed</td>
                    <td>Room</td>
                    <td>Bed</td>
                </tr>
                @foreach ($beds as $key => $item)
                    <tr>
                        <td> {{ $key+1 }} </td>
                        <td> {{ $item->Room->Floor->building->Hostel->College->name }} </td>
                        <td> {{ $item->Room->Floor->building->Hostel->name }} </td>                                  
                        <td> {{ $item->Room->Floor->building->name }} </td>
                        <td> @switch ($item->Room->Floor->floor)  @case(0) Ground @break @case(1) First @break @case(2) Second  @break @case(3) Third @break @case(4) Fourth @break  @case(5) Fifth @break @case(6) Sixth @break  @case(7) Seventh @break @case(8) Eighth @break @case(9) Nineth @break @case(10) Tenth @break @default {{ $item->Room->Floor->floor }} @endswitch</td>
                        <td> {{ $item->Room->id }}-({{ $item->Room->label }})</td>
                        <td> {{ $item->id }} </td>
                        <td> @if ($item->Room->status==0) Free  @else Full @endif </td>
                        <td> @if ($item->status ==0) Free @else Full @endif </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
