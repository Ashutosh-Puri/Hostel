<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Class
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('all')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Add Class</h4>
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
                                    <label for="stream" class="form-label">Select Stream</label>
                                    <select class="form-select @error('stream') is-invalid @enderror" id="stream" wire:model="stream" >
                                        <option hidden value="" >Select Stream</option>
                                        <option  value="Arts" >Arts</option>
                                        <option  value="Commerce" >Commerce</option>
                                        <option  value="Science" >Science</option>
                                    </select>
                                    @error('stream')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="type" class="form-label">Select Type</label>
                                    <select class="form-select @error('type') is-invalid @enderror" id="type" wire:model="type" >
                                        <option hidden value="" >Select Type</option>
                                        <option  value="Postgraduate" >Postgraduate</option>
                                        <option  value="Undergraduate" >Undergraduate</option>
                                        <option  value="Senior" >Senior</option>
                                        <option  value="Junior" >Junior</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="name" class="form-label">Class Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" value="{{ old('name') }}" id="name" placeholder="Enter Name Ex.( FY.BCS , SY.BCS)">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>                       
                                <div class="mb-3 form-group form-check-primary form-check">

                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ old('status')==true?'checked':''; }} id="class_status"  wire:model="status" >
    
                                    <label class="form-check-label" for="class_status">In-Active Class</label>
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
                Edit Class
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('all')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Edit Class</h4>
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
                                    <label for="stream" class="form-label">Stream</label>
                                    <input type="text" class="form-control @error('stream') is-invalid @enderror" wire:model="stream" value="{{ old('stream') }}" id="stream" placeholder="Enter Stream Ex.( Science , Commerce , Arts)">
                                    @error('stream')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="type" class="form-label">Type</label>
                                    <input type="text" class="form-control @error('type') is-invalid @enderror" wire:model="type" value="{{ old('type') }}" id="type" placeholder="Enter Type Ex.( JR. , SR. ,UG.,PG. )">
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="name" class="form-label">Class Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" value="{{ $name }}" id="name" placeholder="Enter Name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group form-check-primary form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ $status==1?'checked':''; }} id="class_status"  wire:model="status" >
                                    <label class="form-check-label" for="class_status">In-Active Class</label>
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
        @elseif($mode=='all')
            <div>
                @section('title')
                    All Classes
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <a wire:loading.attr="disabled" wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Class<span class="btn-label-right"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                </a>
                            </div>
                            <h4 class="page-title">Data Classes</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title"></h4>
                                <table id="data-table" class=" table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Stream</th>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($class as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->stream }}</td> 
                                                <td>{{ $item->type }}</td> 
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>



