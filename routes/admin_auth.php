<?php

use App\Models\Section;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectTeacherController;
use App\Http\Controllers\Auth\Admin\NewPasswordController;
use App\Http\Controllers\Auth\Admin\VerifyEmailController;
use App\Http\Controllers\student\StudentRegisterController;
use App\Http\Controllers\teacher\TeacherRegisterController;
use App\Http\Controllers\Auth\Admin\RegisteredAdminController;
use App\Http\Controllers\Auth\Admin\PasswordResetLinkController;
use App\Http\Controllers\Auth\Admin\ConfirmablePasswordController;
use App\Http\Controllers\Auth\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Auth\Admin\EmailVerificationPromptController;
use App\Http\Controllers\Auth\Admin\EmailVerificationNotificationController;

Route::group(['middleware' => 'guest:admin', 'prefix' => 'admin/', 'as'=>'admin.'], function(){
    Route::get('register', [RegisteredAdminController::class, 'create'])->name('register');
    Route::post('register', [RegisteredAdminController::class, 'store']);  
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');   
    Route::post('login', [AuthenticatedSessionController::class, 'store']);   
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');   
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');   
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');  
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin/', 'as' => 'admin.'], function(){
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    //student
    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('register-student/create', [StudentRegisterController::class, 'create'])->name('register-student.create');
    Route::post('register-student/store', [StudentRegisterController::class, 'store'])->name('register-student.store');
    //Teacher
    Route::get('register-teacher/create', [TeacherRegisterController::class, 'create'])->name('register-teacher.create');
    Route::post('register-teacher/store', [TeacherRegisterController::class, 'store'])->name('register-teacher.store');

    //Assign subject teacher
    Route::get('subject_teacher', [SubjectTeacherController::class, 'index'])->name('assign-subject-teacher');
    Route::post('subject_teacher/store', [SubjectTeacherController::class, 'store'])->name('assign-subject-teacher.store');
    Route::patch('subject_teacher/update', [SubjectTeacherController::class, 'update'])->name('assign-subject-teacher.update');
    Route::delete('subject_teacher/destroy/{id}', [SubjectTeacherController::class, 'destroy'])->name('assign-subject-teacher.destroy');
    
    // sections
    Route::get('section', [SectionController::class, 'index'])->name('section.index');
    Route::get('section/get/{class}', [SectionController::class, 'getSections'])->name('section.getSections');
    Route::post('section/store', [SectionController::class, 'store'])->name('section.store');
    Route::patch('section/update', [SectionController::class, 'update'])->name('section.update');

    //routines
    Route::get('routine', [RoutineController::class, 'create'])->name('routine');
    Route::get('routine/index/{id?}', [RoutineController::class, 'index'])->name('routine.index');
    Route::get('routine/get/{class}', [RoutineController::class, 'getRoutines'])->name('routine.getRoutines');
    Route::post('routine/store', [RoutineController::class, 'store'])->name('routine.store');
    Route::patch('routine/update', [RoutineController::class, 'update'])->name('routine.update');
    Route::delete('routine/destroy/{id}', [RoutineController::class, 'destroy'])->name('routine.destroy');

    // subjects
    Route::get('subject', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('subject/get/{class}', [SubjectController::class, 'getSubjects'])->name('subject.getSubjects');
    Route::post('subject/store', [SubjectController::class, 'store'])->name('subject.store');
    Route::patch('subject/update', [SubjectController::class, 'update'])->name('subject.update');

    Route::get('section/axios/{name}', [SectionController::class, 'axios'])->name('section.axios');
});

Route::get('/admin/dashboard', function () {
    return view('dashboard.pages.dashboard',[
        'sections' => Section::all()
    ]);
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');