<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\AttendanceController;

Route::get('/take-attendance/{courseId}', [AttendanceController::class, 'takeAttendance'])->name('take_attendance');

use App\Http\Controllers\ViewAttendanceController;

Route::get('/view-attendance/{courseId}', [ViewAttendanceController::class, 'viewAttendance'])->name('view_attendance');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [StudentController::class, 'index']);

