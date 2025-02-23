<?php
//dd();
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\StudentResultController;
use App\Http\Controllers\Auth\Student\NewPasswordController;
use App\Http\Controllers\Auth\Student\VerifyEmailController;
use App\Http\Controllers\Auth\Student\PasswordResetLinkController;
use App\Http\Controllers\Auth\Student\RegisteredStudentController;
use App\Http\Controllers\Auth\Student\ConfirmablePasswordController;
use App\Http\Controllers\Auth\Student\AuthenticatedSessionController;
use App\Http\Controllers\Auth\Student\EmailVerificationPromptController;
use App\Http\Controllers\Auth\Student\EmailVerificationNotificationController;

Route::group(['middleware' => 'guest'], function(){
    Route::get('register', [RegisteredStudentController::class, 'create'])->name('register');
    Route::post('register', [RegisteredStudentController::class, 'store']);  
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');   
    Route::post('login', [AuthenticatedSessionController::class, 'store']);   
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');   
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');   
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');  
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::group(['middleware' => 'auth','prefix' => 'student/', 'as' => 'student.'], function(){
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    //routine view
    Route::get('routine', [RoutineController::class, 'index'])->name('routine');
    
    //Result view
    Route::get('result', [StudentResultController::class, 'index'])->name('result');
});

Route::get('/dashboard', function () {
    return view('dashboard.pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');