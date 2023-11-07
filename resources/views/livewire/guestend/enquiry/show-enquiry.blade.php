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
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route('enquiry') }}">More</a></li>
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
                    <div class="col-lg-12 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-primary text-center pt-3">
                            <div class="p-4">
                                        <form wire:submit.prevent="save" method="post" action="" id="myForm">
                                            @csrf
                                            <div class="row text-start">
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
                                                        <input type="text"  class="form-control @error('mobile') is-invalid @enderror"  wire:model="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Enter Student Mobile">
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
                                                        <select class="form-select form-control bg-white @error('gender') is-invalid @enderror" id="gender" wire:model.debounce.500ms="gender">
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
                                            <button type="submit" class="btn btn-success ">Send  Enquiry</button>
                                        </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

</div>
