<?php

use App\Http\Controllers\Dashboard\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Dashboard\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Dashboard\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Dashboard\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Dashboard\Admin\Auth\PasswordController;
use App\Http\Controllers\Dashboard\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Dashboard\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Dashboard\Admin\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:admin'] ],function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('admin.register');

    Route::post('register', [RegisteredUserController::class, 'store'])->name('admin.register.store');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('admin.login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('admin.password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('admin.password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('admin.password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('admin.password.store');
});

Route::group(['middleware' => ['auth:admin']],function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('admin.verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('admin.verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('admin.verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('admin.password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('admin.password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('admin.logout');
});
