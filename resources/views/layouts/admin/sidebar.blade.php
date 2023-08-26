<!-- Sidebar Start -->
<div class="sidebar-bg">
  <nav class=" sidebar-bg text-white sidebar vh-100 sidebar-offcanvas overflow-scroll " id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-category">Navigation</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <span class="icon-bg"><i class="mdi mdi-view-dashboard-outline menu-icon"></i></span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Main</li>
      @can('Access Academic Year')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_academic_year') }}">
            <span class="icon-bg"><i class="mdi mdi-calendar-today menu-icon"></i></span>
            <span class="menu-title">Academic Year's</span>
          </a>
        </li>
      @endcan
      @can('Access Admission')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_admission') }}">
            <span class="icon-bg"><i class="mdi mdi-bulletin-board menu-icon"></i></span>
            <span class="menu-title">Admission's</span>
          </a>
        </li>
      @endcan
      @can('Access Allocation')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_allocation') }}">
            <span class="icon-bg"><i class="mdi mdi-arrange-send-to-back menu-icon"></i></span>
            <span class="menu-title">Allocation's</span>
          </a>
        </li>
      @endcan
      @can('Access Class')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_class') }}">
            <span class="icon-bg"><i class="mdi mdi-google-classroom menu-icon"></i></span>
            <span class="menu-title">Class's</span>
          </a>
        </li>
      @endcan
      @can('Access Quota')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_quota') }}">
            <span class="icon-bg"><i class="mdi mdi-codepen menu-icon"></i></span>
            <span class="menu-title">Quota's</span>
          </a>
        </li>
      @endcan
      @can('Access College')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_college') }}">
            <span class="icon-bg"><i class="mdi mdi mdi-city menu-icon"></i></span>
            <span class="menu-title">College's</span>
          </a>
        </li>
      @endcan
      @can('Access Hostel')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_hostel') }}">
            <span class="icon-bg"><i class="mdi mdi-hospital-building menu-icon"></i></span>
            <span class="menu-title">Hostel's</span>
          </a>
        </li>
      @endcan
      @can('Access Building')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_building') }}">
            <span class="icon-bg"><i class="mdi mdi-office-building menu-icon"></i></span>
            <span class="menu-title">Building's</span>
          </a>
        </li>
      @endcan
      @can('Access Floor')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_floor') }}">
            <span class="icon-bg"><i class="mdi mdi-office-building menu-icon"></i></span>
            <span class="menu-title">Floor's</span>
          </a>
        </li>
      @endcan
      @can('Access Seated')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_seated') }}">
            <span class="icon-bg"><i class="mdi mdi-office-building menu-icon"></i></span>
            <span class="menu-title">Seated's</span>
          </a>
        </li>
      @endcan
      @can('Access Fee')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_fee') }}">
            <span class="icon-bg"><i class="mdi mdi-cash menu-icon"></i></span>
            <span class="menu-title">Fee's</span>
          </a>
        </li>
      @endcan
      @can('Access Room')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_room') }}">
            <span class="icon-bg"><i class="mdi  mdi mdi-domain menu-icon"></i></span>
            <span class="menu-title">Room's</span>
          </a>
        </li>
      @endcan
      @can('Access Bed')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_bed') }}">
            <span class="icon-bg"><i class="mdi mdi-hotel menu-icon"></i></span>
            <span class="menu-title">Bed's</span>
          </a>
        </li>
      @endcan
      @can('Access Facility')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_facility') }}">
            <span class="icon-bg"><i class="mdi mdi-webhook menu-icon"></i></span>
            <span class="menu-title">Facility's</span>
          </a>
        </li>
      @endcan
      @can('Access Student Fine')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_student_fine') }}">
            <span class="icon-bg"><i class="mdi mdi-cash-multiple menu-icon"></i></span>
            <span class="menu-title">Student Fine's</span>
          </a>
        </li>
      @endcan
      @can('Access Fine')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_fine') }}">
            <span class="icon-bg"><i class="mdi mdi-cash-100 menu-icon"></i></span>
            <span class="menu-title">Fine's</span>
          </a>
        </li>
      @endcan
      @can('Access Notice')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_notice') }}">
            <span class="icon-bg"><i class="mdi mdi-information-outline menu-icon"></i></span>
            <span class="menu-title">Notice's</span>
          </a>
        </li>
      @endcan
      @can('Access Photo Gallery')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_photogallery') }}">
            <span class="icon-bg"><i class="mdi mdi-google-photos menu-icon"></i></span>
            <span class="menu-title">Photo Gallery's</span>
          </a>
        </li>
      @endcan
      @can('Access Rule')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_rule') }}">
            <span class="icon-bg"><i class="mdi mdi-information-outline menu-icon"></i></span>
            <span class="menu-title">Rule's</span>
          </a>
        </li>
      @endcan
      @can('Access Student')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_student') }}">
            <span class="icon-bg"><i class="mdi mdi-account-plus menu-icon"></i></span>
            <span class="menu-title">Student's</span>
          </a>
        </li>
      @endcan
      @can('Access Student Payment')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_student_payment') }}">
            <span class="icon-bg"><i class="mdi mdi-currency-inr menu-icon"></i></span>
            <span class="menu-title">Student Payment's</span>
          </a>
        </li>
      @endcan
      @can('Access Student Education')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_student_education') }}">
            <span class="icon-bg"><i class="mdi mdi mdi-certificate menu-icon"></i></span>
            <span class="menu-title">Student Education's</span>
          </a>
        </li>
      @endcan
      @can('Access Role')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_role') }}">
            <span class="icon-bg"><i class="mdi mdi-account-key menu-icon"></i></span>
            <span class="menu-title">Role's</span>
          </a>
        </li>
      @endcan
      @can('Access Permission')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_permission') }}">
            <span class="icon-bg"><i class="mdi mdi-account-key menu-icon"></i></span>
            <span class="menu-title">Permission's</span>
          </a>
        </li>
      @endcan
      @can('Access Role Wise Permission')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_role_permission') }}">
            <span class="icon-bg"><i class="mdi mdi-account-key menu-icon"></i></span>
            <span class="menu-title">Role Wise Permission's</span>
          </a>
        </li>
      @endcan
      @can('Access Admin')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_admin') }}">
            <span class="icon-bg"><i class="mdi mdi-account-star menu-icon"></i></span>
            <span class="menu-title">Admin's</span>
          </a>
        </li>
      @endcan
      @can('Access Cast')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_cast') }}">
            <span class="icon-bg"><i class="mdi mdi-format-list-bulleted-type menu-icon"></i></span>
            <span class="menu-title">Cast's</span>
          </a>
        </li>
      @endcan
      @can('Access Category')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_category') }}">
            <span class="icon-bg"><i class="mdi mdi-sitemap menu-icon"></i></span>
            <span class="menu-title">Category's</span>
          </a>
        </li>
      @endcan
      {{-- @can('Access Enquriry')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('all_enquiry') }}">
            <span class="icon-bg"><i class="mdi mdi-sitemap menu-icon"></i></span>
            <span class="menu-title">Enquiry's</span>
          </a>
        </li>
      @endcan --}}
      {{-- @can('')
      @endcan
      @can('')
      @endcan --}}
      

      
      
      
      
      
      
      
      
      

      
      
      {{-- <li class="nav-item">
        <a class="nav-link" href="">
          <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
          <span class="menu-title">Forms</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
          <span class="menu-title">UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">Setting</li>
      <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">Settings</span>
          </a>
        </div>
      </li>
      <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="#" class="nav-link"><i class="mdi mdi-speedometer menu-icon"></i>
            <span class="menu-title">Take Tour</span></a>
        </div>
      </li>
      <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="#" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Log Out</span></a>
        </div>
      </li> --}}
    </ul>
  </nav>
</div>
<!-- Sidebar End -->