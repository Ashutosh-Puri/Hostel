<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <h6>
        Student Dashboard {{ auth()->user()->username }}
    </h6>


    <section>
        <div class="content">
            <div class="container-fluid">
                @section('title')
                    title
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Form For Student Come From Home</h2>
                            </div>
                            <div class="float-end">
                                <a wire:loading.attr="disabled"
                                    wire:click="setmode('all')"class="btn btn-success waves-effect waves-light">
                                    Back<span class="btn-label-right mx-2"><i
                                            class="mdi mdi-arrow-left-thick"></i></span>
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
                                                <label for="studid" class="form-label">Student ID</label>
                                                <input type="studid"
                                                    class="form-control @error('studid') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="studid" value="{{ old('studid') }}"
                                                    id="studid" placeholder="Enter Student ID">
                                                @error('studid')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="name" class="form-label">Student Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="name" value="{{ old('name') }}"
                                                    id="name" placeholder="Student Name">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="entrytime" class="form-label">Entry Time</label>
                                                <input type="time"
                                                    class="form-control @error('entrytime') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="entrytime"
                                                    value="{{ old('entrytime') }}" id="entrytime">
                                                @error('entrytime')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="entrydate" class="form-label">Entry Date</label>
                                                <input type="date"
                                                    class="form-control @error('entrydate') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="entrydate"
                                                    value="{{ old('entrydate') }}" id="entrydate">
                                                @error('entrydate')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="class" class="form-label">Class</label>
                                                <input type="text"
                                                    class="form-control @error('class') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="class" value="{{ old('class') }}"
                                                    id="class" placeholder="Enter Class">
                                                @error('class')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="mobno" class="form-label">Mobile Number</label>
                                                <input type="number"
                                                    class="form-control @error('mobno') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="mobno" value="{{ old('mobno') }}"
                                                    id="mobno" placeholder="Enter Mobile Number">
                                                @error('mobno')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="roomno" class="form-label">Room Number</label>
                                                <input type="number"
                                                    class="form-control @error('roomno') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="roomno" value="{{ old('roomno') }}"
                                                    id="roomno" placeholder="Enter Room Number">
                                                @error('roomno')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="address" class="form-label">Enter Address</label>
                                                <textarea class="form-control @error('address') is-invalid @enderror" wire:model.debounce.1000ms="address"
                                                    id="address" placeholder="Enter Address" cols="30" rows="3">{{ old('reasone') }}</textarea>
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="content">
            <div class="container-fluid">
                @section('title')
                    Night Out Form
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Night Out Form</h2>
                            </div>
                            <div class="float-end">
                                <a wire:loading.attr="disabled"
                                    wire:click="setmode('all')"class="btn btn-success waves-effect waves-light">
                                    Back<span class="btn-label-right mx-2"><i
                                            class="mdi mdi-arrow-left-thick"></i></span>
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
                                                <label for="studid" class="form-label">Student ID</label>
                                                <input type="number"
                                                    class="form-control @error('studid') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="studid" value="{{ old('studid') }}"
                                                    id="studid" placeholder="Enter Student Id">
                                                @error('studid')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="name" class="form-label">Student Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="name" value="{{ old('name') }}"
                                                    id="name" placeholder="Student Name">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="fromdate" class="form-label">From</label>
                                                <input type="date"
                                                    class="form-control @error('fromdate') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="fromdate"
                                                    value="{{ old('fromdate') }}" id="fromdate">
                                                @error('fromdate')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="todate" class="form-label">To</label>
                                                <input type="date"
                                                    class="form-control @error('todate') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="todate" value="{{ old('todate') }}"
                                                    id="todate">
                                                @error('todate')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="entrydate" class="form-label">Entry Date</label>
                                                <input type="date"
                                                    class="form-control @error('entrydate') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="entrydate"
                                                    value="{{ old('entrydate') }}" id="entrydate">
                                                @error('entrydate')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="class" class="form-label">Class</label>
                                                <input type="text"
                                                    class="form-control @error('class') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="class" value="{{ old('class') }}"
                                                    id="class" placeholder="Enter Class">
                                                @error('class')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="mobno" class="form-label">Mobile Number</label>
                                                <input type="number"
                                                    class="form-control @error('mobno') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="mobno" value="{{ old('mobno') }}"
                                                    id="mobno" placeholder="Enter Mobile Number">
                                                @error('mobno')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="roomno" class="form-label">Room Number</label>
                                                <input type="number"
                                                    class="form-control @error('roomno') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="roomno" value="{{ old('roomno') }}"
                                                    id="roomno" placeholder="Enter Room Number">
                                                @error('roomno')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="address" class="form-label">Enter Address Of
                                                    Guardian</label>
                                                <textarea class="form-control @error('address') is-invalid @enderror" wire:model.debounce.1000ms="address"
                                                    id="address" placeholder="Enter Address Of Guardian" cols="30" rows="3">{{ old('reasone') }}</textarea>
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="relation" class="form-label">Relation With
                                                    Guardian</label>
                                                <input type="relation"
                                                    class="form-control @error('relation') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="relation"
                                                    value="{{ old('relation') }}" id="relation"
                                                    placeholder="Relation With Guardianr">
                                                @error('relation')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="reasone" class="form-label">Reasone For Night Out</label>
                                                <input type="reasone"
                                                    class="form-control @error('reasone') is-invalid @enderror"
                                                    wire:model.debounce.1000ms="reasone" value="{{ old('reasone') }}"
                                                    id="reasone" placeholder="Reasone For Night Out">
                                                @error('reasone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
