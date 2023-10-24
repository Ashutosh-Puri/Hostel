<div>
    @section('title')
    Student Dashboard
    @endsection
    <style>
        /* Custom CSS for Bootstrap 5 Card */
        /* Style the card container */
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            background-color: #36404a;
        }

        .card:hover {
            transform: scale(1.02);
        }

        /* Style the card image */
        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        /* Style the card title */
        .card-title {
            font-size: 1.25rem;
            margin: 0;
        }

        /* Style the card text */
        .card-text {
            font-size: 1rem;
            color: #666;
        }

        /* Add space between multiple cards */
        .card+.card {
            margin-top: 20px;
        }
    </style>
    <h6>Hello, {{ auth()->user()->username }}, Welcome To Dashboard</h6>

    <section>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card mb-4 bg-sidebar">
                    <div class="card-body text-center py-5">
                        <img src="{{ asset($student->photo!=null?$student->photo:'assets/images/no_image.jpg') }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height:150px;">
                        <h5 class="my-3">{{ $student->username }}</h5>
                        <p class="text-muted mb-1">{{ $student->name}}</p>
                        <p class="text-muted mb-1">{{ $student->mobile }}</p>
                        <p class="text-muted mb-1">{{ $student->email }}</p>
                        <p class="text-muted mb-2">{{ $student->status==0?"Active":'In-Active'; }}</p>
                    </div>
                </div>
            </div>
            @if ($student->member_id)
                <div class="col-12 col-md-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-0 text-center">Student Details</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <hr>
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="mb-0">Student ID</p>
                                        </div>
                                        <div class="col-7">
                                            <p class="text-muted mb-0">{{ $student->id }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <hr>
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="mb-0">Member ID</p>
                                        </div>
                                        <div class="col-7">
                                            <p class="text-muted mb-0">{{ $student->member_id }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="mb-0">RFID</p>
                                        </div>
                                        <div class="col-7">
                                            <p class="text-muted mb-0">{{ $student->rfid }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="mb-0">Blood Group</p>
                                        </div>
                                        <div class="col-7">
                                            <p class="text-muted mb-0">{{ $student->blood_group }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="mb-0">Gender</p>
                                        </div>
                                        <div class="col-7">
                                            <p class="text-muted mb-0">
                                                @if ($student->gender!==null)
                                                {{ $student->gender == 0 ? 'Male' : 'Female' }}
                                                    
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="mb-0">DOB</p>
                                        </div>
                                        <div class="col-7">
                                            <p class="text-muted mb-0">
                                                @if ($student->dob)
                                                    {{ date('d-m-Y',strtotime($student->dob)) }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="mb-0">Cast</p>
                                        </div>
                                        <div class="col-7">
                                            <p class="text-muted mb-0">
                                                @if ( $student->cast_id)
                                                    {{ $student->cast->name }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="mb-0">Category</p>
                                        </div>
                                        <div class="col-7">
                                            <p class="text-muted mb-0">
                                                @if ( $student->cast_id)
                                                    {{ $student->cast->category->name }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="mb-0">Allergy</p>
                                        </div>
                                        <div class="col-7">
                                            <p class="text-muted mb-0">{{ $student->is_allergy }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="mb-0">Last Login</p>
                                        </div>
                                        <div class="col-7">
                                            <p class="text-muted mb-0">{{ date('d-m-Y h:m:s A',strtotime($student->last_login)) }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @if ($student->member_id)
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-0 text-center">Parent Details</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class=" col-4">
                                    <p class="mb-0">Name</p>
                                </div>
                                <div class="col-8">
                                    <p class="text-muted mb-0">{{ $student->parent_name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-8">
                                    <p class="text-muted mb-0">{{ $student->parent_mobile }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-8">
                                    <p class="text-muted mb-0">{{ $student->parent_address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-0 text-center">Local Parent Details</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <p class="mb-0">Name</p>
                                </div>
                                <div class="col-8">
                                    <p class="text-muted mb-0">{{ $student->local_parent_name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-8">
                                    <p class="text-muted mb-0">{{ $student->local_parent_mobile}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-8">
                                    <p class="text-muted mb-0">{{ $student->local_parent_address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="card mb-4">
                        <div class="card-body py-4">
                            @if (isset($bed->id))
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-0 text-center">Hostel Details</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <p class="mb-0">College</p>
                                </div>
                                <div class="col-9">
                                    <p class="text-muted mb-3">{{ $bed->Room->Floor->Building->Hostel->College->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <p class="mb-0">Hostel</p>
                                </div>
                                <div class="col-9">
                                    <p class="text-muted mb-0">{{ $bed->Room->Floor->Building->Hostel->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <p class="mb-0">Building</p>
                                </div>
                                <div class="col-9">
                                    <p class="text-muted mb-0">{{ $bed->Room->Floor->Building->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <p class="mb-0">Floor</p>
                                </div>
                                <div class="col-9">
                                    <p class="text-muted mb-0">@switch($bed->Room->Floor->floor) @case(0) Ground @break @case(1) First @break @case(2) Second @break @case(3) Third @break @case(4) Fourth @break @case(5) Fifth @break  @case(6) Sixth @break @case(7) Seventh @break @case(8) Eighth @break @case(9) Nineth @break @case(10) Tenth @break @default {{ $bed->Room->Floor->floor }} @endswitch Floor</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <p class="mb-0">Room</p>
                                </div>
                                <div class="col-9">
                                    <p class="text-muted mb-0">{{ $bed->Room->id }} - ( {{ $bed->Room->label }} )</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <p class="mb-0">Bed ID</p>
                                </div>
                                <div class="col-9">
                                    <p class="text-muted mb-0">{{ $bed->id }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <p class="mb-4 text-center">Thank You.....!</p>
                                </div>
                            </div>
                            @else
                                <div>{{ now()->format('Y') . ' In This Year Room Is Not Allocated .' }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
</div>