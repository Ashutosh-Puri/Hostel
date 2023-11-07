<div>
    @section('title')
    Notice
    @endsection
         <!-- Header Start -->
         <div class="container-fluid bg-primary py-5 mb-5 page-header">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Notice</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Notice</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="row wow fadeInUp" data-wow-delay="0.1s">
                        <div class="col-12">
                            <div class="row  py-3 px-3">
                                <div class="col-12 col-md-12 mb-2 ">
                                   <div class="card p-1 rounderd bg-primary">
                                        <span class="card-title text-center mb-3 fs-3 ">Notices</span>
                                        <div class="card-body px-2 py-0">
                                            <div class="list-group p-0 m-0 ">
                                                @foreach ($notice as $item)
                                                    <a href="#" class="list-group-item list-group-item-action my-1"><i class="mdi mdi-circle mx-2"></i> {{ $item->description }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
</div>

{{-- <div class="card p-1 rounderd">
    <span class="card-title text-center mb-3 h2 ">Notices</span>
    <div class="card-body px-2 py-0">
        <div class="list-group p-0 m-0 ">
            @foreach ($notice as $item)
                <a href="#" class="list-group-item list-group-item-action">{{ $item->description }}</a>
            @endforeach

        </div>
        <div>
            {{ $notice->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div> --}}
