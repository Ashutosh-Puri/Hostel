
<div >
    <table border="1" cellspacing="0" cellpadding="0" width="200" align="center" valign="center">
        <thead>
            <tr>
                <th>No</th>
                <th>Year</th>
                <th>Class</th>
                <th>Student Name</th>
                <th>Mobile</th>
                <th>Parent Mobile</th>
                <th>Status</th>
                @if ($bed_status==null)
                    <th>Hostel</th>
                    <th>Building</th>
                    <th>Floor</th>
                    <th>Room</th>
                    <th>Bed</th>  
                @elseif ($bed_status==1)
                    <th>Hostel</th>
                    <th>Building</th>
                    <th>Floor</th>
                    <th>Room</th>
                    <th>Bed</th>  
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
                    <td>{{ $item->Student->mobile}}</td>
                    <td>{{ $item->Student->parent_mobile}}</td>
                    <td>
                        @if ( $item->Student->status == '0')
                            A
                        @else
                            I
                        @endif
                    </td>
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