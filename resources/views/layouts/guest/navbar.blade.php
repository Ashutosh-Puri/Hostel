
 <!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"> {{ preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel'))  }}</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto p-4 p-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('notice')) ? 'active' : '' }}" href="{{ route('notice') }}">Notice</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('contact')) ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link {{ (request()->is('rules') || request()->is('enquiry') || request()->is('gallery') || request()->is('meritform') || request()->is('meritlist') || request()->is('team')) ? 'active' : '' }}"  data-toggle="dropdown" href="#" id="navbarDarkDropdownMenuLink" >
                  More <i class=" fw-bold mdi mdi-menu-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item {{ (request()->is('rules')) ? 'active' : '' }}" href="{{ route('rules') }}">Rules</a></li>
                  <li><a class="dropdown-item {{ (request()->is('enquiry')) ? 'active' : '' }}" href="{{ route('enquiry') }}">Enquiry</a></li>
                  <li><a class="dropdown-item {{ (request()->is('gallery')) ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a></li>
                  <li><a class="dropdown-item {{ (request()->is('meritform')) ? 'active' : '' }}" href="{{ route('meritform') }}">Merit Form</a></li>
                  <li><a class="dropdown-item {{ (request()->is('meritlist')) ? 'active' : '' }}" href="{{ route('meritlist') }}">Merit List</a></li>
                  <li><a class="dropdown-item {{ (request()->is('team')) ? 'active' : '' }}" href="{{ route('team') }}">Team</a></li>
                  <li><a class="dropdown-item {{ (request()->is('scan')) ? 'active' : '' }}" href="{{ route('scan') }}">Scan</a></li>
                </ul>
            </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @auth('admin')
                <li class="nav-item dropdown ">
                    <a class="nav-link " href="#" id="navbarDarkDropdownMenuLink" data-toggle="dropdown">
                        {{ Auth::guard('admin')->user()->name }} <i class=" fw-bold mdi mdi-menu-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li>
                            <a data-turbolinks="false" class="dropdown-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ (request()->is('admin/logout')) ? 'active' : '' }}" href="{{ route('admin.logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
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
                    <a class="nav-link {{ (request()->is('admin/login')) ? 'active' : '' }}" href="{{ route('admin.login') }}" >Admin Login</a>
                </li>
            @endauth
            @auth('student')
                <li class="nav-item dropdown ">
                    <a class="nav-link " href="#" id="navbarDarkDropdownMenuLink" data-toggle="dropdown">
                        {{ Auth::user()->username }} <i class=" fw-bold mdi mdi-menu-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li>
                            <a data-turbolinks="false" class="dropdown-item {{ (request()->is('student/dashboard')) ? 'active' : '' }}" href="{{ route('student.dashboard') }}">Dashboard</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ (request()->is('student/logout')) ? 'active' : '' }}" href="{{ route('student.logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
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
                        <a class="nav-link {{ (request()->is('student/login')) ? 'active' : '' }}" href="{{ route('student.login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                @if (Route::has('student.register'))
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('student/register')) ? 'active' : '' }}" href="{{ route('student.register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @endauth
        </ul>
    </div>
</nav>
