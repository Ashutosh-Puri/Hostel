<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
    // Route::get('admin/register', [RegisteredUserController::class, 'create'])->name('admin.register');

    // Route::post('admin/register', [RegisteredUserController::class, 'store']);

    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');

    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin/forgot-password', [PasswordResetLinkController::class, 'create'])->name('admin.password.request');

    Route::post('admin/forgot-password', [PasswordResetLinkController::class, 'store'])->name('admin.password.email');

    Route::get('admin/reset-password/{token}', [NewPasswordController::class, 'create'])->name('admin.password.reset');

    Route::post('admin/reset-password', [NewPasswordController::class, 'store'])->name('admin.password.store');
});


Route::middleware(['is_admin'])->group(function () {
    // Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Route::post('admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('admin.verification.send');
    
    Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});