<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5  wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Quick Link</h4>
                <a class="btn btn-link " href="{{ route('about') }}"><span class="mdi mdi-chevron-right"></span>About</a>
                <a class="btn btn-link" href="{{ route('contact') }}"><span class="mdi mdi-chevron-right"></span>Contact</a>
                <a class="btn btn-link" href="{{ route('notice') }}"><span class="mdi mdi-chevron-right"></span>Notice</a>
                {{-- <a class="btn btn-link" href="#"><span class="mdi mdi-chevron-right"></span>Privacy Policy</a>
                <a class="btn btn-link" href="#"><span class="mdi mdi-chevron-right"></span>Terms & Condition</a>
                <a class="btn btn-link" href="#"><span class="mdi mdi-chevron-right"></span>FAQs & Help</a> --}}
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Quick Link</h4>
                {{-- <a class="btn btn-link" href="{{ route('admin.login') }}"><span class="mdi mdi-chevron-right"></span>Admin Login</a> --}}
                <a class="btn btn-link" href="{{ route('rules') }}"><span class="mdi mdi-chevron-right"></span>Rules</a>
                <a class="btn btn-link" href="{{ route('gallery') }}"><span class="mdi mdi-chevron-right"></span>Gallery</a>
                <a class="btn btn-link" href="{{ route('team') }}"><span class="mdi mdi-chevron-right"></span>Team</a>
            </div>
            <div class="col-lg-3 col-md-6">
                @php
                    $collegeData = App\Models\College::where('id',1)->first();
                @endphp
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="mdi mdi-map-marker me-2"></i>
                    @if(isset($collegeData->address))
                    {{ $collegeData->address }}
                    @endif
                </p>
                <p class="mb-2"><i class="mdi mdi-phone me-2"></i>
                    @if(isset($collegeData->mobile))
                    {{ $collegeData->mobile }}
                    @endif
                </p>
                <p class="mb-2"><i class="mdi mdi-gmail me-2"></i>
                    @if(isset($collegeData->email))
                    {{ $collegeData->email }}
                    @endif
                </p>
                {{-- <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="mdi mdi-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="mdi mdi-facebook"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="mdi mdi-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="mdi mdi-linkedin"></i></a>
                </div> --}}
            </div>
            <div class="col-lg-3 col-md-6">
                <img class="img-fluid" stle="height:200px; width:200px" src="{{ asset('assets/guest_template/img/about-1.jpg') }}" alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" target="_blank" href="http://cmdsoft.rf.gd">CMDSoft</a>, All Right Reserved.
                    Designed By <a class="border-bottom" target="_blank" href="http://cmdsoft.rf.gd">Ashutosh Puri</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('home') }}">Home</a>
                        <a data-turbolinks="false" href="{{ route('admin.login') }}">Admin Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
