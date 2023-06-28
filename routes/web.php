<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AdminController;
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


Route::get('/', [LoginController::class, 'show_login_form'])->name('login');
Route::get('/login', [LoginController::class, 'show_login_form'])->name('login');
Route::post('/login',[LoginController::class, 'process_login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard']);
});