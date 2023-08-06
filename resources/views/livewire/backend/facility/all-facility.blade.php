<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Facility
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Add Facility</h4>
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
                                        @foreach ($rooms as $item1)
                                            <option  value="{{ $item1->id }}"> {{ $item1->label }} </option>
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
                                <div class="mb-3 form-group form-check-primary form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ old('status')==true?'checked':''; }} id="class_status"  wire:model="status" >
                                    <label class="form-check-label" for="class_status">In-Active Facility</label>
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
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Edit Facility</h4>
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
                                        @foreach ($rooms as $item1)
                                            <option  value="{{ $item1->id }}"> {{ $item1->label }} </option>
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
                                <div class="mb-3 form-group form-check-primary form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ $status==1?'checked':''; }} id="class_status"  wire:model="status" >
                                    <label class="form-check-label" for="class_status">In-Active Facility</label>
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
        @else
            <div>
                @section('title')
                    All Facilityes
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <a wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Facility<span class="btn-label-right"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                </a>
                            </div>
                            <h4 class="page-title">Data Facilities</h4>
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
                                            <th>Room Label</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($facility as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>                                     
                                                <td>{{ $item->Room->label }}</td>
                                                <td>{{ $item->name }}</td>       
                                                <td>
                                                    @if ( $item->status == '1')
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

