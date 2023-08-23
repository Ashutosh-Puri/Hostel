<div>
    @section('styles')
        <style>
            .gallery {
                padding: 30px 0px;
            }

            img {
                max-width: 100%;
            }

            .gallery img {
                background: #fff;
                padding: 15px;
                /* width: 100%; */
                width: 356px;
                height: 247px;
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
                cursor: pointer;
            }

            #gallery-popup {
                width: 80%;
                margin: auto;
            }

            .image-container {
                position: relative;
                display: inline-block;
            }

            .image-caption {
                position: absolute;
                bottom: 0;
                left: 9px;
                width: 95%;
                padding: 10px;
                background-color: rgba(0, 0, 0, 0.7);
                color: white;
                opacity: 0;
                transition: opacity 0.3s;
            }

            .image-container:hover .image-caption {
                opacity: 1;
            }
        </style>
    @endsection
    <section>
        <section class="gallery min-vh-100">
            <div class="container">
                <h2 class="m-2">Photo Gallery</h2>
                <hr>
                <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
                    @forelse ($gallery as $item)
                        <div class="image-container">
                            <img src="{{ asset($item->photo) }}" class="gallery-item" alt="{{ 'Gallery-' . $item->id }}">
                            <div class="image-caption">
                                {{ $item->title }}
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="gallery-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="container">
                    <div class="modal-content">
                        <div class="modal-header">
                            {{-- <h5 class="modal-title" id="modaltitle">ModalTitle</h5> --}}
                            <button type="button" class="btn-close btn btn-danger text-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="" class="modal-img" alt="Modal Image">
                        </div>
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
