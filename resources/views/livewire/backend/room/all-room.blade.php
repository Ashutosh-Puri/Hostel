<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Room
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Add Room</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading.attr="disabled"  wire:click="setmode('all')"class="btn btn-success waves-effect waves-light">
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
                                <div class="mb-3 form-group">
                                    <label for="building_id" class="form-label">Select Building</label>
                                    <select class="form-select @error('building_id') is-invalid @enderror" id="building_id" wire:model="building_id" >
                                        <option hidden >Select Building</option>
                                        @foreach ($buildings as $item1)
                                            <option  value="{{ $item1->id }}">{{ $item1->Hostel->name }}   ->   {{ $item1->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('building_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="floor" class="form-label">Select Floor Number</label>
                                    <input type="number" list="floorlist" class="form-control @error('floor') is-invalid @enderror" wire:model="floor" value="{{ old('floor') }}" id="floor" placeholder="Select Floor Number">
                                    <datalist  name="floorlist" id="floorlist">
                                        <option value="0">Ground Floor</option>
                                        <option value="1">First Floor</option>
                                        <option value="2">Second Floor</option>
                                        <option value="3">Third Floor</option>
                                    </datalist>
                                    @error('floor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="label" class="form-label">Room Label</label>
                                    <input type="text" class="form-control @error('label') is-invalid @enderror" wire:model="label" value="{{ old('label') }}" id="label" placeholder="Enter Room Label">
                                    @error('label')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="type" class="form-label">Select Room Seated</label>
                                    <input type="number"  list="typelist" class="form-control @error('type') is-invalid @enderror" wire:model="type" value="{{ old('type') }}" id="type" placeholder="Select Room Seated">
                                    <datalist  name="typelist" id="typelist">
                                        <option value="1">Seated</option>
                                        <option value="2">Seated</option>
                                        <option value="3">Seated</option>
                                        <option value="4">Seated</option>
                                    </datalist>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="capacity" class="form-label">Room Capacity</label>
                                    <input type="number" min="1" class="form-control @error('capacity') is-invalid @enderror" wire:model="capacity" value="{{ old('capacity') }}" id="capacity" placeholder="Enter Capacity">
                                    @error('capacity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit"  class="btn btn-primary waves-effect waves-light">Save Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=='edit')
            @section('title')
                Edit Room
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Room</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading.attr="disabled"  wire:click="setmode('all')"class="btn btn-success waves-effect waves-light">
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
                            <form  wire:submit.prevent="update({{ isset($C_id)?$C_id:''; }})" method="post" action="" id="myForm">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="building_id" class="form-label">Select Building</label>
                                    <select class="form-select @error('building_id') is-invalid @enderror" id="building_id" wire:model="building_id" >
                                        <option hidden value="" >Select Building</option>
                                        @foreach ($buildings as $item1)
                                            <option  value="{{ $item1->id }}">{{ $item1->Hostel->name }}   ->   {{ $item1->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('building_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="floor" class="form-label">Select Floor Number</label>
                                    <input type="number" list="floorlist" class="form-control @error('floor') is-invalid @enderror" wire:model="floor" value="{{ old('floor') }}" id="floor" placeholder="Select Floor Number">
                                    <datalist  name="floorlist" id="floorlist">
                                        <option value="0">Ground Floor</option>
                                        <option value="1">First Floor</option>
                                        <option value="2">Second Floor</option>
                                        <option value="3">Third Floor</option>
                                    </datalist>
                                    @error('floor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="label" class="form-label">Room Label</label>
                                    <input type="text"  class="form-control @error('label') is-invalid @enderror" wire:model="label" value="{{ old('label') }}" id="label" placeholder="Enter Room Label">
                                    @error('label')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="type" class="form-label">Select Room Seated</label>
                                    <input type="number"  list="typelist" class="form-control @error('type') is-invalid @enderror" wire:model="type" value="{{ old('type') }}" id="type" placeholder="Select Room Seated">
                                    <datalist  name="typelist" id="typelist">
                                        <option value="1">Seated</option>
                                        <option value="2">Seated</option>
                                        <option value="3">Seated</option>
                                        <option value="4">Seated</option>
                                    </datalist>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="capacity" class="form-label">Room Capacity</label>
                                    <input type="number" min="1" class="form-control @error('capacity') is-invalid @enderror" wire:model="capacity" value="{{ old('capacity') }}" id="capacity" placeholder="Enter Capacity">
                                    @error('capacity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit"  class="btn btn-primary waves-effect waves-light">Update Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode="all")
            <div>
                @section('title')
                    All Roomes
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Data Rooms</h2>
                            </div>
                            <div class="float-end">
                                <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Room<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                </a>
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
                                            <div class="col-12 col-md-3 ">
                                                    <label class="w-100 p-1  text-sm-center">Search</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                    <input class="w-100" wire:model="b" type="search" placeholder="Building Name">
                                            </div>
                                            <div class="col-12 col-md-3">
                                                    <input class="w-100" wire:model="f" type="number" min="0" placeholder="Floor Number">
                                            </div>
                                            <div class="col-12 col-md-3">
                                                    <input class="w-100" wire:model="r" type="search" placeholder="Room Label">
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
                                            <th>Type</th>
                                            <th>Capacity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>                                     
                                                <td>{{ $item->Building->Hostel->name }}</td>
                                                <td>{{ $item->Building->name }}</td>
                                                <td>
                                                    @switch($item->floor)
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
                                                <td>{{ $item->id }} - {{ $item->label }} </td>
                                                <td>{{ $item->type }} Seated</td>  
                                                <td>{{ $item->capacity }}</td>   
                                                <td>
                                                    <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-lead-pencil"></i></a>
                                                    <a wire:loading.attr="disabled" wire:click="delete({{ $item->id }})"  class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $rooms->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

