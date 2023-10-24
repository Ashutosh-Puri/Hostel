<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Bed
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Add Bed</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading.attr="disabled"  wire:click="setmode('all')"class="btn btn-success ">
                                Back<span class="btn-label-right mx-2"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  wire:submit.prevent="save" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="hostel_id" class="form-label">Select Hostel</label>
                                            <select class="form-select @error('hostel_id') is-invalid @enderror" id="hostel_id" wire:model="hostel_id" >
                                                <option hidden >Select Hostel</option>
                                                @foreach ($hostels as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('hostel_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="building_id" class="form-label">Select Building</label>
                                            <select class="form-select @error('building_id') is-invalid @enderror" id="building_id" wire:model="building_id" >
                                                <option hidden >Select Building</option>
                                                @foreach ($buildings as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('building_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="floor_id" class="form-label">Select Floor</label>
                                            <select class="form-select @error('floor_id') is-invalid @enderror" id="floor_id" wire:model="floor_id" >
                                                <option hidden >Select Floor</option>
                                                @foreach ($floors as $item1)
                                                    <option  value="{{ $item1->id }}">
                                                        @switch($item1->floor)  @case(0) Ground @break @case(1) First @break @case(2) Second  @break @case(3) Third @break @case(4) Fourth @break  @case(5) Fifth @break @case(6) Sixth @break  @case(7) Seventh @break @case(8) Eighth @break @case(9) Nineth @break @case(10) Tenth @break @default {{ $item->floor }} @endswitch Floor
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('floor_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="seated_id" class="form-label">Select Seated</label>
                                            <select class="form-select @error('seated_id') is-invalid @enderror" id="seated_id" wire:model="seated_id" >
                                                <option hidden >Select Seated</option>
                                                @foreach ($seateds as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->seated}} Seated </option>
                                                @endforeach
                                            </select>
                                            @error('seated_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="room_id" class="form-label">Select Room</label>
                                            <select class="form-select @error('room_id') is-invalid @enderror" id="room_id" wire:model="room_id" >
                                                <option hidden >Select Room</option>
                                                @foreach ($rooms as $item1)
                                                    <option  value="{{ $item1->id }}">Room ID : {{ $item1->id }} - ( {{ $item1->label }} ) </option>
                                                @endforeach
                                            </select>
                                            @error('room_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group ">
                                            <label for="status" class="form-label mb-3">Status</label><br>
                                            <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ old('status')==true?'checked':''; }} id="class_status"  wire:model="status" >
                                            <label class="form-check-label m-1" for="class_status">Un-Availabel Bed</label>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"  class="btn btn-primary ">Save Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=='edit')
            @section('title')
                Edit Bed
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Bed</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading.attr="disabled"  wire:click="setmode('all')"class="btn btn-success ">
                                Back<span class="btn-label-right mx-2"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  wire:submit.prevent="update({{ isset($c_id)?$c_id:''; }})" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="hostel_id" class="form-label">Select Hostel</label>
                                            <select class="form-select @error('hostel_id') is-invalid @enderror" id="hostel_id" wire:model="hostel_id" >
                                                <option hidden >Select Hostel</option>
                                                @foreach ($hostels as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('hostel_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="building_id" class="form-label">Select Building</label>
                                            <select class="form-select @error('building_id') is-invalid @enderror" id="building_id" wire:model="building_id" >
                                                <option hidden >Select Building</option>
                                                @foreach ($buildings as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('building_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="floor_id" class="form-label">Select Floor</label>
                                            <select class="form-select @error('floor_id') is-invalid @enderror" id="floor_id" wire:model="floor_id" >
                                                <option hidden >Select Floor</option>
                                                @foreach ($floors as $item1)
                                                    <option  value="{{ $item1->id }}">
                                                        @switch($item1->floor)  @case(0) Ground @break @case(1) First @break @case(2) Second  @break @case(3) Third @break @case(4) Fourth @break  @case(5) Fifth @break @case(6) Sixth @break  @case(7) Seventh @break @case(8) Eighth @break @case(9) Nineth @break @case(10) Tenth @break @default {{ $item->floor }} @endswitch Floor
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('floor_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="seated_id" class="form-label">Select Seated</label>
                                            <select class="form-select @error('seated_id') is-invalid @enderror" id="seated_id" wire:model="seated_id" >
                                                <option hidden >Select Seated</option>
                                                @foreach ($seateds as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->seated}} Seated </option>
                                                @endforeach
                                            </select>
                                            @error('seated_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="room_id" class="form-label">Select Room</label>
                                            <select class="form-select @error('room_id') is-invalid @enderror" id="room_id" wire:model="room_id" >
                                                <option hidden >Select Room</option>
                                                @foreach ($rooms as $item1)
                                                    <option  value="{{ $item1->id }}">Room ID : {{ $item1->id }} - ( {{ $item1->label }} ) </option>
                                                @endforeach
                                            </select>
                                            @error('room_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group ">
                                            <label for="status" class="form-label mb-3">Status</label><br>
                                            <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ old('status')==true?'checked':''; }} id="class_status"  wire:model="status" >
                                            <label class="form-check-label m-1" for="class_status">Un-Availabel Bed</label>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"  class="btn btn-primary ">Update Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode="all")
            <div>
                @section('title')
                    All Bedes
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Data Beds</h2>
                                <div wire:loading wire:target="per_page" class="loading-overlay">
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
                                @can('Add Bed')
                                    <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success ">
                                        Add Bed<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
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
                                    <select class=" col-4 col-md-1" wire:loading.attr="disabled" wire:model="per_page">
                                        <option value="10">10</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                    </select>
                                    <label class=" col-4 col-md-1  py-1  ">Records</label>
                                    <span class="col-12 col-md-9 p-0">
                                        <span class="row">
                                            <div class="col-12 col-md-6 ">
                                            </div>
                                            <div class="col-12 col-md-3 ">
                                                    <label class="w-100 p-1  text-md-end">Search</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input class="w-100" wire:model.debounce.1000ms="search" type="search" placeholder="Room Label">
                                            </div>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="data-table" class="table  dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Hostel</th>
                                            <th>Building</th>
                                            <th>Floor</th>
                                            <th>Room</th>
                                            <th>Seated</th>
                                            <th>Bed</th>
                                            <th>Status</th>
                                            @can('Edit Bed')
                                                <th>Action</th>
                                            @elsecan('Delete Bed')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($beds as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->Room->Floor->Building->Hostel->name }}</td>
                                                <td>{{ $item->Room->Floor->Building->name }}</td>
                                                <td>
                                                    @switch( $item->Room->Floor->floor)
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
                                                        {{ $item->floor }}
                                                    @endswitch
                                                     Floor
                                                </td>
                                                <td>{{ $item->Room->id  }} - ( {{ $item->Room->label }} )</td>
                                                <td>{{ $item->Room->Seated->seated." Seated";  }}</td>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    @if ( $item->status == '0')
                                                        <span class="badge bg-success text-white">Availabel</span>
                                                    @else
                                                        <span class="badge bg-danger text-white">Un-Availabel</span>
                                                    @endif
                                                </td>
                                                @can('Edit Bed')
                                                <td>
                                                    @can('Edit Bed')
                                                        <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                        @if ($item->status==1)
                                                            <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-thumb-up"></i> </a>
                                                        @else
                                                            <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-danger "> <i class="mdi mdi-thumb-down"></i> </a>
                                                        @endif
                                                    @endcan
                                                    @can('Delete Bed')
                                                        @if ($item->deleted_at)
                                                            <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                            <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                        @else
                                                            <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                        @endif
                                                    @endcan
                                                </td>
                                                @elsecan('Delete Bed')
                                                <td>
                                                    @can('Edit Bed')
                                                        <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                        @if ($item->status==1)
                                                            <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-thumb-up"></i> </a>
                                                        @else
                                                            <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-danger "> <i class="mdi mdi-thumb-down"></i> </a>
                                                        @endif
                                                    @endcan
                                                    @can('Delete Bed')
                                                        @if ($item->deleted_at)
                                                            <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                            <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                        @else
                                                            <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                        @endif
                                                    @endcan
                                                </td>
                                                @endcan
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
            </div>
        @endif
    </div>
</div>

