<!-- Navbar -->
<nav class="navbar default-layout-navbar navbar-bg col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center navbar-bg">
        <a class="fs-1 navbar-brand brand-logo fw-bold text-white"
            href="{{ route('home') }}">{{ preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel')) }} </a>
        <a class=" navbar-brand brand-logo-mini" href="{{ route('home') }}"><img
                src="{{ asset('assets/logo/scolerstay_sm.png') }}" alt="logo" style="height:50px;width:50px;" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler fw-bold  text-white align-self-center" type="button"
            data-toggle="minimize">
            <span class="mdi mdi-menu text-white display-4 "></span>
        </button>
        {{-- <div class="search-field d-none d-xl-block">
        <form class="d-flex align-items-center h-100" action="#">
          <div class="input-group">
            <div class="input-group-prepend bg-transparent">
              <i class="input-group-text border-0 mdi mdi-magnify"></i>
            </div>
            <input type="text" class="form-control bg-transparent border-0" placeholder="Search products">
          </div>
        </form>
      </div> --}}
        <ul class="navbar-nav navbar-nav-right text-white">
            <!-- <li class="nav-item  dropdown d-none d-md-block">
          <a class="nav-link dropdown-toggle" id="reportDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Reports </a>
          <div class="dropdown-menu navbar-dropdown" aria-labelledby="reportDropdown">
            <a class="dropdown-item" href="#">
              <i class="mdi mdi-file-pdf me-2"></i>PDF </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <i class="mdi mdi-file-excel me-2"></i>Excel </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <i class="mdi mdi-file-word me-2"></i>doc </a>
          </div>
        </li> -->
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="{{ !empty(auth()->guard('admin')->user()->photo)? asset(auth()->guard('admin')->user()->photo): asset('assets/images/no_image.jpg') }}"
                            alt="image">
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1  mx-3">{{ auth()->guard('admin')->user()->name }}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                    aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                    <div class="p-2">
                        {{-- <h5 class="dropdown-header  ps-2 text-dark">
                            @foreach (auth()->guard('admin')->user()->getRoleNames() as $item)
                                {{ $item }}
                            @endforeach Options
                        </h5>
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                            <span>Profile</span>
                            <span class="p-0">
                                <i class="mdi mdi-account-outline ms-1"></i>
                            </span>
                        </a> --}}
                        {{-- <div role="separator" class="dropdown-divider"></div> --}}
                        <h5 class="dropdown-header   ps-2 text-dark mt-2">Actions</h5>
                        {{-- <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                            <span>Password Change</span>
                            <i class="mdi mdi-lock ms-1"></i>
                        </a> --}}
                        <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                            @csrf
                            <button class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                onclick="event.preventDefault(); this.closest('form').submit();" type="submit">
                                <span>Log Out</span><i class="mdi mdi-logout ms-1"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </li>
            {{-- <li class="nav-item dropdown ">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                    data-bs-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count-symbol bg-danger"></span>
                </a>
                <div class="dropdown-menu  navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">
                    <h6 class="p-3 mb-0 bg-primary text-white py-4">Notifications</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="mdi mdi-calendar"></i>
                            </div>
                        </div>
                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                            <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                </div>
            </li> --}}
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
<!-- navbar End -->
