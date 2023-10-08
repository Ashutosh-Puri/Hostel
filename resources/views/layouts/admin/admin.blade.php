@extends('layouts.app')
@section('content')
<div>  
    @section('styles')
      <style>


/* Style for the input type time */
input[type="time"] {
    /* Hide the default time picker arrow */
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;

}



        /* Ensure the loading overlay covers the entire screen */
        .loading-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent white background */
    z-index: 9999; /* Ensure the spinner is above other content */
}

/* Center the spinner vertically */
.loading-spinner {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 0;
    right: 0;
    text-align: center;
}

.loading-spinner .spinner-border {
    width: 4rem;
    height: 4rem;
}

/* Adjust spinner size for larger screens if needed */
@media (min-width: 768px) {
    .loading-spinner .spinner-border {
        width: 6rem;
        height: 6rem;
    }
}

        .sidebar-bg::-webkit-scrollbar {
          width: 0px; 
          scrollbar-width: thin;
        }

        .card
        {
          background-color: #36404a;
        }

        input, textarea,option ,select
        {
          background-color: #3b4651;
          color: white;
        }
        .form-control 
        {
          color: white;
          background-color: #3b4651;
          border: 1px solid rgba(151, 151, 151, 0.3);
          font-family: "nunito-regular", sans-serif;
          font-size: 12px;
          height: 45px;
        }
        .form-control::placeholder 
        {
          color: white;
        }

        .form-control:focus::placeholder
        {
          color: black; 
        }

        select  option {
          padding: 5px 0 !important;
          color: white;
          background-color: #3b4651;
        }


        .form-select 
        {
          color: white;
          background-color: #3b4651;
          border: 1px solid rgba(151, 151, 151, 0.3);
          font-family: "nunito-regular", sans-serif;
          font-size: 12px;
          height: 45px;
        }

        .form-select:focus
        {
          color: black; 
          background-color: white;
        }  
        
        input[type="search"]::-webkit-search-cancel-button {
          -webkit-appearance: none;
          appearance: none;
          height: 10px;
          width: 10px;
          background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE2LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgd2lkdGg9IjEyMy4wNXB4IiBoZWlnaHQ9IjEyMy4wNXB4IiB2aWV3Qm94PSIwIDAgMTIzLjA1IDEyMy4wNSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTIzLjA1IDEyMy4wNTsiDQoJIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPHBhdGggZD0iTTEyMS4zMjUsMTAuOTI1bC04LjUtOC4zOTljLTIuMy0yLjMtNi4xLTIuMy04LjUsMGwtNDIuNCw0Mi4zOTlMMTguNzI2LDEuNzI2Yy0yLjMwMS0yLjMwMS02LjEwMS0yLjMwMS04LjUsMGwtOC41LDguNQ0KCQljLTIuMzAxLDIuMy0yLjMwMSw2LjEsMCw4LjVsNDMuMSw0My4xbC00Mi4zLDQyLjVjLTIuMywyLjMtMi4zLDYuMSwwLDguNWw4LjUsOC41YzIuMywyLjMsNi4xLDIuMyw4LjUsMGw0Mi4zOTktNDIuNGw0Mi40LDQyLjQNCgkJYzIuMywyLjMsNi4xLDIuMyw4LjUsMGw4LjUtOC41YzIuMy0yLjMsMi4zLTYuMSwwLTguNWwtNDIuNS00Mi40bDQyLjQtNDIuMzk5QzEyMy42MjUsMTcuMTI1LDEyMy42MjUsMTMuMzI1LDEyMS4zMjUsMTAuOTI1eiIvPg0KPC9nPg0KPGc+DQoJPC9nPg0KPGc+DQoJPC9nPg0KPC9zdmc+DQo=);
          cursor: pointer;
          background-size: 10px 10px;
        }

        .dropdown:hover .dropdown-menu {
  display: block;
  padding: 0;
}
      </style>
    @endsection
        <!-- Container Start -->
        <div class="container-scroller">
            <!-- Navbar -->
              @include('layouts.admin.navbar')
            <!-- navbar End -->
      
            <!-- Body start -->
            <div class="container-fluid page-body-wrapper">
              <!-- Sidebar Start -->
                  @include('layouts.admin.sidebar')    
              <!-- Sidebar End -->
              <!-- Main Start -->
              <div class="main-panel">
                <!-- Content Wrapper Start  -->
                <div class="content-wrapper  body-bg ">
                   <!-- Content Start-->
                     @yield('admin')
                    <!-- Content End-->
                </div>
                <!-- Content Wrapper End  -->
                  <!-- Footer Start -->
                      @include('layouts.admin.footer')
                  <!-- Footer End -->
              </div>
              <!-- Main End -->
            </div>
            <!-- Body End -->
          </div>
           <!-- Container Enter -->
</div>

@endsection