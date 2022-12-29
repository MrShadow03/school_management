<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\teacher\TeacherSectionController;
use App\Http\Controllers\Auth\Teacher\NewPasswordController;
use App\Http\Controllers\Auth\Teacher\VerifyEmailController;
use App\Http\Controllers\Auth\Teacher\PasswordResetLinkController;
use App\Http\Controllers\Auth\Teacher\RegisteredTeacherController;
use App\Http\Controllers\Auth\Teacher\ConfirmablePasswordController;
use App\Http\Controllers\Auth\Teacher\AuthenticatedSessionController;
use App\Http\Controllers\Auth\Teacher\EmailVerificationPromptController;
use App\Http\Controllers\Auth\Teacher\EmailVerificationNotificationController;

Route::group(['middleware' => 'guest:teacher', 'prefix' => 'teacher/', 'as'=>'teacher.'], function(){
    Route::get('register', [RegisteredTeacherController::class, 'create'])->name('register');
    Route::post('register', [RegisteredTeacherController::class, 'store']);  
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');   
    Route::post('login', [AuthenticatedSessionController::class, 'store']);   
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');   
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');   
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');  
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::group(['middleware' => 'auth:teacher', 'prefix' => 'teacher/', 'as' => 'teacher.'], function(){
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    //students list
    Route::get('students/{teacher_id}/{section_id?}', [TeacherSectionController::class, 'index'])->name('students');
    
    //students list
    Route::get('routine', [RoutineController::class, 'teacherRoutine'])->name('routine');
});

Route::get('/teacher/dashboard', function () {
    return view('dashboard.pages.dashboard');
})->middleware(['auth:teacher', 'verified'])->name('teacher.dashboard');
