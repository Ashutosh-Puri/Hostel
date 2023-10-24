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
                        <img src="{{ asset('assets/images/no_image.jpg') }}" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{ $student->name }}</h5>
                        <p class="text-muted mb-1">{{ $student->member_id }}</p>
                        <p class="text-muted mb-4">{{ $student->email }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="mb-0 text-center">Student Information</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">ID</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $student->id }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mobile</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $student->mobile }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Gender</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $student->gender == 0 ? 'Male' : 'Female' }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Cast</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $student->cast->name }} -
                                    {{ $student->cast->category->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4">

                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="mb-0 text-center">Parent Details</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Name</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted mb-0">{{ $student->parent_name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted mb-0">{{ $student->parent_mobile }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted mb-0">{{ $student->parent_address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="mb-0 text-center">Local Parent Details</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Name</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted mb-0">{{ $student->local_parent_name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted mb-0">{{ $student->local_parent_mobile }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted mb-0">{{ $student->local_parent_address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card mb-4">
                    <div class="card-body py-4">
                        @if ($bed->id)
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="mb-0 text-center">Hostel Information</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Bed ID</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $bed->id }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Room ID</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $bed->Room->id }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Floor</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        @switch($bed->Room->Floor->floor)
                                            @case(0)
                                                Ground
                                            @break

                                            @case(1)
                                                First
                                            @break

                                            @case(2)
                                                Second
                                            @break

                                            @case(3)
                                                Third
                                            @break

                                            @case(4)
                                                Fourth
                                            @break

                                            @case(5)
                                                Fifth
                                            @break

                                            @case(6)
                                                Sixth
                                            @break

                                            @case(7)
                                                Seventh
                                            @break

                                            @case(8)
                                                Eighth
                                            @break

                                            @case(9)
                                                Nineth
                                            @break

                                            @case(10)
                                                Tenth
                                            @break

                                            @default
                                                {{ $bed->Room->Floor->floor }}
                                        @endswitch
                                        Floor
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Room</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $bed->Room->label }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Building</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $bed->Room->Floor->Building->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Hostel</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $bed->Room->Floor->Building->Hostel->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">College</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-3">
                                        {{ $bed->Room->Floor->Building->Hostel->College->name }}</p>
                                </div>
                            </div>
                        @else
                            <div>{{ now()->format('Y') . ' In This year room is not allocated' }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

