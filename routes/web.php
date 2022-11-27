<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Admin\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/admin_auth.php';
require __DIR__.'/student_auth.php';
require __DIR__.'/teacher_auth.php';
require __DIR__.'/parent_auth.php';
require __DIR__.'/stuff_auth.php';
