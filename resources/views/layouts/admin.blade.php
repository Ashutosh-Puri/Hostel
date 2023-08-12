@extends('layouts.app')
@section('content')
<div>   
    @section('styles')
      <style>
        .card
        {
          background-color: #36404a;
        }

        input, textarea,option 
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

        option 
        {
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
                   {{-- @livewire('backend.admin.sidebar')   --}}
              <!-- Sidebar End -->
      
              <!-- Main Start -->
              <div class="main-panel">
                <!-- Content Wrapper Start  -->
                <div class="content-wrapper   body-bg">
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