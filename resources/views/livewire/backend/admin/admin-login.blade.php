<div>
    @section('title')
    Admin Login
    @endsection
    <div class="container-fulid page-body-wrapper">
        <div class="content-wrapper d-flex align-items-center auth py-0 bg-primary"  >
          <div class="row flex-grow ">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo text-center">
                  <img src="{{ asset('assets/logo/scolerstay_sm.png') }}" alt="logo" style="height: 100px;width:150px;">
                </div>
                <div> <h1 class="text-center"> Admin Login</h1></div>
                {{-- <h6 class="font-weight-light">Login to continue.</h6> --}}
                <form wire:submit.prevent="login"  class="pt-3">
                  @csrf
                  <div class="form-group">
                    <input wire:model.debounce.1000ms="email" type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" required placeholder="Email">
                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <input wire:model.debounce.1000ms="password" id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required placeholder="Password">
                    @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                      <input wire:model.debounce.1000ms="rememberMe" id="rememberMe" type="checkbox" class="form-check-input">
                      <label for="rememberMe" class="form-check-label mx-2 mt-2">Keep Me Login</label>
                  </div>
                  <div class="mt-3">
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                  </div>
                  {{-- <div class="my-2 d-flex justify-content-between align-items-center">
                    <a href="#" class="auth-link text-black">Forgot Password?</a>
                  </div> --}}
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
</div>
 

