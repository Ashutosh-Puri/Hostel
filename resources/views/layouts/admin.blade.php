@extends('layouts.app')
@section('content')
<div>   
    @section('styles')
        <style>
            .card{
                background-color: #36404a;
            }

            input,input:active , textarea,option {
                background-color: #3b4651;
               
                color: white;
                }
                select {
                  background: #3b4651;
                  color: #fff;
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