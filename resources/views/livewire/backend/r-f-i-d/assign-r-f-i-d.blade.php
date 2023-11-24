<div class="content">
    <div class="container-fluid">

        @section('title')
        Assgin RFID To Student
        @endsection
        <div class="row">
            <div class="col-12">
                <div class="bg-success">
                    <div class="float-start pt-2 px-2">
                        <h2>Assgin RFID To Student</h2>
                    </div>
                    <div class="float-end">
                        <a wire:loading class="btn btn-primary btn-sm " style="padding:10px; ">
                            <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                            <span class="visually-hidden">Loading...</span>
                        </a>
                        <a wire:loading.attr="disabled"  wire:click="retry()"class="btn btn-warning ">
                            <span class="btn-label-right "><i class="mdi mdi-replay"></i></span>
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
                                <div class="col-12 col-md-5">
                                    <div class="mb-3 form-group">
                                        <label for="s_id" class="form-label">Enter Student ID</label>
                                        <input type="text" min="0"  class="form-control @error('s_id') is-invalid @enderror" wire:model="s_id" value="{{ old('s_id') }}" id="s_id" placeholder="Enter Student ID">
                                        @error('s_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 mx-auto my-auto text-center"> 
                                   OR
                                </div>
                                <div class="col-12 col-md-5 ">
                                    <div class="mb-3 form-group">
                                        <label for="a_id" class="form-label">Enter Admission ID</label>
                                        <input type="text" min="0"  class="form-control @error('a_id') is-invalid @enderror" wire:model.debounce.2000ms="a_id" value="{{ old('a_id') }}" id="a_id" placeholder="Enter Admission ID">
                                        @error('a_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="student_name" class="form-label">Student ID</label>
                                        <input disabled readonly type="text" class=" bg-dark  form-control @error('student_id') is-invalid @enderror"  wire:model.debounce.2000ms="student_id" >
                                        @error('student_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="student_name" class="form-label">Student Name</label>
                                       <label for="student_name" class=" bg-dark  form-control">{{ $name }}</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    @if ($status)
                                        <div wire:poll.5s="fetch"></div>   
                                    @endif
                                    <div class="mb-3 form-group" >
                                        <label  for="student_rfid" class="form-label">New RFID</label>
                                        <input disabled readonly type="text"  class="bg-dark  form-control @error('rfid') is-invalid @enderror"  wire:model="rfid" >
                                        @error('rfid')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                @can('Remove RFID')
                                    <a wire:loading.attr="disabled"  wire:click="remove()"class=" btn btn-danger ">
                                        Remove RFID
                                    </a>
                                @endcan
                                @can('Assgin RFID')
                                    <button type="submit" class=" float-end btn btn-success ">Assign RFID</button>
                                @endcan
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>