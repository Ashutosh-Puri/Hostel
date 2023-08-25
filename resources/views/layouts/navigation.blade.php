
<nav class="navbar navbar-expand-md navbar-dark  shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          hello  {{ preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel'))  }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            ok
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                rgojj
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('gallery') }}">{{ __('Gallery') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('enquiry') }}">{{ __('Enquiry') }}</a>
                </li> --}}
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                hrlloij
            
                    <li class="nav-item">
                        admin d  {{--  <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Admin Dashboard') }}</a> --}}
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{-- {{ Auth::guard('admin')->user()->name }} --}} admin name
                        </a>
                        {{-- <div class="dropdown-menu dropdown-menu-end z-index-5" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Admin Logout') }}
                            </a>
                
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div> --}}
                    </li>
              
                    <li class="nav-item text-dark">
                        hello
                        {{-- <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Admin Login') }}</a> --}}
                    </li>
                    @auth('student')
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::gurd('student')->user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                    
                
                
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li><li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                
            </ul>
        </div>
    </div>
</nav>
