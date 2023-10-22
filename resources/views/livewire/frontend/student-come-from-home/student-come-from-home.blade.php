<div class="content">
    <div class="container-fluid">
        @if ($mode == 'add') @section('title')
        Add Come From Home Entry
        @endsection
        <div class="row">
            <div class="col-12">
                <div class="bg-success">
                    <div class="float-start pt-2 px-2">
                        <h2>Add Come From Home Entry</h2>
                    </div>
                    <div class="float-end">
                        <a wire:loading.attr="disabled" wire:click="setmode('all')"
                            class="btn btn-success ">
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
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="come_time" class="form-label">Come Time</label>
                                        <input type="time" wire:model="come_time"
                                            class="form-control @error('come_time') is-invalid @enderror " id="time"
                                            placeholder="Enter Come Time" />
                                        @error('come_time')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @elseif($mode == 'edit')
        @section('title')
        Edit Come From Home Entry
        @endsection
        <div class="row">
            <div class="col-12">
                <div class="bg-success">
                    <div class="float-start pt-2 px-2">
                        <h2> Edit Come From Home Entry</h2>
                    </div>
                    <div class="float-end">
                        <a wire:loading.attr="disabled" wire:click="setmode('all')"
                            class="btn btn-success ">
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
                        <form wire:submit.prevent="update({{ isset($c_id) ? $c_id : '' }})" method="post" action=""
                            id="myForm">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="come_time" class="form-label">Come Time</label>
                                        <input type="time" wire:model="come_time"
                                            class="form-control @error('come_time') is-invalid @enderror " id="time"
                                            placeholder="Enter Come Time" />
                                        @error('come_time')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ">
                                Update Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @elseif($mode = 'all')
        <div>
            @section('title')
            Student Come From Home
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Data Student Come From Home</h2>
                            <div wire:loading wire:target="per_page" class="loading-overlay">
                                <div class="loading-spinner">
                                    <div class="spinner-border spinner-border-lg text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            @if (auth()->user()->getBedId())
                                <a wire:loading.attr="disabled" wire:click="setmode('add')" class="btn btn-success ">
                                    Add Come From Home Entry<span class="btn-label-right mx-2"><i class="mdi mdi-plus-circle fw-bold"></i></span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <label class="col-4 col-md-1 py-1">Per Page</label>
                                <select class="col-4 col-md-1" wire:loading.attr="disabled" wire:model="per_page">
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                </select>
                                <label class="col-4 col-md-1 py-1">Records</label>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="data-table" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        <th>Student</th>
                                        <th>Come Date</th>
                                        <th>Come Time</th>
                                        <th>Room</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($come_from_home as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $item->allocation->admission->academicyear->year }}
                                        </td>
                                        <td>
                                            {{ $item->allocation->admission->Class->name }}
                                        </td>
                                        <td>
                                            {{ $item->allocation->admission->Student->name }}
                                        </td>
                                        <td>{{ date('d / m / Y', strtotime($item->come_time)) }}
                                        </td>
                                        <td>
                                            {{ date('h:i A', strtotime($item->come_time)) }}
                                        </td>
                                        <td>
                                            @if ( $item->allocation->bed_id)
                                                
                                            {{  $item->allocation->Bed->Room->id }} - (  {{  $item->allocation->Bed->Room->label }} )
                                            @else
                                             N.A
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == '0')
                                            <span class="badge bg-warning text-white">Pending</span>
                                            @else
                                            <span class="badge bg-success text-white">Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status !== 1)
                                            <a wire:loading.attr="disabled" wire:click="edit({{ $item->id }})" class="btn btn-success "><i  class="mdi mdi-lead-pencil"></i></a>
                                            @endif
                                            @if ($item->status !== 1)
                                                <a wire:loading.attr="disabled"   wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i    class="mdi mdi-delete"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $come_from_home->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
