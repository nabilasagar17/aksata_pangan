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

    /*Data Volunteer*/
    Route::get('/volunteer',[AdminController::class,'volunteer']);
    Route::post('/insert_volunteer',[AdminController::class,'insert_volunteer']);
    Route::post('/delete_volunteer',[AdminController::class,'delete_volunteer']);
    Route::post('/update_volunteer/{id}',[AdminController::class,'update_volunteer']);

    /*Data Donatur*/
    Route::get('/donatur',[AdminController::class,'donatur']);
    Route::post('/insert_donatur',[AdminController::class,'insert_donatur']);
    Route::post('/delete_donatur',[AdminController::class,'delete_donatur']);
    Route::post('/update_donatur/{id}',[AdminController::class,'update_donatur']);

    /*Data Bantuan*/
    Route::get('/food_bank',[AdminController::class,'master_stok']);
    Route::get('/bantuan_dana',[AdminController::class,'master_stok']);
   
<<<<<<< HEAD
    Route::get('/preview_barang_masuk',[AdminController::class,'preview_barang_masuk']);
    Route::post('/insert_preview_bantuan',[AdminController::class,'insert_preview_bantuan']);
    Route::get('/insert_data_donatur',[AdminController::class,'insert_data_donatur']);

    Route::get('/preview_barang_keluar',[AdminController::class,'preview_barang_keluar']);
    Route::post('/insert_preview_bantuan_keluar',[AdminController::class,'insert_preview_bantuan_keluar']);
    Route::get('/insert_data_penerima',[AdminController::class,'insert_data_penerima']);
=======
>>>>>>> 361d3b814366993f6c2d4bc60fa8136a6c7346f4

    Route::post('/insert_bantuan',[AdminController::class,'insert_bantuan']);
    Route::post('/delete_bantuan/{id}',[AdminController::class,'delete_bantuan']);
    Route::post('/update_bantuan/{id}',[AdminController::class,'update_bantuan']);

    /*Data Penyaluran*/
    Route::get('/penyaluran_makanan',[AdminController::class,'penyaluran_bantuan']);
    Route::get('/penyaluran_dana',[AdminController::class,'penyaluran_bantuan']);
    Route::get('/penyaluran_makanan/detail_penyaluran_bantuan/{id}',[AdminController::class,'detail_penyaluran_bantuan']);  
    Route::get('/penyaluran_dana/detail_penyaluran_bantuan/{id}',[AdminController::class,'detail_penyaluran_bantuan']);  


    /*User List */
     Route::get('/user_list',[AdminController::class,'user_list']);
     Route::get('/volunteer',[AdminController::class,'volunteer']);
     Route::get('/insert_volunteer/{id}',[AdminController::class,'insert_volunteer']);  
     Route::get('/update_volunteer/{id}',[AdminController::class,'update_volunteer']);  
     Route::post('delete_volunteer/{id}',[AdminController::class,'delete_volunteer']);

    /*Data Penyaluran*/
    Route::get('/laporan_bantuan_masuk',[AdminController::class,'laporan_masuk']);
    Route::get('/laporan_bantuan_makanan',[AdminController::class,'laporan_masuk']);
    Route::get('/laporan_bantuan_dana',[AdminController::class,'laporan_masuk']);
    Route::get('/laporan_bantuan_masuk_report',[AdminController::class,'laporan_masuk_report']);
    Route::get('/laporan_bantuan_makanan_report',[AdminController::class,'laporan_masuk_report']);
    Route::get('/laporan_bantuan_dana_report',[AdminController::class,'laporan_masuk_report']);


    Route::get('/laporan_penyaluran_bantuan',[AdminController::class,'laporan_bantuan']);
    Route::get('/laporan_penyaluran_dana',[AdminController::class,'laporan_bantuan']);
    Route::get('/laporan_penyaluran_makanan',[AdminController::class,'laporan_bantuan']);
    Route::get('/laporan_penyaluran_bantuan_report',[AdminController::class,'laporan_bantuan_report']);
    Route::get('/laporan_penyaluran_makanan_report',[AdminController::class,'laporan_bantuan_report']);
    Route::get('/laporan_penyaluran_dana_report',[AdminController::class,'laporan_bantuan_report']);

 

});