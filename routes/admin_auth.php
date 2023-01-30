<?php

use App\Models\Appointment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\Admin\NewPasswordController;
use App\Http\Controllers\Auth\Admin\VerifyEmailController;
use App\Http\Controllers\SingleStudentPromotionController;
use App\Http\Controllers\student\StudentRegisterController;
use App\Http\Controllers\teacher\TeacherRegisterController;
use App\Http\Controllers\Auth\Admin\RegisteredAdminController;
use App\Http\Controllers\Auth\Admin\PasswordResetLinkController;
use App\Http\Controllers\Auth\Admin\ConfirmablePasswordController;
use App\Http\Controllers\Auth\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Auth\Admin\EmailVerificationPromptController;
use App\Http\Controllers\Auth\Admin\EmailVerificationNotificationController;

Route::group(['middleware' => 'guest:admin', 'prefix' => 'admin/', 'as'=>'admin.'], function(){
    // Route::get('register', [RegisteredAdminController::class, 'create'])->name('register');
    // Route::post('register', [RegisteredAdminController::class, 'store']);  
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);   
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');   
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');   
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');  
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin/', 'as' => 'admin.'], function(){
    //get admin dashboard
    Route::get('dashboard', [AppointmentController::class, 'index'])->name('dashboard');
    
    //Appointments
    Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::post('appointments/filter', [AppointmentController::class, 'filter'])->name('appointments.filter');
    Route::get('appointments/edit/{id}', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::patch('appointments/update', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::get('appointments/getSerialNumber/{doctor_id}', [AppointmentController::class, 'getSerialNumber'])->name('appointments.getSerialNumber');

    //students/Assistants
    Route::get('assistants', [AssistantController::class, 'index'])->name('assistants.index');
    Route::get('assistants/create', [AssistantController::class, 'create'])->name('assistants.create');
    Route::post('assistants/store', [AssistantController::class, 'store'])->name('assistants.store');
    Route::get('assistants/edit/{id}', [AssistantController::class, 'edit'])->name('assistants.edit');
    Route::patch('assistants/update', [AssistantController::class, 'update'])->name('assistants.update');
    
    //Departments
    Route::get('departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('departments/store', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('departments/edit/{id}', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::patch('departments/update', [DepartmentController::class, 'update'])->name('departments.update');

    //Doctors
    Route::get('doctors', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
    Route::post('doctors/store', [DoctorController::class, 'store'])->name('doctors.store');
    Route::get('doctors/edit/{id}', [DoctorController::class, 'edit'])->name('doctors.edit');
    Route::get('doctors/changeStatus/{id}/{status}', [DoctorController::class, 'changeStatus'])->name('doctors.changeStatus');
    Route::patch('doctors/update', [DoctorController::class, 'update'])->name('doctors.update');





































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
    Route::get('register-student/getRoll/{section_id}', [StudentRegisterController::class, 'getRoll'])->name('register-student.getRoll');
    
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
    Route::get('subject/remaining/{section_id}', [SubjectController::class, 'remainingSubjects'])->name('subject.remainingSubjects');
    Route::post('subject/store', [SubjectController::class, 'store'])->name('subject.store');
    Route::patch('subject/update', [SubjectController::class, 'update'])->name('subject.update');

    //Settings and permissions
    Route::get('exam_permission/index', [ExamPermissionController::class, 'index'])->name('exam_permission.index');
    Route::patch('exam_permission/update', [ExamPermissionController::class, 'update'])->name('exam_permission.update');
    
    //grades
    Route::get('grade/index', [GradeController::class, 'index'])->name('grade.index');
    Route::patch('grade/update', [GradeController::class, 'update'])->name('grade.update');
    
    //student promotion routes
    Route::get('promotion/getSections/{section_id}', [StudentPromotionController::class, 'getSections'])->name('promotion.getSections');
    Route::get('promotion/index', [StudentPromotionController::class, 'index'])->name('promotion.index');
    Route::patch('promotion/update', [StudentPromotionController::class, 'update'])->name('promotion.update');
    Route::patch('promotion/roll_back', [StudentPromotionController::class, 'rollBack'])->name('promotion.roll_back');

    //Single student promotion routes
    Route::get('promotion/single/index/{section_id?}', [SingleStudentPromotionController::class, 'index'])->name('promotion.single.index');
    Route::get('promotion/single/update/{student_id}/{promoted_section_id}', [SingleStudentPromotionController::class, 'update'])->name('promotion.single.update');

    //accounts routes
    Route::get('account/index', [AccountController::class, 'index'])->name('account.index');
    Route::get('account/create', [AccountController::class, 'create'])->name('account.create');
    Route::post('account/store', [AccountController::class, 'store'])->name('account.store');
    Route::get('account/edit/{id}', [AccountController::class, 'edit'])->name('account.edit');
    Route::patch('account/update/{id}', [AccountController::class, 'update'])->name('account.update');
    Route::delete('account/delete', [AccountController::class, 'delete'])->name('account.delete');
    Route::get('account/update_status/{id}/{status}', [AccountController::class, 'updateStatus'])->name('account.updateStatus');

    Route::get('section/axios/{name}', [SectionController::class, 'axios'])->name('section.axios');
});