<div>
    @section('title')
    Gallery
    @endsection
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

            .page-header {
                background: linear-gradient(rgba(24, 29, 56, .2), rgba(24, 29, 56, .2)), url('{{ asset('assets/images/bg.png') }}');
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
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
         <!-- Header Start -->
         <div class="container-fluid bg-primary py-5 mb-5 page-header">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Gallery</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Gallery</li>
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
                    <div class="col-12 col-md-12 mb-2 wow fadeInUp" data-wow-delay="0.1s">
                        {{-- <div class="card">
                            <div class="card-body">
                                <form wire:submit.prevent="save" method="post" action="" id="myForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="mb-3 form-group">
                                                <label for="name" class="form-label">Student Name</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror"  wire:model="name" value="{{ old('name') }}" id="name" placeholder="Enter Student Name">
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-3 form-group">
                                                <label for="email" class="form-label">Student Email</label>
                                                <input type="email"  class="form-control @error('email') is-invalid @enderror"  wire:model="email"  placeholder="Enter Student Email">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-3 form-group">
                                                <label for="mobile" class="form-label">Student Mobile</label>
                                                <input type="number"  class="form-control @error('mobile') is-invalid @enderror"  wire:model="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Enter Student Mobile">
                                                @error('mobile')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-3 form-group">
                                                <label for="gender" class="form-label">Select Gender</label>
                                                <select class="form-control @error('gender') is-invalid @enderror" id="gender" wire:model.debounce.500ms="gender">
                                                    <option hidden value="">Select </option>
                                                    <option value="0">Male</option>
                                                    <option value="1">Female</option>
                                                </select>
                                                @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="mb-3 form-group">
                                                <label for="subject" class="form-label">Enquiry Subject</label>
                                                <input type="text" class="form-control @error('subject') is-invalid @enderror" wire:model="subject" value="{{ old('subject') }}" id="subject"  placeholder="Enter Enquiry Subject">
                                                @error('subject')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3 form-group">
                                                <label for="description" class="form-label">Enquiry Description</label>
                                                <textarea class=" w-100 @error('description') is-invalid @enderror"  wire:model.debounce.1000ms="description" id="description"  placeholder="Enter Enquiry Description" cols="30" rows="5">{{ old('description') }}</textarea>
                                                @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Send  Enquiry</button>
                                </form>
                            </div>
                        </div> --}}
                        <section>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row  py-3 px-3">
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
                                            <img src="" class="modal-img object-fit-contain" alt="Modal Image" style="height:500px; width:870px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

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
