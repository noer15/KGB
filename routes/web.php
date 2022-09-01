<?php

use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\CriteriaController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\SalaryController;
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


Route::get('/', function () {
    return view('/home');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/post', [AuthController::class, 'login'])->name('login.post');

Route::resource('/position', PositionController::class)->middleware('admin');
Route::resource('/criteria', CriteriaController::class)->middleware('admin');
Route::resource('/salary', SalaryController::class)->middleware('admin');
Route::resource('/attendance', AttendanceController::class)->middleware('admin');