<div>
    @section('title')
    Merit Form
    @endsection
         <!-- Header Start -->
         <div class="container-fluid bg-primary py-5 mb-5 page-header">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Merit Form</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route('enquiry') }}">More</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Merit Form</li>
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
                                                <div class="col-12 col-md-6">
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
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3 form-group">
                                                        <label for="class" class="form-label">Class</label>
                                                        <input type="text" class="form-control @error('class') is-invalid @enderror"  wire:model="class" value="{{ old('class') }}" id="class" placeholder="Enter Class">
                                                        @error('class')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
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
                                                <div class="col-12 col-md-6">
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
                                                        <select class="form-control bg-white @error('gender') is-invalid @enderror" id="gender" wire:model.debounce.500ms="gender">
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
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-3 form-group">
                                                        <label for="sgpa" class="form-label">SGPA</label>
                                                        <input type="text" class="form-control @error('sgpa') is-invalid @enderror" wire:model="sgpa" value="{{ old('sgpa') }}" id="sgpa"  placeholder="Enter SGPA">
                                                        @error('sgpa')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-3 form-group">
                                                        <label for="percentage" class="form-label">Percentage</label>
                                                        <input type="text" class="form-control @error('percentage') is-invalid @enderror" wire:model="percentage" value="{{ old('percentage') }}" id="percentage"  placeholder="Enter Percentage">
                                                        @error('percentage')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success ">Submit</button>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

</div>
