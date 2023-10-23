@extends('layouts.student.student')
@section('student')
    <div class="row">
        <div class="col-12 my-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Profile Information</h2>
                            <p>Update your account's profile information and email address.</p>
                        </div>
                    </div>
                    <form id="send-verification" method="post" action="{{ route('verification.notice') }}">
                        @csrf
                    </form>
                    <form method="post" action="{{ route('student.profile.update') }}" class="mt-1">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input name="username" type="text" id="username"
                                        class="form-control form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username', $user->username) }}" required autofocus
                                        autocomplete="username" placeholder="Username">
                                    @error('username')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="email" id="email"
                                            class="form-control form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $user->email) }}" required autofocus autocomplete="email"
                                            placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-primary">Update Profile</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 my-1">
            {{-- <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Update Password') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </p>
            </header>

            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')

                <div>
                    <x-input-label for="current_password" :value="__('Current Password')" />
                    <x-text-input id="current_password" username="current_password" type="password"
                        class="mt-1 block w-full" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('New Password')" />
                    <x-text-input id="password" username="password" type="password" class="mt-1 block w-full"
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" username="password_confirmation" type="password"
                        class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </section> --}}
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h2> Update Password </h2>
                            <p>Ensure your account is using a long, random password to stay secure.</p>
                        </div>
                    </div>
                    <form method="post" name="password-update" action="{{ route('student.password.update') }}"
                        class="mt-1">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="current_password">{{ __('Current Password') }}</label>
                                    <input id="current_password" name="current_password" type="password"
                                        value="{{ old('current_password') }}"
                                        class="form-control  @error('current_password') is-invalid @enderror"
                                        autocomplete="current-password">
                                    @error('current_password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">{{ __('New Password') }}</label>
                                    <input id="password" name="password" type="password" value="{{ old('password') }}"
                                        class="form-control @error('password') is-invalid @enderror"
                                        autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                    <input id="password_confirmation" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}" type="password" class="form-control"
                                        autocomplete="new-password">

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-primary">Update Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="col-12 my-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2> Delete Account </h2>
                            <p> Once your account is deleted, all of its resources and data will be permanently deleted.
                                Before
                                deleting your account, please download any data or information that you wish to retain.</p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-user-deletion-modal">Delete Account</button>
                </div>
            </div>
            <div class="modal fade" id="confirm-user-deletion-modal" tabindex="-1" role="dialog"
                aria-labelledby="confirm-user-deletion-modal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" name="delete-user" action="{{ route('student.profile.destroy') }}">
                            @csrf
                            @method('delete')
                            <div class="card">
                                <div class="card-header">
                                    <h3>Are you sure you want to delete your account?</h3>
                                </div>
                                <div class="card-body">
                                    <p>
                                        Once your account is deleted, all of its resources and data will be permanently deleted.Please enter your password to confirm you would like to permanently delete your account.
                                    </p>
                                    <div class="form-group">
                                        <label for="password" class="sr-only">Password</label>
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
