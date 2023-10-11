<div>
    @section('title')
    Student Merit List
    @endsection
         <!-- Header Start -->
         <div class="container-fluid bg-primary py-5 mb-5 page-header">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Merit List {{ now()->format('Y') }}-{{ now()->format('y')+1 }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route('enquiry') }}">More</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Merit List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-12 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-primary text-center pt-3">
                            <div class="p-4">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-borderless table-primary align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Student Name</th>
                                                <th>Class Name</th>
                                                <th>Percentage</th>
                                                <th>Gender</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                @foreach ($meritlist as $key => $item)
                                                <tr class="table-primary" >
                                                    <td scope="row">{{ $key+1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->class }}</td>
                                                    <td>{{ $item->percentage }}</td>
                                                    <td>{{ $item->gender==0?'Male':'Female'; }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $meritlist->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

</div>

