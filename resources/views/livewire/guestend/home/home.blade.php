<div>
    @section('title')
        Home
    @endsection
    <section name="body">
        <!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('assets/guest_template/img/carousel-1.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h2 class="text-primary text-uppercase mb-3 animated slideInDown">Your Home Away from Home: Where College Life Thrives!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('assets/guest_template/img/carousel-2.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h2 class="text-primary text-uppercase mb-3 animated slideInDown">Hostel Living: Where Bonds Blossom and Dreams Take Flight!</h2></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


 <!-- Service Start -->
 <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <a href="{{ route('rules') }}">
                        <div class="p-4">
                            <i class="mdi mdi-note-text text-primary mb-4" style="font-size: 3em;"></i>
                            <h5 class="mb-3">Rules</h5>
                            <p>College hostel rules are guidelines that promote a safe living environment for students.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <a href="{{ route('notice') }}">
                        <div class="p-4">
                            <i class="mdi mdi-bulletin-board text-primary mb-4" style="font-size: 3em;"></i>
                            <h5 class="mb-3">Notices</h5>
                            <p>Hostel notices provide important updates and information to keep residents informed.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <a href="{{ route('gallery') }}">
                        <div class="p-4">
                            <i class="mdi mdi-picture-in-picture-bottom-right text-primary mb-4" style="font-size: 3em;"></i>
                            <h5 class="mb-3">Photo Gallery</h5>
                            <p>Hostel gallery showcases memorable moments within our vibrant hostel community.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <a href="{{ route('team') }}">
                        <div class="p-4">
                            <i class="mdi mdi-account-group text-primary mb-4" style="font-size: 3em;"></i>
                            <h5 class="mb-3">Team</h5>
                            <p>Our system team enhancing the students experience with innovative technology.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


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
                <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
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
                <a class="btn btn-primary py-3 px-5 mt-2" href={{route('about')}}>Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Categories Start -->
{{-- <div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3 mb-4">Facilities</h6>
        </div>
        <div class="row g-3">
            <div class="col-lg-7 col-md-6">
                <div class="row g-3">
                    <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                        <a class="position-relative d-block overflow-hidden" href="">
                            <img class="img-fluid" src="{{asset('assets/guest_template/img/cat-1.jpg')}}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">Comfy Beds</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                        <a class="position-relative d-block overflow-hidden" href="">
                            <img class="img-fluid" src="{{asset('assets/guest_template/img/cat-2.jpg')}}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">Study Areas</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                        <a class="position-relative d-block overflow-hidden" href="">
                            <img class="img-fluid" src="{{asset('assets/guest_template/img/cat-3.jpg')}}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">Gym</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                <a class="position-relative d-block h-100 overflow-hidden" href="">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{asset('assets/guest_template/img/cat-4.jpg')}}" alt="" style="object-fit: cover;">
                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                        <h5 class="m-0">Library</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div> --}}
<!-- Categories Start -->


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
            <div class="team-item bg-light ">
                <div class="overflow-hidden text-center">
                    @if (isset($data->photo))
                    <img class="img-fluid  mt-5" style="height:224px; width:224px; border:1px solid #000;" src={{asset($data->photo)}} alt="">
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
    </section>
</div>
