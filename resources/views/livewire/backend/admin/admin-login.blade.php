<div class="container mt-5">
    @section('title')
        Admin Login
    @endsection
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form wire:submit.prevent="login" class="mb-3">
                @csrf

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input wire:model="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input wire:model="password" type="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group form-check">
                    <input wire:model="rememberMe" type="checkbox" id="rememberMe" class="form-check-input">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
