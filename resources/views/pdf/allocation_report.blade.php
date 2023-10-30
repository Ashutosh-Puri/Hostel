{{-- 
    
<!DOCTYPE html>
<html>
<body style=" margin: 20px;">
    <div style="text-align: center;">
        <table style="width:100% ;background-color:blue;  border-collapse: collapse; font-size: 12px;" >
            <thead>
                <tr>
                    <td>No</td>
                    <td>Year</td>
                    <td>Class</td>
                    <td>Student Name</td>
                    @if ($bed_status==null)
                        <td>Hostel</td>
                        <td>Building</td>
                        <td>Floor</td>
                        <td>Room</td>
                        <td>Bed</td>  
                    @elseif ($bed_status==1)
                        <td>Hostel</td>
                        <td>Building</td>
                        <td>Floor</td>
                        <td>Room</td>
                        <td>Bed</td>  
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($admission as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->AcademicYear->year }}</td>
                        <td>{{ $item->Class->name }}</td>                                  
                        <td>{{ $item->Student->name}}</td>
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
                                    <td>
                                        {{ $a->Bed->Room->Floor->Building->Hostel->name }}
                                    </td>
                                @endif
                                @if ($aIndex === 0)
                                    <td>
                                        {{ $a->Bed->Room->Floor->Building->name }}
                                    </td>
                                @endif
                                @if ($aIndex === 0)
                                    <td>
                                        {{ in_array( $a->Bed->Room->Floor->floor, range(0, 10)) ? ['Ground', 'First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth'][ $a->Bed->Room->Floor->floor] :  $a->Bed->Room->Floor->floor }}
                                    </td>
                                @endif
                                @if ($aIndex === 0)
                                    <td>
                                        {{ $a->Bed->Room->id }}-({{ $a->Bed->Room->label }})
                                    </td>
                                @endif
                                @if ($aIndex === 0)
                                    <td>
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
</html> --}}
<html>
    <head>
        <title>Allocation Report</title>
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
        <h3>Allocation Report</h3>
        <table style="width:100% ;border-collapse: collapse; font-size: 12px;" >
            <thead>
                <tr >
                    <th width="5%"></th>
                    <th width="6%"></th>
                    <th width="15%"></th>
                    <th width="19%"></th>
                    @if ($bed_status==null)
                        <th width="10%"></th>
                        <th width="15%"></th>
                        <th width="10%"></th>
                        <th width="15%"></th>
                        <th width="5%"></th>
                    @elseif ($bed_status==1)
                        <th width="10%"></th>
                        <th width="15%"></th>
                        <th width="10%"></th>
                        <th width="15%"></th>
                        <th width="5%"></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>No</td>
                    <td>Year</td>
                    <td>Class</td>
                    <td>Student Name</td>
                    @if ($bed_status==null)
                        <td>Hostel</td>
                        <td>Building</td>
                        <td>Floor</td>
                        <td>Room</td>
                        <td>Bed</td>  
                    @elseif ($bed_status==1)
                        <td>Hostel</td>
                        <td>Building</td>
                        <td>Floor</td>
                        <td>Room</td>
                        <td>Bed</td>  
                    @endif
                </tr>
                @foreach ($admission as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->AcademicYear->year }}</td>
                        <td>{{ $item->Class->name }}</td>                                  
                        <td>{{ $item->Student->name}}</td>
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
                                @if ($a->bed_id)
                                    @if ($aIndex === 0)
                                        <td>
                                            {{ $a->Bed->Room->Floor->Building->Hostel->name }}
                                        </td>
                                    @endif
                                    @if ($aIndex === 0)
                                        <td>
                                            {{ $a->Bed->Room->Floor->Building->name }}
                                        </td>
                                    @endif
                                    @if ($aIndex === 0)
                                        <td>
                                            {{ in_array( $a->Bed->Room->Floor->floor, range(0, 10)) ? ['Ground', 'First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth'][ $a->Bed->Room->Floor->floor] :  $a->Bed->Room->Floor->floor }}
                                        </td>
                                    @endif
                                    @if ($aIndex === 0)
                                        <td>
                                            {{ $a->Bed->Room->id }}-({{ $a->Bed->Room->label }})
                                        </td>
                                    @endif
                                    @if ($aIndex === 0)
                                        <td>
                                            {{ $a->Bed->id }}
                                        </td>
                                    @endif
                                @else
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
