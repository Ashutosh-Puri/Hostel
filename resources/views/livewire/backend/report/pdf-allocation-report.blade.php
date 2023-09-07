
<!DOCTYPE html>
<html>
<body style=" margin: 20px;">
    <div style="text-align: center;">
        <table style="width:100% ;background-color:blue;  border-collapse: collapse; font-size: 12px;" >
            <thead>
                <tr>
                    <th style="padding: 3px; text-align:center; vertical-align: center;">No</th>
                    <th style="padding: 3px; text-align:center; vertical-align: center;">Year</th>
                    <th style="padding: 3px; text-align:center; vertical-align: center;">Class</th>
                    <th style="padding: 3px; text-align:center; vertical-align: center;">Student Name</th>
                    @if ($bed_status==null)
                        <th style="padding: 3px; text-align:center; vertical-align: center;">Hostel</th>
                        <th style="padding: 3px; text-align:center; vertical-align: center;">Building</th>
                        <th style="padding: 3px; text-align:center; vertical-align: center;">Floor</th>
                        <th style="padding: 3px; text-align:center; vertical-align: center;">Room</th>
                        <th style="padding: 3px; text-align:center; vertical-align: center;">Bed</th>  
                    @elseif ($bed_status==1)
                        <th style="padding: 3px; text-align:center; vertical-align: center;">Hostel</th>
                        <th style="padding: 3px; text-align:center; vertical-align: center;">Building</th>
                        <th style="padding: 3px; text-align:center; vertical-align: center;">Floor</th>
                        <th style="padding: 3px; text-align:center; vertical-align: center;">Room</th>
                        <th style="padding: 3px; text-align:center; vertical-align: center;">Bed</th>  
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($admission as $key => $item)
                    <tr>
                        <td style="padding: 3px; text-align:center; vertical-align: center;">{{ $key+1 }}</td>
                        <td style="padding: 3px; text-align:center; vertical-align: center;">{{ $item->AcademicYear->year }}</td>
                        <td style="padding: 3px; text-align:center; vertical-align: center;">{{ $item->Class->name }}</td>                                  
                        <td style="padding: 3px; text-align:center; vertical-align: center;">{{ $item->Student->name}}</td>
                        @if ($item->allocations->isEmpty())
                            @if ($bed_status==null)
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                            @elseif ($bed_status==1)
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @endif
                        @else
                            @foreach ($item->allocations as $aIndex => $a)
                                @if ($aIndex === 0)
                                    <td style="padding: 3px; text-align:center; vertical-align: center;">
                                        {{ $a->Bed->Room->Floor->Building->Hostel->name }}
                                    </td>
                                @endif
                                @if ($aIndex === 0)
                                    <td style="padding: 3px; text-align:center; vertical-align: center;">
                                        {{ $a->Bed->Room->Floor->Building->name }}
                                    </td>
                                @endif
                                @if ($aIndex === 0)
                                    <td style="padding: 3px; text-align:center; vertical-align: center;">
                                        {{ in_array( $a->Bed->Room->Floor->floor, range(0, 10)) ? ['Ground', 'First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth'][ $a->Bed->Room->Floor->floor] :  $a->Bed->Room->Floor->floor }}
                                    </td>
                                @endif
                                @if ($aIndex === 0)
                                    <td style="padding: 3px; text-align:center; vertical-align: center;">
                                        {{ $a->Bed->Room->id }}-({{ $a->Bed->Room->label }})
                                    </td>
                                @endif
                                @if ($aIndex === 0)
                                    <td style="padding: 3px; text-align:center; vertical-align: center;">
                                        {{ $a->Bed->id }}
                                    </td>
                                @endif
                            @endforeach 
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>