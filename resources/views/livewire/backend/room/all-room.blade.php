<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Room
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Add Room</h4>
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
                                            <option  value="{{ $item1->id }}"> {{ $item1->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('building_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="floor" class="form-label">Floor Number</label>
                                    <input type="number"  min="0" class="form-control @error('floor') is-invalid @enderror" wire:model="floor" value="{{ old('floor') }}" id="floor" placeholder="Enter Floor No. Ex.( 0-Ground ,1-First )">
                                    @error('floor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="label" class="form-label">Room Label</label>
                                    <input type="text" class="form-control @error('label') is-invalid @enderror" wire:model="label" value="{{ old('label') }}" id="label" placeholder="Auto Genrate">
                                    @error('label')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="type" class="form-label">Room Seated Type</label>
                                    <input type="number" min="1" class="form-control @error('type') is-invalid @enderror" wire:model="type" value="{{ old('type') }}" id="type" placeholder="Enter Seated Type Ex.( 2-Seated ,3-Seated , 4-Seated )">
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
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Edit Room</h4>
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
                                            <option  value="{{ $item1->id }}"> {{ $item1->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('building_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="floor" class="form-label">Floor Number</label>
                                    <input type="number"  min="0" class="form-control @error('floor') is-invalid @enderror" wire:model="floor" value="{{ old('floor') }}" id="floor" placeholder="Enter Floor No. Ex.( 0-Ground ,1-first )">
                                    @error('floor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="label" class="form-label">Room Label</label>
                                    <input type="text"  class="form-control @error('label') is-invalid @enderror" wire:model="label" value="{{ old('label') }}" id="label" placeholder="Auto Genrate">
                                    @error('label')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="type" class="form-label">Room Seated Type</label>
                                    <input type="number" min="1" class="form-control @error('type') is-invalid @enderror" wire:model="type" value="{{ old('type') }}" id="type" placeholder="Enter Seated Type Ex.( 2-Seated ,3-Seated , 4-Seated )">
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
        @else
            <div>
                @section('title')
                    All Roomes
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <a wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Room<span class="btn-label-right"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                </a>
                            </div>
                            <h4 class="page-title">Data Rooms</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title"></h4>
                                <table id="data-table" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Building Name</th>
                                            <th>Floor</th>
                                            <th>Label</th>
                                            <th>Type</th>
                                            <th>Capacity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>                                     
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
                                                    @default
                                                        {{ $item->floor }} 
                                                    @endswitch
                                                     Floor
                                                </td>
                                                <td>{{ $item->label }}</td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

