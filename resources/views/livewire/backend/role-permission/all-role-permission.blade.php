<div class="content ">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Role Permission
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Add Role Permission</h2>
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
                                <div class="form-group">
                                    <label for="role_id" class="form-label">All Roles</label>
                                    <select class="form-select @error('role_id') is-invalid @enderror" id="role_id" wire:model="role_id">
                                        <option hidden value="" >Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <table  id="data-table" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Group Name</th>
                                            <th>Permission Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permission_groups as  $key => $group)
                                        <tr>
                                            <td>
                                                {{ $key+1; }}
                                            </td>
                                            <td>
                                                <div class="form-group form-check mb-3 form-check-primary">
                                                    <label class="form-check-label"  >{{ $group->group_name }}</label>
                                                </div>
                                            </td>
                                            <td>
                                                @php
                                                    $perm = App\Models\Admin::getpermissionByGroupName($group->group_name);
                                                @endphp
                                                @foreach ($perm as $permissionitem)
                                                <div class="form-group form-check mb-3 form-check-primary">
                                                    <input class="form-check-input @error('permission') is-invalid @enderror" wire:model="permission.{{ $permissionitem->id }}" type="checkbox" value="{{ $permissionitem->id }}" id="customckeck{{ $permissionitem->id }}">
                                                    <label class="form-check-label" for="customckeck{{ $permissionitem->id }}">{{ $permissionitem->name }}</label>
                                                    @error('permission.{{ $permissionitem->id }}')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    <button type="submit"  class="btn btn-primary ">Save Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=='edit')
            @section('title')
                Edit Role
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Role</h2>
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
                                <div class="mb-3 form-group">
                                    <label for="role" class="form-label">Role</label>
                                    <span class="form-control fw-bold">{{ $role->name }} </span>

                                </div>
                                <table  id="datatable-buttons"   class="table  dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Group Name</th>
                                            <th>Permissions Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permission_groups as $key => $group)
                                        <tr >
                                            @php
                                                $per = App\Models\Admin::getpermissionByGroupName($group->group_name);
                                            @endphp
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                <label class="form-check-label form-check " for="customckeck1">{{ $group->group_name }}</label>
                                            </td>
                                            <td>
                                                @foreach ($per as $permissionitem)
                                                    <div class="form-group form-check   form-check-primary">
                                                        <input class="form-check-input @error('permission') is-invalid @enderror" wire:model="permission.{{ $permissionitem->id }}" type="checkbox" value="{{ $permissionitem->id }}" id="customckeck{{ $permissionitem->id }}" >
                                                        <label class="form-check-label" for="customckeck{{ $permissionitem->id }}">{{ $permissionitem->name }}</label>
                                                        @error('permission')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                 @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    <button type="submit"  class="btn btn-primary ">Update Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=='all')
            <div>
                @section('title')
                    All Role Wise Permissions
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Data Role Wise Permissions</h2>
                                <div wire:loading wire:target="per_page" class="loading-overlay">
                                    <div class="loading-spinner">
                                        <div class="spinner-border spinner-border-lg text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
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
                                {{-- @can('Add Role Wise Permission')
                                    <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success ">
                                        Add Role Permission<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
                                    </a>
                                @endcan --}}
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
                                                    <input class="w-100" wire:model.debounce.1000ms="search" type="search" placeholder="Role Name">
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
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Permissions</th>
                                            @can('Edit Role Wise Permission')
                                                <th>Action</th>
                                            @elsecan('Edit Role Wise Permission')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allroles as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @if ( $item->status == '0')
                                                        <span class="badge bg-success text-white">Active</span>
                                                    @else
                                                        <span class="badge bg-danger text-white">In-Active</span>
                                                    @endif
                                                </td>
                                                <td class="text-wrap">
                                                    @foreach ($item->permissions as $permission)
                                                        <span class="badge rounded-pill m-1 bg-danger">{{ $permission->name }}</span>
                                                    @endforeach
                                                </td>
                                                @can('Edit Role Wise Permission')
                                                    <td>
                                                        @can('Edit Role Wise Permission')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                        @endcan
                                                        @can('Delete Role Wise Permission')
                                                            <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete"></i></a>
                                                        @endcan
                                                    </td>
                                                @elsecan('Edit Role Wise Permission')
                                                    <td>
                                                        @can('Edit Role Wise Permission')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                        @endcan
                                                        @can('Delete Role Wise Permission')
                                                            <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete"></i></a>
                                                        @endcan
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $allroles->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
