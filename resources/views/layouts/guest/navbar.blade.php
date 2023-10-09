
 <!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"> {{ preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel'))  }}</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto p-4 p-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('notice') }}">Notice</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link " href="#" id="navbarDarkDropdownMenuLink" >
                  More <i class=" fw-bold mdi mdi-menu-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{ route('rules') }}">Rules</a></li>
                  <li><a class="dropdown-item" href="{{ route('enquiry') }}">Enquiry</a></li>
                  <li><a class="dropdown-item" href="{{ route('gallery') }}">Gallery</a></li>
                  <li><a class="dropdown-item" href="{{ route('meritlist') }}">Merit Form</a></li>
                  <li><a class="dropdown-item" href="{{ route('viewmeritlist') }}">Merit List</a></li>
                  <li><a class="dropdown-item" href="{{ route('team') }}">Team</a></li>
                </ul>
            </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @auth('admin')
                <li class="nav-item dropdown ">
                    <a class="nav-link " href="#" id="navbarDarkDropdownMenuLink" >
                        {{ Auth::guard('admin')->user()->name }} <i class=" fw-bold mdi mdi-menu-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li>
                            <a data-turbolinks="false" class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                               Admin Logout
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.login') }}" >Admin Login</a>
                </li>
            @endauth
            @auth('student')
                <li class="nav-item dropdown ">
                    <a class="nav-link " href="#" id="navbarDarkDropdownMenuLink" >
                        {{ Auth::user()->username }} <i class=" fw-bold mdi mdi-menu-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li>
                            <a data-turbolinks="false" class="dropdown-item" href="{{ route('student.dashboard') }}">Dashboard</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('student.logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('student.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
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
