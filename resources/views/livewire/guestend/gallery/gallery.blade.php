<div class="vh-100">
    @section('styles')
        <style>
            .gallery-item {
                background: #fff;
                padding: 15px;
                width: 100%;
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
                cursor: pointer;
            }

            .image-container {
                position: relative;
                display: inline-block;
            }

            .image-caption {
                position: absolute;
                bottom: 0;
                left: 0px;
                width: 100%;
                padding: 10px;
                background-color: rgba(0, 0, 0, 0.9);
                color: white;
                opacity: 0;
                transition: opacity 0.1s;
            }

            .image-container:hover .image-caption {
                opacity: 1;
            }
        </style>
    @endsection
    <section>
        <div class="row">
            <div class="col-12 ">
                <div class="row  py-3 px-3">
                    <div class="col-12 col-md-12  mb-1">
                        <h2>Photo Gallery</h2>
                        <hr>
                    </div>
                    @foreach ($gallery as $item)
                        <div class="col-12 col-md-3  text-center  mb-3">
                            <div class="image-container">
                                <img src="{{ asset($item->photo) }}" class="gallery-item  object-fit-contain"alt="{{ "Gallery-".$item->id }}" style=" width: 360px; height: 250px;">
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
    </section>
    <section>
        <div class="modal fade" id="gallery-popup" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 60%; max-height: 80vh;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaltitle">View Photo</h5>
                        <button type="button" class="btn btn-danger fw-bold px-3 " data-bs-dismiss="modal"
                            aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <img src="" class="modal-img object-fit-contain" alt="Modal Image" style="height:500px; width:890px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
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
