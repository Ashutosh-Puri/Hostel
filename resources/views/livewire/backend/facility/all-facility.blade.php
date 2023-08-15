<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Facility
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Add Facility</h2>
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
                                    <label for="room_id" class="form-label">Select Room</label>
                                    <select class="form-select @error('room_id') is-invalid @enderror" id="room_id" wire:model="room_id" >
                                        <option value="" hidden>Select Room</option>
                                        @foreach ($rooms as $item2)
                                            @php
                                                $temp =" H - ".$item2->Building->Hostel->name . " --->B - " . $item2->Building->name . " ---> F - " . $item2->floor . " ---> R - " . $item2->label;
                                            @endphp
                                        <option value="{{ $item2->id }}">{{ $temp }}</option>
                                        @endforeach
                                    </select>
                                    @error('room_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="name" class="form-label">Facility Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" value="{{ old('name') }}" id="name" placeholder="Enter Name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group ">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ old('status')==true?'checked':''; }} id="class_status"  wire:model="status" >
                                    <label class="form-check-label m-1" for="class_status">In-Active Facility</label>
                                    @error('status')
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
                Edit Facility
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Facility</h2>
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
                                    <label for="room_id" class="form-label">Select Room</label>
                                    <select class="form-select @error('room_id') is-invalid @enderror" id="room_id" wire:model="room_id" >
                                        <option value="" hidden>Select Room</option>
                                        @foreach ($rooms as $item2)
                                            @php
                                                 $temp =" H - ".$item2->Building->Hostel->name . " --->B - " . $item2->Building->name . " ---> F - " . $item2->floor . " ---> R - " . $item2->label;
                                            @endphp
                                            <option value="{{ $item2->id }}">{{ $temp }}</option>
                                        @endforeach
                                    </select>
                                    @error('room_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="name" class="form-label">Facility Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" value="{{ $name }}" id="name" placeholder="Enter Name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group ">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ $status==1?'checked':''; }} id="class_status"  wire:model="status" >
                                    <label class="form-check-label m-1" for="class_status">In-Active Facility</label>
                                    @error('status')
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
                    All Facilities
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Data Facilities</h2>
                            </div>
                            <div class="float-end">
                                <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Facility<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
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
                                            <div class="col-12 col-md-6 ">
                                            </div>
                                            <div class="col-12 col-md-3 ">
                                                    <label class="w-100 p-1  text-md-end">Search</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input class="w-100" wire:model="search" type="search" placeholder="Room Label">
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
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($facility as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>  
                                                <td>{{ $item->Room->Building->Hostel->name}}</td>  
                                                <td>{{ $item->Room->Building->name}}</td>  
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
                                                <td>{{ $item->Room->id }} - {{ $item->Room->label }}</td>
                                                <td>{{ $item->name }}</td>       
                                                <td>
                                                    @if ( $item->status == '0')
                                                        <span class="badge bg-success text-white">Active</span>
                                                    @else
                                                        <span class="badge bg-danger text-white">In-Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-lead-pencil"></i></a>
                                                    <a wire:loading.attr="disabled" wire:click="delete({{ $item->id }})"  class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $facility->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
