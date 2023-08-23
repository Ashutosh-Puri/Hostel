<div>
    @section('title')
        Home
    @endsection

    <section name="Header">
        Header
    </section>
    <section name="Navbar">
        Navbar
    </section>
    <section name="body">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-8 p-4 bg-danger">
                        <div class="row">
                            <div class="col-12 p-0">
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('assets/images/1.jpg') }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/images/2.jpg') }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/images/3.jpg') }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 p-0">
                                <div class="py-4 ">
                                    <div class="">
                                        <div class="row g-4">
                                            <div class="col-md-3 col-6 ">
                                                <a href="{{ route('home') }}" class="text-decoration-none">
                                                    <div class="card border border-2 border-dark text-center pt-3">
                                                        <div class="p-4">
                                                            <i class="mdi mdi-home  display-1 text-primary mb-4"></i>
                                                            <h5 class="mb-3"> max 8 cards</h5>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-6 ">
                                                <a href="{{ route('home') }}" class="text-decoration-none">
                                                    <div class="card border border-2 border-dark text-center pt-3">
                                                        <div class="p-4">
                                                            <i class="mdi mdi-home  display-1 text-primary mb-4"></i>
                                                            <h5 class="mb-3">Skilled Instructors</h5>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-6 ">
                                                <a href="{{ route('home') }}" class="text-decoration-none">
                                                    <div class="card border border-2 border-dark text-center pt-3">
                                                        <div class="p-4">
                                                            <i class="mdi mdi-home  display-1 text-primary mb-4"></i>
                                                            <h5 class="mb-3">Skilled Instructors</h5>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-6 ">
                                                <a href="{{ route('home') }}" class="text-decoration-none">
                                                    <div class="card border border-2 border-dark text-center pt-3">
                                                        <div class="p-4">
                                                            <i class="mdi mdi-home  display-1 text-primary mb-4"></i>
                                                            <h5 class="mb-3">Skilled Instructors</h5>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-6 ">
                                                <a href="{{ route('home') }}" class="text-decoration-none">
                                                    <div class="card border border-2 border-dark text-center pt-3">
                                                        <div class="p-4">
                                                            <i class="mdi mdi-home  display-1 text-primary mb-4"></i>
                                                            <h5 class="mb-3">Skilled Instructors</h5>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-6 ">
                                                <a href="{{ route('home') }}" class="text-decoration-none">
                                                    <div class="card border border-2 border-dark text-center pt-3">
                                                        <div class="p-4">
                                                            <i class="mdi mdi-home  display-1 text-primary mb-4"></i>
                                                            <h5 class="mb-3">Skilled Instructors</h5>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-6 ">
                                                <a href="{{ route('home') }}" class="text-decoration-none">
                                                    <div class="card border border-2 border-dark text-center pt-3">
                                                        <div class="p-4">
                                                            <i class="mdi mdi-home  display-1 text-primary mb-4"></i>
                                                            <h5 class="mb-3">Skilled Instructors</h5>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-6 ">
                                                <a href="{{ route('home') }}" class="text-decoration-none">
                                                    <div class="card border border-2 border-dark text-center pt-3">
                                                        <div class="p-4">
                                                            <i class="mdi mdi-home  display-1 text-primary mb-4"></i>
                                                            <h5 class="mb-3">Skilled Instructors</h5>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 p-1 bg-success">
                        <div class="card p-1">
                            <span class="card-title text-center m-0 p-0 ">Notices</span>
                            <div class="card-body px-2 py-0">
                                <div class="list-group p-0 m-0">
                                    <a href="#" class="list-group-item list-group-item-action">limit 25 max paginate</a>
                                    <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                  </div>
                              </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
    </section>
    <section>
        {{-- <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s"
            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Quick Link</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms &amp; Condition</a>
                        <a class="btn btn-link" href="">FAQs &amp; Help</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Gallery</h4>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Newsletter</h4>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Your email">
                            <button type="button"
                                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            © <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                            Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
@section('styles')
<style>
    .footer .a:link, a:vlink{
        color: #fff;
        text-decoration: none;
    }
</style>
@endsection
        <div class="container-fluid text-center text-light text-lg-start bg-dark mt-auto py-2">
            <div class="container py-3">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-4">Our Office</h4>
                        <p class="mb-1 nav-link"><i class="fa fa-map-marker-alt me-3"></i>Near Sai Amrut Petrolium</p>
                        <p class="mb-1 nav-link"><i class="fa fa-phone-alt me-3"></i>9373545745</p>
                        <p class="mb-1 nav-link"><i class="fa fa-envelope me-3"></i>cmdsofts@gmail.com</p>
                        {{-- <p class="mb-2 nav-link"><i class="fa fa-envelope me-3"></i>www.sangamnercollege.edu.in</p> --}}
                        {{-- <div class="p-2  nav-link">
                            <a class="btn btn-square btn-outline-light rounded-circle me-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="btn btn-square btn-outline-light rounded-circle me-2" href="">
                                <i class="fab fa-github"></i>
                            </a>
                            <a class="btn btn-square btn-outline-light rounded-circle me-2" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a class="btn btn-square btn-outline-light rounded-circle me-2" href="">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div> --}}

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-4">Quic Links</h4>
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                        <a class="nav-link" href="{{ url('productlist') }}">Products</a>
                        <a class="nav-link" href="{{ url('register') }}">Register</a>

                        {{-- <a class="nav-link" href="{{ url('unsubscribe') }}">Unsubscribe Newsletter</a> --}}

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-4">Quic Links</h4>
                        <a class="nav-link" href=" {{ url('aboutus') }}">About Us</a>
                        <a class="nav-link" href="{{ url('contactus') }}">Contact Us</a>
                        <a class="nav-link" href="{{ url('orders') }}">My Orders</a>
                        {{-- <a class="nav-link" href="{{ url('wishlist') }}">Wishlist</a> --}}

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-4">Newsletter</h4>
                        <p>Subscribe To Our Newsletter To Recive Recent Updates.</p>
                        <div class="position-relative w-100">
                            <form action="{{ url('subscribe') }}" method="post">
                                @csrf
                                 <input class="form-control bg-white border-0 w-100 py-3 ps-4 pe-5 @error('email')
                                  is-invalid
                                 @enderror" type="email" value="{{ old('email') }}"
                                    name="email" placeholder="Your Email" autocomplete="email">
                                <button type="submit"
                                    class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Subscribe</button>
                                @error('email')
                                     <small class="text-danger"> {{ $message }}</small>
                                @enderror
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
    </section>
</div>
