<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Academic Year
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Add Academic Year</h4>
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
                                    <label for="year" class="form-label">Academic Year</label>
                                    <input type="text" class="form-control @error('year') is-invalid @enderror" wire:model="year" value="{{ old('year') }}" id="year" placeholder="Enter Academic Year">
                                    @error('year')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group form-check-primary form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ old('status')==true?'checked':''; }} id="class_status"  wire:model="status" >
                                    <label class="form-check-label" for="class_status">In-Active Academic Year</label>
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
                Edit Academic Year
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a wire:loading.attr="disabled" wire:click="setmode('')"class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-arrow-left-thick"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Edit Academic Year</h4>
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
                                    <label for="year" class="form-label">Academic Year</label>
                                    <input type="text" class="form-control @error('year') is-invalid @enderror" wire:model="year" value="{{ $year }}" id="year" placeholder="Enter Academic Year">
                                    @error('year')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group form-check-primary form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" value="1" {{ $status==1?'checked':''; }} id="class_status"  wire:model="status" >
                                    <label class="form-check-label" for="class_status">In-Active Academic Year</label>
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
                    All Academic Years
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <a wire:click="setmode('add')"class="btn btn-success waves-effect waves-light">
                                    Add Academic Year<span class="btn-label-right"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                </a>
                            </div>
                            <h4 class="page-title">Data Academic Years</h4>
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
                                            <th>Year</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($academicyear as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->year }}</td>       
                                                <td>{{  $item->status==0?'Active':'In-Active'; }}</td> 
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


