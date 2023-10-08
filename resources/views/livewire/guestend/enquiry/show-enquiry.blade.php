<div>
    @section('title')
    Enquiry
    @endsection
         <!-- Header Start -->
         <div class="container-fluid bg-primary py-5 mb-5 page-header">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Enquiry</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Enquiry</li>
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
                    {{-- <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                                <h5 class="mb-3">Skilled Instructors</h5>
                                <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="mdi mdi-earth text-primary mb-4" style="font-size: 3em;"></i>
                                <h5 class="mb-3">Online Classes</h5>
                                <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="mdi mdi-home text-primary mb-4" style="font-size: 3em;"></i>
                                <h5 class="mb-3">Home Projects</h5>
                                <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="mdi mdi-book-open-variant text-primary mb-4" style="font-size: 3em;"></i>
                                <h5 class="mb-3">Book Library</h5>
                                <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-12 col-md-12 mb-2 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

</div>
