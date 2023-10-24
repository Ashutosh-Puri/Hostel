<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Merit List
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Add Merit List</h2>
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
                            <form wire:submit.prevent="save" method="post" action="" id="myForm">
                                @csrf
                                <div class="row text-start">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="name" class="form-label">Student Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"  wire:model="name" value="{{ old('name') }}" id="name" placeholder="Enter Student Name">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="class" class="form-label">Class</label>
                                            <input type="text" class="form-control @error('class') is-invalid @enderror"  wire:model="class" value="{{ old('class') }}" id="class" placeholder="Enter Class">
                                            @error('class')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="email" class="form-label">Student Email</label>
                                            <input type="email"  class="form-control @error('email') is-invalid @enderror"  wire:model="email"  placeholder="Enter Student Email">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="mobile" class="form-label">Student Mobile</label>
                                            <input type="number"  class="form-control @error('mobile') is-invalid @enderror"  wire:model="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Enter Student Mobile">
                                            @error('mobile')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="gender" class="form-label">Select Gender</label>
                                            <select class="form-select  @error('gender') is-invalid @enderror" id="gender" wire:model.debounce.500ms="gender">
                                                <option hidden value="">Select </option>
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select>
                                            @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="sgpa" class="form-label">SGPA</label>
                                            <input type="text" class="form-control @error('sgpa') is-invalid @enderror" wire:model="sgpa" value="{{ old('sgpa') }}" id="sgpa"  placeholder="Enter SGPA">
                                            @error('sgpa')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="percentage" class="form-label">Percentage</label>
                                            <input type="text" class="form-control @error('percentage') is-invalid @enderror" wire:model="percentage" value="{{ old('percentage') }}" id="percentage"  placeholder="Enter Percentage">
                                            @error('percentage')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary ">Save Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=='edit')
            @section('title')
                Edit Merit List
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Merit List</h2>
                            <div wire:loading class="loading-overlay">
                                <div class="loading-spinner">
                                    <div class="spinner-border spinner-border-lg text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
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
                                <div class="row text-start">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="name" class="form-label">Student Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"  wire:model="name" value="{{ old('name') }}" id="name" placeholder="Enter Student Name">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="class" class="form-label">Class</label>
                                            <input type="text" class="form-control @error('class') is-invalid @enderror"  wire:model="class" value="{{ old('class') }}" id="class" placeholder="Enter Class">
                                            @error('class')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="email" class="form-label">Student Email</label>
                                            <input type="email"  class="form-control @error('email') is-invalid @enderror"  wire:model="email" value="{{ old('email') }}"  placeholder="Enter Student Email">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="mobile" class="form-label">Student Mobile</label>
                                            <input type="text"  class="form-control @error('mobile') is-invalid @enderror"  wire:model="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Enter Student Mobile">
                                            @error('mobile')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="gender" class="form-label">Select Gender</label>
                                            <select class="form-select  @error('gender') is-invalid @enderror" id="gender" wire:model.debounce.500ms="gender">
                                                <option hidden value="">Select </option>
                                                <option value="0" {{ old('gender')==0?"selected":''; }}>Male</option>
                                                <option value="1" {{ old('gender')==1?"selected":''; }}>Female</option>
                                            </select>
                                            @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="sgpa" class="form-label">SGPA</label>
                                            <input type="text" class="form-control @error('sgpa') is-invalid @enderror" wire:model="sgpa" value="{{ old('sgpa') }}" id="sgpa"  placeholder="Enter SGPA">
                                            @error('sgpa')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="percentage" class="form-label">Percentage</label>
                                            <input type="text" class="form-control @error('percentage') is-invalid @enderror" wire:model="percentage" value="{{ old('percentage') }}" id="percentage"  placeholder="Enter Percentage">
                                            @error('percentage')
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
                    All Merit List
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Data Merit List</h2>
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
                                @can('View Merit List')
                                <a   target="_blank"  class="btn btn-warning " href="{{ route('admin_view_merit_list',['array' => json_encode($meritlistArray['id'])]) }}"> <i class="mdi mdi-eye"></i></a>
                                @endcan
                                @can('Download Merit List')
                                    <a   target="_blank"  class="btn btn-warning " href="{{ route('admin_download_merit_list',['array' => json_encode($meritlistArray['id'])]) }}"> <i class="mdi mdi-download"></i></a>
                                @endcan
                                @can('Add Merit List')
                                    <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success ">
                                        Add Student<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
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
                                        <span class="row">
                                            <div class="col-12 col-md-1 ">
                                                    <label class="w-100 p-1  text-md-end">Search</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input class="w-100 py-1" wire:model.debounce.1000ms="m_name" type="search" placeholder="Student Name">
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <input class="w-100 py-1" wire:model.debounce.1000ms="m_class" type="search" placeholder="Student Class">
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="sortby_feild">
                                                    <option value="" hidden>Sort By</option>
                                                    <option value="name">Name</option>
                                                    <option value="class">Class</option>
                                                    <option value="percentage">Percentage</option>
                                                    <option value="sgpa">SGPA</option>
                                                    <option value="gender">Gender</option>
                                                    <option value="mobile">Mobile</option>
                                                    <option value="email">Email</option>
                                                    <option value="status">Status</option>
                                                </select>
                                            </div>
                                            <div class="col-4 col-md-1">
                                                <select class="w-100 py-1" wire:loading.attr="disabled" wire:model="sortby_order">
                                                    <option value="ASC">ASC</option>
                                                    <option value="DESC">DESC</option>
                                                </select>
                                            </div>
                                            <div class="col-2 col-md-1  ">
                                                <button wire:click='clear'class="  btn btn-sm btn-danger "><i class="mdi  mdi-close"></i></button>
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
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Class</th>
                                            <th>Percentage</th>
                                            <th>SGPA</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            @can('Edit Merit List')
                                                <th>Action</th>
                                            @elsecan('Delete Merit List')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($meritlist as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->name}}</td>
                                                <td>{{ $item->mobile}}</td>
                                                <td>{{ $item->class}}</td>
                                                <td>{{ $item->percentage }}</td>
                                                <td>{{ $item->sgpa }}</td>
                                                <td>{{ $item->gender==0?"Male":"Female"; }}</td>
                                                <td>
                                                    @if ( $item->status == '1')
                                                        <span class="badge bg-success text-white"> Selected</span>
                                                    @else
                                                        <span class="badge bg-danger text-white">Not Selected</span>
                                                    @endif
                                                </td>
                                                @can('Edit Merit List')
                                                <td>
                                                    @can('Edit Merit List')
                                                        <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                        @if ($item->status==1)
                                                            <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-thumb-up"></i> </a>
                                                        @else
                                                            <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-danger "> <i class="mdi mdi-thumb-down"></i> </a>
                                                        @endif
                                                    @endcan
                                                    @can('Delete Merit List')
                                                        @if ($item->deleted_at)
                                                            <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                            <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                        @else
                                                            <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                        @endif
                                                    @endcan
                                                </td>
                                            @elsecan('Delete Merit List')
                                                <td>
                                                    @can('Edit Merit List')
                                                        <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-success "><i class="mdi mdi-lead-pencil"></i></a>
                                                        @if ($item->status==1)
                                                            <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-success "> <i class="mdi mdi-thumb-up"></i> </a>
                                                        @else
                                                            <a wire:loading.attr="disabled"  wire:click="status({{ $item->id }})" class="btn btn-danger "> <i class="mdi mdi-thumb-down"></i> </a>
                                                        @endif
                                                    @endcan
                                                    @can('Delete Merit List')
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
                                    {{ $meritlist->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

