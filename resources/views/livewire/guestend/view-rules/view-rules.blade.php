<div>
    @section('title')
    Rules
    @endsection
         <!-- Header Start -->
         <div class="container-fluid bg-primary py-5 mb-5 page-header">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Rules</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route('rules') }}">More</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Rules</li>
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
                    <div class="row wow fadeInUp" data-wow-delay="0.1s">
                        <div class="col-12">
                            <div class="row  py-3 px-3">
                                <div class="col-12 col-md-12 mb-2">
                                    <div class="card">
                                        <div class="card-body bg-primary text-white">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 ">
                                                            <p class="mb-0 mt-2 fs-4 fw-bold">Rules About The Hostel</p>
                                                            <hr class="mb-1 mt-0" style="color:#36404a;">
                                                            <div class="row p-0 m-0">
                                                                <div class="col-12 mt-1 pb-2">
                                                                    <ul>
                                                                        @foreach ($rules as $key =>  $r)
                                                                        <li class="m-2 lh-lg" style="list-style-type: square; fs-5; fw-bold;">{{ $r->description }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
</div>
