<div>

    @section('title')
   Team
    @endsection
         <!-- Header Start -->
         <div class="container-fluid bg-primary py-5 mb-5 page-header">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Team</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Team</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->

    <!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3 mb-5">Team</h6>
        </div>
        <div class="row g-4">
           @foreach ($team as $data )
           @php
                $roleNames = $data->getRoleNames();
                if($roleNames[0] !== 'Super Admin')
                continue;
            @endphp
           <div class="col-lg-3 mx-auto col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item bg-light">
                <div class="overflow-hidden text-center">
                    @if (isset($data->photo))
                    <img class="img-fluid mt-5" style="height:224px; width:224px; border:1px solid #000;" src={{asset($data->photo)}} alt="">
                    @else
                    <img class="img-fluid mt-5" style="height:224px; width:224px; border:1px solid #000;" src={{asset('assets/images/no_image.jpg')}} alt="">
                    @endif
                </div>
                <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                </div>
                <div class="text-center p-4">
                    <h5 class="mb-0">{{$data->name}}</h5>
                    <small>Developer</small>
                </div>
            </div>
        </div>
           @endforeach
        </div>
    </div>
</div>
<!-- Team End -->
</div>
