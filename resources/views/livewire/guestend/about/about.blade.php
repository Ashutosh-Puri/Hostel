<div>
    @section('title')
    About
    @endsection
         <!-- Header Start -->
         <div class="container-fluid bg-primary py-5 mb-5 page-header">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">About</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


       <!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('assets/guest_template/img/about-1.jpg') }}" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">About</h6>
                <h1 class="mb-4">Welcome to Scoler Stay</h1>
                <p class="mb-4">The hostel at our college is more than just a place to reside; it's a vibrant hub of student life. Nestled on the campus grounds, it provides students with comfortable rooms and inviting shared spaces where lasting friendships are forged over late-night study sessions and laughter-filled evenings.</p>
                        <p class="mb-4">Our college hostel is more than just a place to sleep; it's a second home, offering the necessary support for academic and personal growth. It fosters a strong sense of community, creating memories and bonds among its students.</p>
                        <div class="row gy-2 gx-4 mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>CCTV surveillance</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Safety Measures</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Study Spaces</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24 X 7 Electricity</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Support Staff</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Guest Policy</p>
                            </div>
                        </div>
                {{-- <a class="btn btn-primary py-3 px-5 mt-2" href={{route('about')}}>Read More</a> --}}
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3 mb-5">Staff</h6>
        </div>
        <div class="row g-4">
           @foreach ($staff as $data )
           @php
                $roleNames = $data->getRoleNames();
                if($roleNames[0] == 'Super Admin')
                continue;
            @endphp
           <div class="col-lg-3 mx-auto col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item bg-light">
                <div class="overflow-hidden text-center">
                    @if (isset($data->photo))
                    <img class="img-fluid mt-5" style="height:224px; width:224px; border:1px solid #000;" src={{asset($data->photo)}} alt="">
                    @else
                    <img class="img-fluid mt-5" style="height:224px; width:224px; border:1px solid #000;" src={{asset('assets/images/no_image.jpg')}} alt="">
                    @endif
                </div>
                <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                </div>
                <div class="text-center p-4">
                    <h5 class="mb-0">{{$data->name}}</h5>
                    <small>{{ $roleNames[0] }}</small>
                </div>
            </div>
        </div>
           @endforeach
        </div>
    </div>
</div>
<!-- Team End -->

</div>
