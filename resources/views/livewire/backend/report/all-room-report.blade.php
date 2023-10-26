<div>
    @section('title')
        Room Report
    @endsection
    <div class="row">
        <div class="col-12">
            <div class="bg-success">
                <div class="float-start pt-2 px-2">
                    <h2>Data Rooms Report</h2>
                    <div wire:loading class="loading-overlay">
                        <div class="loading-spinner">
                            <div class="spinner-border spinner-border-lg text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-end">
                    <a wire:loading class="btn btn-primary btn-sm " style="padding:10px; ">
                        <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                        <span class="visually-hidden">Loading...</span>
                    </a>
                    @can('View Room Report')
                        <a target="_blank"  class="btn btn-warning " href="{{ route('admin_view_room_report',['array' => json_encode($bedArray['id'])]) }}"> <i class="mdi mdi-eye"></i></a>
                    @endcan
                    @can('Download Room Report')
                        <a target="_blank"  class="btn btn-warning " href="{{ route('admin_download_room_report',['array' => json_encode($bedArray['id'])]) }}"> <i class="mdi mdi-download"></i></a>
                        <a wire:loading.attr="disabled" wire:loading.remove wire:click="generateEXCEL()"
                            class="btn btn-success ">
                            EXCEL<span class="btn-label-right"><i class=" mdi mdi-arrow-down-bold fw-bold"></i></span>
                        </a>
                        <a wire:loading wire:target="generateEXCEL" class="btn btn-success ">
                            Processing..<span class="btn-label-right"><i
                                    class=" mdi mdi-arrow-down-bold fw-bold"></i></span>
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <label class=" col-4 col-md-1 py-1 ">Per Page</label>
                        <select class=" col-8 col-md-1" wire:loading.attr="disabled" wire:model="per_page">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="500">500</option>
                            <option value="1000">1000</option>
                        </select>
                        <span class="col-12 col-md-10 p-0">
                            <div class="row ">
                                <div class="col-6 col-md-1 ">
                                </div>
                                <div class="col-6 col-md-2 ">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="college_id">
                                        <option value="" hidden>College</option>
                                        @foreach ($colleges as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-2 ">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="hostel_id">
                                        <option value="" hidden>Hostel</option>
                                        @foreach ($hostels as $h)
                                            <option value="{{ $h->id }}">{{ $h->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-2 ">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="building_id">
                                        <option value="" hidden>Building</option>
                                        @foreach ($buildings as $b)
                                            <option value="{{ $b->id }}">{{ $b->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-1 ">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="floor_id">
                                        <option value="" hidden>Floor</option>
                                        @foreach ($floors as $f)
                                            <option value="{{ $f->id }}">
                                                @switch($f->floor) @case(0) Ground @break @case(1)  First @break @case(2)  Second  @break @case(3)  Third @break @case(4)  Fourth  @break @case(5)  Fifth  @break @case(6) Sixth @break @case(7)  Seventh  @break @case(8)  Eighth @break @case(9)  Nineth  @break  @case(10) Tenth @break @default  {{ $f->floor }}  @endswitch
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-1 ">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="room_id">
                                        <option value="" hidden>Room</option>
                                        @foreach ($rooms as $r)
                                            <option value="{{ $r->id }}">{{ $r->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-1">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="room_status">
                                        <option value="" hidden>Room Status</option>
                                        <option value="1">Full</option>
                                        <option value="0">Free</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-1">
                                    <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="bed_status">
                                        <option value="" hidden>Bed Status</option>
                                        <option value="1">Full</option>
                                        <option value="0">Free</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-1  ">
                                    <button wire:click='clear' class="  btn btn-sm btn-danger "><i
                                            class="mdi  mdi-close"></i></button>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="data-table-custom" class="table  dt-responsive nowrap w-100">
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
                                    <td class="text-wrap lh-lg">{{ $b->Room->Floor->building->Hostel->College->name }}</td>
                                    <td>{{ $b->Room->Floor->building->Hostel->name }}</td>
                                    <td>{{ $b->Room->Floor->building->name }}</td>
                                    <td>
                                        @switch($b->Room->Floor->floor)
                                            @case(0)
                                                Ground
                                            @break

                                            @case(1)
                                                First
                                            @break

                                            @case(2)
                                                Second
                                            @break

                                            @case(3)
                                                Third
                                            @break

                                            @case(4)
                                                Fourth
                                            @break

                                            @case(5)
                                                Fifth
                                            @break

                                            @case(6)
                                                Sixth
                                            @break

                                            @case(7)
                                                Seventh
                                            @break

                                            @case(8)
                                                Eighth
                                            @break

                                            @case(9)
                                                Nineth
                                            @break

                                            @case(10)
                                                Tenth
                                            @break

                                            @default
                                                {{ $b->Room->Floor->floor }}
                                        @endswitch
                                    </td>
                                    <td>{{ $b->Room->id }}-({{ $b->Room->label }})</td>
                                    <td>{{ $b->id }}</td>
                                    <td>{{ $b->Room->status == 0 ? 'Free' : 'Full' }}</td>
                                    <td>{{ $b->status == 0 ? 'Free' : 'Full' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $beds->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $('#data-table-custom').DataTable({
                searching: false,
                paging: false,
                info: false,
            });
        </script>
    @endpush



</div>
