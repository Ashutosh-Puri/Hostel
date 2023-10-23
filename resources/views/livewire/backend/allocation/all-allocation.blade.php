<div class="content">
    <div class="container-fluid">
        @if ($mode=='add')
            @section('title')
                Add Allocation
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Add Allocation</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading class="btn btn-primary btn-sm " style="padding:10px; ">
                                <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                                <span class="visually-hidden">Loading...</span>
                            </a>
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
                            <form  wire:submit.prevent="save" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="academic_year_id" class="form-label">Select  Academic Year</label>
                                            <select class="form-select @error('academic_year_id') is-invalid @enderror" id="academic_year_id" wire:model="academic_year_id" >
                                                <option value="" hidden>Select  Academic Year</option>
                                                @foreach ($academicyears as $item1)
                                                    <option  value="{{ $item1->id }}">{{ $item1->year }} </option>
                                                @endforeach
                                            </select>
                                            @error('academic_year_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="admission_id" class="form-label">Select  Admission ID</label>
                                            <select class="form-select @error('admission_id') is-invalid @enderror" id="admission_id" wire:model="admission_id" >
                                                <option value="" hidden>Select  Admission ID</option>
                                                @foreach ($admissions as $item1)
                                                    <option  value="{{ $item1->id }}">{{ $item1->id }} </option>
                                                @endforeach
                                            </select>
                                            @error('admission_id')
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
        @elseif ($mode=='edit')
            @section('title')
                Edit Allocation
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Edit Allocation</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading class="btn btn-primary btn-sm " style="padding:10px; ">
                                <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                                <span class="visually-hidden">Loading...</span>
                            </a>
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
                                            <label for="academic_year_id" class="form-label">Select  Academic Year</label>
                                            <select class="form-select @error('academic_year_id') is-invalid @enderror" id="academic_year_id" wire:model="academic_year_id" >
                                                <option value="" hidden>Select  Academic Year</option>
                                                @foreach ($academicyears as $item1)
                                                    <option  value="{{ $item1->id }}">{{ $item1->year }} </option>
                                                @endforeach
                                            </select>
                                            @error('academic_year_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="admission_id" class="form-label">Select  Admission ID</label>
                                            <select class="form-select @error('admission_id') is-invalid @enderror" id="admission_id" wire:model="admission_id" >
                                                <option value="" hidden>Select  Admission ID</option>
                                                @foreach ($admissions as $item1)
                                                    <option  value="{{ $item1->id }}">{{ $item1->id }} </option>
                                                @endforeach
                                            </select>
                                            @error('admission_id')
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
        @elseif ($mode=='allocate')
            @section('title')
                Allocate Bed
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Allocate Bed</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading class="btn btn-primary btn-sm " style="padding:10px; ">
                                <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                                <span class="visually-hidden">Loading...</span>
                            </a>
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
                            <form  wire:submit.prevent="allocatebed({{ isset($admission->id)?$admission->id:''; }})" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="academic_year_id" class="form-label">Academic Year</label>
                                            <label  class="form-control"for=""> {{ isset($admission->AcademicYear->year)?$admission->AcademicYear->year:''; }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="student_id" class="form-label">Student Name</label>
                                            <label class="form-control" for=""> {{ $admission->Student->name==null?$admission->Student->username:$admission->Student->name; }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="class_id" class="form-label">Class Name</label>
                                            <label class="form-control" for=""> {{ isset($admission->Class->name)?$admission->Class->name:''; }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="class_id" class="form-label">Student Level</label>
                                            <label class="form-control" for=""> {{ isset($admission->Class->type)?$admission->Class->type:''; }}</label>
                                        </div>
                                    </div>
                                    @if ($alloc1->bed_id)
                                        <div class="col-12 col-md-3">
                                            <div class="mb-3 form-group">
                                                <label for="class_id" class="form-label">Hostel</label>
                                                <label class="form-control" for=""> {{ $alloc1->Bed->Room->Floor->Building->Hostel->name }}</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($alloc1->bed_id)
                                        <div class="col-12 col-md-3">
                                            <div class="mb-3 form-group">
                                                <label for="class_id" class="form-label">Building</label>
                                                <label class="form-control" for=""> {{ $alloc1->Bed->Room->Floor->Building->name }}</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($alloc1->bed_id)
                                        <div class="col-12 col-md-2">
                                            <div class="mb-3 form-group">
                                                <label for="class_id" class="form-label">Floor</label>
                                                <label class="form-control" for="">
                                                    @switch(  $alloc1->Bed->Room->Floor->floor)  @case(0) Ground @break @case(1) First @break @case(2) Second  @break @case(3) Third @break @case(4) Fourth @break  @case(5) Fifth @break @case(6) Sixth @break  @case(7) Seventh @break @case(8) Eighth @break @case(9) Nineth @break @case(10) Tenth @break @default {{   $alloc1->Bed->Room->Floor->floor }} @endswitch Floor
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($alloc1->bed_id)
                                        <div class="col-12 col-md-2">
                                            <div class="mb-3 form-group">
                                                <label for="class_id" class="form-label">Room</label>
                                                <label class="form-control" for=""> {{  $alloc1->Bed->Room->id."-(".$alloc1->Bed->Room->label.")"; }}</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($alloc1->bed_id)
                                        <div class="col-12 col-md-1">
                                            <div class="mb-3 form-group">
                                                <label for="class_id" class="form-label">Seated</label>
                                                <label class="form-control" for=""> {{  $alloc1->Bed->Room->Seated->seated }}</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($alloc1->bed_id)
                                        <div class="col-12 col-md-1">
                                            <div class="mb-3 form-group">
                                                <label for="class_id" class="form-label">Bed ID</label>
                                                <label class="form-control" for=""> {{  $alloc1->bed_id }}</label>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-12 col-md-12">
                                        <hr>
                                            <div class="text-center h3">
                                                Allocate Bed
                                            </div>
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="hostel_id" class="form-label">Select Hostel</label>
                                            <select class="form-select @error('hostel_id') is-invalid @enderror" id="hostel_id" wire:model="hostel_id" >
                                                <option hidden >Select Hostel</option>
                                                @foreach ($hostels as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('hostel_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="building_id" class="form-label">Select Building</label>
                                            <select class="form-select @error('building_id') is-invalid @enderror" id="building_id" wire:model="building_id" >
                                                <option hidden >Select Building</option>
                                                @foreach ($buildings as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('building_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="floor_id" class="form-label">Select Floor</label>
                                            <select class="form-select @error('floor_id') is-invalid @enderror" id="floor_id" wire:model="floor_id" >
                                                <option hidden >Select Floor</option>
                                                @foreach ($floors as $item1)
                                                    <option  value="{{ $item1->id }}">
                                                        @switch($item1->floor)  @case(0) Ground @break @case(1) First @break @case(2) Second  @break @case(3) Third @break @case(4) Fourth @break  @case(5) Fifth @break @case(6) Sixth @break  @case(7) Seventh @break @case(8) Eighth @break @case(9) Nineth @break @case(10) Tenth @break @default {{ $item->floor }} @endswitch Floor
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('floor_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="room_id" class="form-label">Select Room</label>
                                            <select class="form-select @error('room_id') is-invalid @enderror" id="room_id" wire:model="room_id" >
                                                <option hidden >Select Room</option>
                                                @foreach ($rooms as $item1)
                                                    <option  value="{{ $item1->id }}">Room ID : {{ $item1->id }} - ( {{ $item1->label }} ) </option>
                                                @endforeach
                                            </select>
                                            @error('room_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="seated_id" class="form-label">Seated</label>
                                            <label for="seated_id" class="form-control  @error('seated_id') is-invalid @enderror" id="seated_id" >{{ isset($seated )? $seated." Seated":''; }} </label>
                                            @error('seated_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="fee" class="form-label">Fee Amount</label>
                                            <label for="fee"class="form-control @error('fee') is-invalid @enderror" wire:model="fee">{{ isset($fee)?$fee.' Rs.':''; }} </label>
                                            @error('fee')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="bed_id" class="form-label">Select  Bed</label>
                                            <select class="form-select @error('bed_id') is-invalid @enderror" id="bed_id" wire:model="bed_id" >
                                                <option value="" hidden>Select  Bed</option>
                                                @foreach ($beds as $item1)
                                                    <option  value="{{ $item1->id }}"> {{ $item1->id }} </option>
                                                @endforeach
                                            </select>
                                            @error('bed_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <button type="submit"  class="btn btn-primary ">Allocate Bed</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode=='exchange')
            @section('title')
                Exchange Bed
            @endsection
            <div class="row">
                <div class="col-12">
                    <div class="bg-success">
                        <div class="float-start pt-2 px-2">
                            <h2>Exchange Bed</h2>
                        </div>
                        <div class="float-end">
                            <a wire:loading class="btn btn-primary btn-sm " style="padding:10px; ">
                                <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                                <span class="visually-hidden">Loading...</span>
                            </a>
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
                            <form  wire:submit.prevent="exchangebed({{ $admission->id }})" method="post" action="" id="myForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <hr>
                                            <div class="text-center h3">
                                                First Student
                                            </div>
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="academic_year_id" class="form-label">Admission ID</label>
                                            <label  class="form-control"for="academic_year_id"> {{ $admission->id }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="academic_year_id" class="form-label">Academic Year</label>
                                            <label  class="form-control"for="academic_year_id"> {{ $admission->AcademicYear->year }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="student_id" class="form-label">Student Name</label>
                                            <label class="form-control" for="student_id"> {{ $admission->Student->name }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="class_id" class="form-label">Class Name</label>
                                            <label class="form-control" for="class_id"> {{ $admission->Class->name }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="student_level" class="form-label">Student Level</label>
                                            <label class="form-control" for="student_level">{{ $admission->Class->type}}</label>
                                        </div>
                                    </div>
                                    @if ($alloc1->bed_id)
                                        <div class="col-12 col-md-3">
                                            <div class="mb-3 form-group">
                                                <label for="class_id" class="form-label">Hostel</label>
                                                <label class="form-control" for=""> {{ $alloc1->Bed->Room->Floor->Building->Hostel->name }}</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($alloc1->bed_id)
                                        <div class="col-12 col-md-3">
                                            <div class="mb-3 form-group">
                                                <label for="Building" class="form-label">Building</label>
                                                <label class="form-control" for="Building"> {{ $alloc1->Bed->Room->Floor->Building->name }}</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($alloc1->bed_id)
                                        <div class="col-12 col-md-3">
                                            <div class="mb-3 form-group">
                                                <label for="Floor" class="form-label">Floor</label>
                                                <label class="form-control" for="Floor">
                                                    @switch(  $alloc1->Bed->Room->Floor->floor)  @case(0) Ground @break @case(1) First @break @case(2) Second  @break @case(3) Third @break @case(4) Fourth @break  @case(5) Fifth @break @case(6) Sixth @break  @case(7) Seventh @break @case(8) Eighth @break @case(9) Nineth @break @case(10) Tenth @break @default {{   $alloc1->Bed->Room->Floor->floor }} @endswitch Floor
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($alloc1->bed_id)
                                        <div class="col-12 col-md-3">
                                            <div class="mb-3 form-group">
                                                <label for="Room" class="form-label">Room</label>
                                                <label class="form-control" for="Room"> {{  $alloc1->Bed->Room->id."-(".$alloc1->Bed->Room->label.")"; }}</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($alloc1->bed_id)
                                        <div class="col-12 col-md-3">
                                            <div class="mb-3 form-group">
                                                <label for="Seated" class="form-label">Seated</label>
                                                <label class="form-control" for="Seated"> {{ $alloc1->Bed->Room->Seated->seated." Seated"; }}</label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($alloc1)
                                        <div class="col-12 col-md-3">
                                            <div class="mb-3 form-group">
                                                <label for="Fee" class="form-label">Fee</label>
                                                <label class="form-control" for="Fee">
                                                    @foreach ($alloc1->Admission->Seated->Fees as $fee)
                                                        @if ($fee->academic_year_id==$alloc1->Admission->academic_year_id)
                                                            @if ($fee->amount)
                                                                {{ $fee->amount." Rs."; }}
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($alloc1->bed_id)
                                        <div class="col-12 col-md-3">
                                            <div class="mb-3 form-group">
                                                <label for="Bed ID" class="form-label">Bed ID</label>
                                                <label class="form-control" for="Bed ID"> {{  $alloc1->bed_id }}</label>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-12 col-md-12">
                                        <hr>
                                            <div class="text-center h3">
                                                Second Student
                                            </div>
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="admissionid2" class="form-label">Admission ID</label>
                                            <input type="number"class="form-control  @error('admissionid2') is-invalid @enderror" wire:model.debounce.500ms="admissionid2">
                                            @error('admissionid2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if($admissionid2>0)
                                        @if (isset($admission2->AcademicYear->year))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="academic_year_id" class="form-label">Academic Year</label>
                                                    <label  class="form-control"for="academic_year_id"> {{ $admission2->AcademicYear->year }}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($admission2->Student->name))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="student_id" class="form-label">Student Name</label>
                                                    <label class="form-control" for="student_id"> {{ $admission2->Student->name }}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($admission2->Class->name ))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="class_id" class="form-label">Class Name</label>
                                                    <label class="form-control" for="class_id"> {{ $admission2->Class->name }}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($admission2->Class->type))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="student_level" class="form-label">Student Level</label>
                                                    <label class="form-control" for="student_level">{{ $admission2->Class->type}}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($alloc2->bed_id))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="class_id" class="form-label">Hostel</label>
                                                    <label class="form-control" for=""> {{ $alloc2->Bed->Room->Floor->Building->Hostel->name }}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($alloc2->bed_id))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="Building" class="form-label">Building</label>
                                                    <label class="form-control" for="Building"> {{ $alloc2->Bed->Room->Floor->Building->name }}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($alloc2->bed_id))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="Floor" class="form-label">Floor</label>
                                                    <label class="form-control" for="Floor">
                                                        @switch(  $alloc2->Bed->Room->Floor->floor)  @case(0) Ground @break @case(1) First @break @case(2) Second  @break @case(3) Third @break @case(4) Fourth @break  @case(5) Fifth @break @case(6) Sixth @break  @case(7) Seventh @break @case(8) Eighth @break @case(9) Nineth @break @case(10) Tenth @break @default {{   $alloc2->Bed->Room->Floor->floor }} @endswitch Floor
                                                    </label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($alloc2->bed_id))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="Room" class="form-label">Room</label>
                                                    <label class="form-control" for="Room"> {{  $alloc2->Bed->Room->id."-(".$alloc2->Bed->Room->label.")"; }}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($alloc2->bed_id))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="Seated" class="form-label">Seated</label>
                                                    <label class="form-control" for="Seated"> {{ $alloc2->Bed->Room->Seated->seated." Seated"; }}</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($alloc2))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="Fee" class="form-label">Fee</label>
                                                    <label class="form-control" for="Fee">
                                                        @foreach ($alloc2->Admission->Seated->Fees as $fee)
                                                            @if ($fee->academic_year_id==$alloc2->Admission->academic_year_id)
                                                                @if ($fee->amount)
                                                                    {{ $fee->amount." Rs."; }}
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </label>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($alloc2->bed_id))
                                            <div class="col-12 col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label for="Bed ID" class="form-label">Bed ID</label>
                                                    <label class="form-control" for="Bed ID"> {{  $alloc2->bed_id }}</label>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="col-12 col-md-12">
                                        <hr>
                                            <div class="text-center h3">
                                                <button type="submit"  class="btn btn-primary  text-center ">Exchange Bed</button>
                                            </div>
                                        <hr>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($mode="all")
            <div>
                @section('title')
                    All Allocation
                @endsection
                <div class="row">
                    <div class="col-12">
                        <div class="bg-success">
                            <div class="float-start pt-2 px-2">
                                <h2>Data Allocations</h2>
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
                                @can('Add Allocation')
                                    <a wire:loading.attr="disabled"  wire:click="setmode('add')"class="btn btn-success ">
                                        Add Allocation<span class="btn-label-right mx-2"><i class=" mdi mdi-plus-circle fw-bold"></i></span>
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
                                                <div class="col-12 col-md-2 ">
                                                    <label class="w-100 p-1  text-md-end">Search</label>
                                                </div>
                                                <div class="col-12 col-md-2 ">
                                                    <input  class="w-100" wire:model.debounce.1000ms="ad" type="search" placeholder="Admission ID ">
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <input  class="w-100" wire:model.debounce.1000ms="a" type="search" placeholder="Academic Year">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input class="w-100"  wire:model.debounce.1000ms="s" type="search" placeholder="Student Name">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input class="w-100"  wire:model.debounce.1000ms="c" type="search" placeholder="Class Name">
                                                </div>
                                            </div>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="data-table" class="table  dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>A ID</th>
                                            <th>Year</th>
                                            <th>Student Name</th>
                                            <th>Gender</th>
                                            <th>Class Name</th>
                                            <th>Seated</th>
                                            <th>Fee</th>
                                            <th>Bed</th>
                                            <th>A Status</th>
                                            @can('Allocate Bed')
                                                <th>Action</th>
                                            @elsecan('Exchange Bed')
                                                <th>Action</th>
                                            @elsecan('De Allocate Bed')
                                                <th>Action</th>
                                            @elsecan('Edit Allocation')
                                                <th>Action</th>
                                            @elsecan('Delete Allocation')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allocations as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->Admission->id }}</td>
                                                <td>{{ $item->Admission->AcademicYear->year }}</td>
                                                <td>{{ $item->Admission->Student->name ?$item->Admission->Student->name:$item->Admission->Student->username; }}</td>
                                                <td>{{ $item->Admission->Student->gender==0?"M":"F"; }}</td>

                                                <td>{{ $item->Admission->Class->name }}</td>
                                                <td>
                                                    @if (isset($item->Admission->Seated->seated))
                                                        {{ $item->Admission->Seated->seated }}
                                                    @else
                                                        NA
                                                    @endif
                                                </td>
                                                <td>

                                                    @if (isset($item->Admission->Seated->Fees))
                                                        @foreach ($item->Admission->Seated->Fees as $fee)
                                                            @if ($fee->academic_year_id==$item->Admission->academic_year_id)
                                                                @if ($fee->amount)
                                                                    {{ $fee->amount }}
                                                                @endif

                                                            @endif
                                                        @endforeach
                                                    @else
                                                        NA
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->bed_id==null)
                                                        <span class="badge bg-danger text-white">NA</span>
                                                    @else
                                                       <span class="badge bg-success mx-1 text-white">{{ $item->bed_id }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ( $item->Admission->status == '0')
                                                        <span class="badge bg-warning text-white">Wating</span>
                                                    @elseif ( $item->Admission->status == '1')
                                                        <span class="badge bg-success text-white">Confirmed</span>
                                                    @else
                                                        <span class="badge bg-danger text-white">Canceled</span>
                                                    @endif
                                                </td>
                                                @can('Allocate Bed')
                                                    <td>
                                                        @can('Allocate Bed')
                                                            <a wire:loading.attr="disabled"  wire:click="allocate({{ $item->Admission->id }})" class="btn btn-success "> @if($item->bed_id==null) <i class="mdi mdi-checkbox-marked mx-1"></i> @else <i class="mdi mdi-reload mx-1"></i>  @endif <i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('Exchange Bed')
                                                            <a wire:loading.attr="disabled" wire:click="exchange({{ $item->Admission->id }})"  class="btn btn-warning "><i class="mdi mdi-sync mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('De Allocate Bed')
                                                            <a wire:loading.attr="disabled" wire:click="deallocate({{ $item->Admission->id }})"  class="btn btn-danger "><i class="mdi mdi-close-box mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('Edit Allocation')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-primary "><i class="mdi mdi-pencil"></i></a>
                                                        @endcan
                                                        @can('Delete Allocation')
                                                            @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                        @endcan
                                                    </td>
                                                @elsecan('Exchange Bed')
                                                    <td>
                                                        @can('Allocate Bed')
                                                            <a wire:loading.attr="disabled"  wire:click="allocate({{ $item->Admission->id }})" class="btn btn-success "> @if($item->bed_id==null) <i class="mdi mdi-checkbox-marked mx-1"></i> @else <i class="mdi mdi-reload mx-1"></i>  @endif <i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('Exchange Bed')
                                                            <a wire:loading.attr="disabled" wire:click="exchange({{ $item->Admission->id }})"  class="btn btn-warning "><i class="mdi mdi-sync mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('De Allocate Bed')
                                                            <a wire:loading.attr="disabled" wire:click="deallocate({{ $item->Admission->id }})"  class="btn btn-danger "><i class="mdi mdi-close-box mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('Edit Allocation')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-primary "><i class="mdi mdi-pencil"></i></a>
                                                        @endcan
                                                        @can('Delete Allocation')
                                                            @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                        @endcan
                                                    </td>
                                                @elsecan('De Allocate Bed')
                                                    <td>
                                                        @can('Allocate Bed')
                                                            <a wire:loading.attr="disabled"  wire:click="allocate({{ $item->Admission->id }})" class="btn btn-success "> @if($item->bed_id==null) <i class="mdi mdi-checkbox-marked mx-1"></i> @else <i class="mdi mdi-reload mx-1"></i>  @endif <i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('Exchange Bed')
                                                            <a wire:loading.attr="disabled" wire:click="exchange({{ $item->Admission->id }})"  class="btn btn-warning "><i class="mdi mdi-sync mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('De Allocate Bed')
                                                            <a wire:loading.attr="disabled" wire:click="deallocate({{ $item->Admission->id }})"  class="btn btn-danger "><i class="mdi mdi-close-box mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('Edit Allocation')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-primary "><i class="mdi mdi-pencil"></i></a>
                                                        @endcan
                                                        @can('Delete Allocation')
                                                            @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                        @endcan
                                                    </td>
                                                @elsecan('Edit Allocation')
                                                    <td>
                                                        @can('Allocate Bed')
                                                            <a wire:loading.attr="disabled"  wire:click="allocate({{ $item->Admission->id }})" class="btn btn-success "> @if($item->bed_id==null) <i class="mdi mdi-checkbox-marked mx-1"></i> @else <i class="mdi mdi-reload mx-1"></i>  @endif <i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('Exchange Bed')
                                                            <a wire:loading.attr="disabled" wire:click="exchange({{ $item->Admission->id }})"  class="btn btn-warning "><i class="mdi mdi-sync mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('De Allocate Bed')
                                                            <a wire:loading.attr="disabled" wire:click="deallocate({{ $item->Admission->id }})"  class="btn btn-danger "><i class="mdi mdi-close-box mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('Edit Allocation')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-primary "><i class="mdi mdi-pencil"></i></a>
                                                        @endcan
                                                        @can('Delete Allocation')
                                                            @if ($item->deleted_at)
                                                                <a wire:loading.attr="disabled" wire:click.prevent="deleteconfirmation({{ $item->id }})"  class="btn btn-danger "><i class="mdi mdi-delete-forever"></i></a>
                                                                <a wire:loading.attr="disabled" wire:click.prevent="restore({{ $item->id }})"  class="btn btn-success "><i class="mdi mdi-backup-restore"></i></a>
                                                            @else
                                                                <a wire:loading.attr="disabled" wire:click.prevent="softdelete({{ $item->id }})"  class="btn btn-primary "><i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                        @endcan
                                                    </td>
                                                @elsecan('Delete Allocation')
                                                    <td>
                                                        @can('Allocate Bed')
                                                            <a wire:loading.attr="disabled"  wire:click="allocate({{ $item->Admission->id }})" class="btn btn-success "> @if($item->bed_id==null) <i class="mdi mdi-checkbox-marked mx-1"></i> @else <i class="mdi mdi-reload mx-1"></i>  @endif <i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('Exchange Bed')
                                                            <a wire:loading.attr="disabled" wire:click="exchange({{ $item->Admission->id }})"  class="btn btn-warning "><i class="mdi mdi-sync mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('De Allocate Bed')
                                                            <a wire:loading.attr="disabled" wire:click="deallocate({{ $item->Admission->id }})"  class="btn btn-danger "><i class="mdi mdi-close-box mx-1"></i><i class="mdi mdi-hotel"></i></a>
                                                        @endcan
                                                        @can('Edit Allocation')
                                                            <a wire:loading.attr="disabled"  wire:click="edit({{ $item->id }})" class="btn btn-primary "><i class="mdi mdi-pencil"></i></a>
                                                        @endcan
                                                        @can('Delete Allocation')
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
                                    {{ $allocations->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

