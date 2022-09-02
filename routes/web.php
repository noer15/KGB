<?php

use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\CriteriaController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Guest\AuthController;
use Illuminate\Support\Facades\Route;

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


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/post', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'login'])->name('login.logout')->middleware('admin');

Route::resource('/position', PositionController::class)->middleware('admin');
Route::resource('/criteria', CriteriaController::class)->middleware('admin');
Route::resource('/salary', SalaryController::class)->middleware('admin');
Route::resource('/absensi', App\Http\Controllers\User\AttendanceController::class)->middleware('admin');
Route::resource('/user', UserController::class)->middleware('admin');
Route::get('/', [DashboardController::class,'index'])->middleware('admin');

Route::get('/downloadPdf', [DashboardController::class,'downloadPdf']);