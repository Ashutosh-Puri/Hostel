<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Student\Auth\ProfileController;
use App\Http\Controllers\Student\Auth\PasswordController;
use App\Http\Controllers\Student\Auth\NewPasswordController;
use App\Http\Controllers\Student\Auth\VerifyEmailController;
use App\Http\Controllers\Student\Auth\RegisteredUserController;
use App\Http\Controllers\Student\Auth\PasswordResetLinkController;
use App\Http\Controllers\Student\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Student\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Student\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Student\Auth\EmailVerificationNotificationController;

Route::middleware('guest:student')->group(function () {
    Route::get('student/register', [RegisteredUserController::class, 'create'])->name('student.register');

    Route::post('student/register', [RegisteredUserController::class, 'store']);

    Route::get('student/login', [AuthenticatedSessionController::class, 'create'])->name('student.login');

    Route::post('student/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('student/forgot-password', [PasswordResetLinkController::class, 'create'])->name('student.password.request');

    Route::post('student/forgot-password', [PasswordResetLinkController::class, 'store'])->name('student.password.email');

    Route::get('student/reset-password/{token}', [NewPasswordController::class, 'create'])->name('student.password.reset');

    Route::post('student/reset-password', [NewPasswordController::class, 'store'])->name('student.password.store');
});

Route::middleware(['is_student'])->group(function () {

    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
   
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Route::post('student/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('student.verification.send');
    
    Route::post('student/logout', [AuthenticatedSessionController::class, 'destroy'])->name('student.logout');

    Route::get('student/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('student.password.confirm');

    Route::post('student/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('student/password/update', [PasswordController::class, 'update'])->name('student.password.update');

    Route::get('student/profile', [ProfileController::class, 'edit'])->name('student.profile.edit');

    Route::patch('student/profile', [ProfileController::class, 'update'])->name('student.profile.update');

    // Route::delete('student/profile', [ProfileController::class, 'destroy'])->name('student.profile.destroy');
});