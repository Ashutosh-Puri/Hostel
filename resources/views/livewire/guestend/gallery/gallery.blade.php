<div>
    @section('title')
    Gallery
    @endsection
     <!-- Header Start -->
     <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Gallery</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('gallery') }}">More</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Gallery Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-12 mb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <section>
                        <div class="row text-center">
                            <div class="col-12">
                                        <div class="row g-2 pt-2">
                                            @foreach ($gallery as $item)
                                            <div class="col-md-3 col-12">
                                                <div class="image-container">
                                                    <img class="img-fluid bg-light p-1 gallery-item  object-fit-contain" alt="{{ "Gallery-".$item->id }}" style=" width: 360px; height: 250px;" src="{{ asset($item->photo) }}" alt="">
                                                    <div class="image-caption">
                                                        {{ $item->title }}
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            {{ $gallery->links('pagination::bootstrap-5') }}
                                        </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="modal fade " id="gallery-popup" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered w-md-100">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modaltitle">View Photo</h5>
                                        <button type="button" class="btn btn-danger fw-bold px-3 " data-dismiss="modal"
                                            aria-label="Close">X</button>
                                    </div>
                                    <div class="modal-body w-100 text-center">
                                        <img src="" class="modal-img img-fluid object-fit-contain" alt="Modal Image"
                                            style="max-height: 500px; max-width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->

    @section('scripts')
        <script type="text/javascript">
            document.addEventListener("click", function(e) {
                if (e.target.classList.contains("gallery-item")) {
                    const src = e.target.getAttribute("src");
                    document.querySelector(".modal-img").src = src;
                    const myModal = new bootstrap.Modal(document.getElementById('gallery-popup'));
                    myModal.show();
                }
            })
        </script>
    @endsection

</div>
