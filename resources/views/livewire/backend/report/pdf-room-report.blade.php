
<div>
    <table border="1" cellspacing="0" cellpadding="0" width="200" align="center" valign="center" >
        <thead>
            <tr>
                <th>No</th>
                <th>College</th>
                <th>Hostel</th>
                <th>Building</th>
                <th>Floor</th>
                <th>Room</th>
                <th>Bed</th>
                <th>Room Status</th>
                <th>Bed Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $key = 1;
            @endphp
            @foreach ($beds as $b)
                <tr>
                    <td>{{ $key++ }}</td>
                    <td>{{ $b->Room->Floor->building->Hostel->College->name }}</td>
                    <td>{{ $b->Room->Floor->building->Hostel->name }}</td>
                    <td>{{ $b->Room->Floor->building->name }}</td>
                    <td>@switch($b->Room->Floor->floor)  @case(0) Ground @break @case(1) First @break @case(2) Second  @break @case(3) Third @break @case(4) Fourth @break  @case(5) Fifth @break @case(6) Sixth @break  @case(7) Seventh @break @case(8) Eighth @break @case(9) Nineth @break @case(10) Tenth @break @default {{ $b->Room->Floor->floor }} @endswitch</td>
                    <td>{{ $b->Room->id }}-({{ $b->Room->label }})</td>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->Room->status==0?"Free":"Full"; }}</td>
                    <td>{{ $b->status==0?"Free":"Full"; }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>