<div class="content ">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Permission
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Add Permission</h2>
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
                    <div class="card ">
                        <div class="card-body">
                            <form  wire:submit.prevent="save" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="name" class="form-label">Permission Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" value="{{ old('name') }}" id="name" placeholder="Enter Permission Name">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="group_name" class="form-label ">Group Name</label>
                                            <input list="group_name" class="form-control @error('group_name') is-invalid @enderror"  wire:model="group_name" id="group_name">
                                            <datalist id="group_name">
                                                @foreach ($groups as $item)
                                                    <option value="{{ $item->group_name }}">{{ $item->group_name }}</option>
                                                @endforeach
                                            </datalist>
                                            @error('group_name')
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
                Edit Permission
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Permission</h2>
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
                                            <label for="name" class="form-label">Permission Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" value="{{ old('name') }}" id="name" placeholder="Enter Permission Name">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="group_name" class="form-label ">Group Name</label>
                                            <input list="group_name" class="form-control @error('group_name') is-invalid @enderror"  wire:model="group_name" id="group_name">
                                            <datalist id="group_name">
                                                @foreach ($groups as $item)
                                                    <option value="{{ $item->group_name }}">{{ $item->group_name }}</option>
                                                @endforeach
                                            </datalist>
                                            @error('group_name')
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
        @elseif($mode=='all')
            <div>
                @section('title')
                    All Permissions
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Data Permissions</h2>
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
                                @can('Add Permission')
                                    <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success ">
                                        Add Permission<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
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
                                    <label class=" col-4 col-md-1  py-1 ">Records</label>
                                    <span class="col-12 col-md-9 p-0">
                                            <div class="row ">
                                                <div class="col-12 col-md-6 ">
                                                </div>
                                                <div class="col-12 col-md-3 ">
                                                    <label class="w-100 p-1  text-md-end">Search</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input class="w-100" wire:model.debounce.1000ms="search" type="search" placeholder="Permission Name">
                                                </div>
                                            </div>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="data-table" class=" table  dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Group Name</th>
                                            <th>Permission Name</th>
                                            @can('Edit Permission')
                                                <th>Action</th>
                                            @elsecan('Delete Permission')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->group_name }}</td>
                                                <td>{{ $item->name }}</td>
                                                @can('Edit Permission')
                                                    <td>
                                                        @can('Edit Permission')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                        @endcan
                                                        @can('Delete Permission')
                                                            <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete"></i></a>
                                                        @endcan
                                                    </td>
                                                @elsecan('Delete Permission')
                                                    <td>
                                                        @can('Edit Permission')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                        @endcan
                                                        @can('Delete Permission')
                                                            <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete"></i></a>
                                                        @endcan
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $permissions->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>



