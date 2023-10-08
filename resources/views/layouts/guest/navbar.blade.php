
 <!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"> {{ preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel'))  }}</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto p-4 p-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('gallery') }}">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('enquiry') }}">Enquiry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('about') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('contact') }}">Contact</a>
            </li>
            <li class="nav-item dropdown">
                
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
               
            </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @auth('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Admin Dashboard') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::guard('admin')->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end my-2" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Admin Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Admin Login') }}</a>
                </li>
            @endauth
            @auth('student')
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('student.logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('student.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @else
                @if (Route::has('student.login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('student.register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @endauth
        </ul>
    </div>
</nav>
