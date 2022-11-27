<?php

use App\Http\Controllers\Auth\Parent\AuthenticatedSessionController;
use App\Http\Controllers\Auth\Parent\ConfirmablePasswordController;
use App\Http\Controllers\Auth\Parent\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\Parent\EmailVerificationPromptController;
use App\Http\Controllers\Auth\Parent\NewPasswordController;
use App\Http\Controllers\Auth\Parent\PasswordResetLinkController;
use App\Http\Controllers\Auth\Parent\RegisteredStudentParentController;
use App\Http\Controllers\Auth\Parent\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest:parent', 'prefix' => 'parent/', 'as'=>'parent.'], function(){
    Route::get('register', [RegisteredStudentParentController::class, 'create'])->name('register');
    Route::post('register', [RegisteredStudentParentController::class, 'store']);  
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');   
    Route::post('login', [AuthenticatedSessionController::class, 'store']);   
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');   
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');   
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');  
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::group(['middleware' => 'auth:parent', 'prefix' => 'parent/', 'as' => 'parent.'], function(){
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::get('/parent/dashboard', function () {
    return view('dashboard.pages.dashboard');
})->middleware(['auth:parent', 'verified'])->name('parent.dashboard');