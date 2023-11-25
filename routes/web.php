<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainPageController;

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


Route::get('/', [MainPageController::class, 'dashboard']);
Route::get('/login', [LoginController::class, 'show_login_form'])->name('login');
Route::post('/login',[LoginController::class, 'process_login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('main')->group(function () {

   /* WIdget*/
   Route::get('/detail_dana_masuk_widget',[MainPageController::class,'detail_dana_masuk_widget']);
   Route::get('/detail_makanan_masuk_widget',[MainPageController::class,'detail_makanan_masuk_widget']);
   Route::get('/detail_penyaluran_makanan_widget',[MainPageController::class,'detail_penyaluran_makanan_widget']);
   Route::get('/detail_penyaluran_dana_widget',[MainPageController::class,'detail_penyaluran_dana_widget']);
   Route::get('/list_bantuan/detail_list_bantuan/{code}',[MainPageController::class,'detail_list_bantuan']);

});
Route::group(['middleware' => ['dashboard']], function(){ 
    Route::get('/home', [AdminController::class, 'dashboard']);

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
            Route::post('/delete_stok_masuk',[AdminController::class,'delete_stok_masuk']);

            Route::get('/bantuan_dana/detail_dana_masuk',[AdminController::class,'detail_dana_masuk']);
            Route::get('/print_detail_dana_masuk',[AdminController::class,'print_detail_dana_masuk']);

            Route::get('/preview_barang_masuk',[AdminController::class,'preview_barang_masuk']);
            Route::post('/delete_preview_bantuan',[AdminController::class,'delete_preview_bantuan']);
            Route::post('/insert_preview_bantuan',[AdminController::class,'insert_preview_bantuan']);
            Route::post('/edit_preview_bantuan',[AdminController::class,'edit_preview_bantuan']);

            Route::post('/insert_stok_masuk',[AdminController::class,'insert_stok_masuk']);


            Route::get('/preview_barang_keluar',[AdminController::class,'preview_barang_keluar']);
            Route::get('/preview_dana_keluar',[AdminController::class,'preview_barang_keluar']);

            Route::post('/insert_preview_bantuan_keluar',[AdminController::class,'insert_preview_bantuan_keluar']);
            Route::post('/insert_bantuan_keluar',[AdminController::class,'insert_bantuan_keluar']);
            Route::post('/insert_dana_keluar',[AdminController::class,'insert_dana_keluar'] );

            Route::post('/delete_preview_keluar',[AdminController::class,'delete_preview_keluar']);
            Route::post('/delete_stok_keluar',[AdminController::class,'delete_stok_keluar']);


            Route::get('/insert_data_penerima',[AdminController::class,'insert_data_penerima']);

            Route::post('/insert_bantuan',[AdminController::class,'insert_bantuan']);
            Route::post('/delete_bantuan/{id}',[AdminController::class,'delete_bantuan']);
            Route::post('/update_bantuan/{id}',[AdminController::class,'update_bantuan']);

            /*Data Penyaluran*/
            Route::get('/penyaluran_makanan',[AdminController::class,'penyaluran_bantuan']);
            Route::get('/penyaluran_dana',[AdminController::class,'penyaluran_bantuan']);
            Route::get('/list_bantuan',[AdminController::class,'list_bantuan']);
            Route::get('/list_bantuan_report',[AdminController::class,'list_bantuan_report']);

            Route::get('list_bantuan/{id}',[AdminController::class,'list_bantuan']);
            Route::post('/update_list_bantuan',[AdminController::class,'update_list_bantuan']);

            Route::get('/list_bantuan/detail_list_bantuan/{code}',[AdminController::class,'detail_list_bantuan']);


            Route::post('/delete_penyaluran_bantuan',[AdminController::class,'delete_penyaluran_bantuan']);
            Route::get('/penyaluran_makanan/detail_penyaluran_bantuan/{id}',[AdminController::class,'detail_penyaluran_bantuan']);  
            Route::get('/penyaluran_dana/detail_penyaluran_bantuan/{id}',[AdminController::class,'detail_penyaluran_bantuan']);  


            /*User List */
            Route::get('/user_list',[AdminController::class,'user_list']);
            Route::get('/laporan_user',[AdminController::class,'laporan_user']);
            Route::post('insert_user',[AdminController::class,'insert_user']);
            Route::post('delete_user',[AdminController::class,'delete_user']);

            Route::get('/volunteer',[AdminController::class,'volunteer']);
            Route::get('/laporan_volunteer',[AdminController::class,'laporan_volunteer']);

            Route::get('/insert_volunteer/{id}',[AdminController::class,'insert_volunteer']);  
            Route::post('/edit_volunteer',[AdminController::class,'edit_volunteer']);  
            Route::post('delete_volunteer/{id}',[AdminController::class,'delete_volunteer']);

            /*Data Penyaluran*/
            Route::get('/laporan_bantuan_masuk',[AdminController::class,'laporan_masuk']);
            Route::get('/laporan_bantuan_makanan',[AdminController::class,'laporan_masuk']);
            Route::get('/laporan_bantuan_dana',[AdminController::class,'laporan_masuk']);
            Route::get('/laporan_bantuan_masuk_report',[AdminController::class,'laporan_masuk_report']);
            Route::get('/laporan_bantuan_makanan_report',[AdminController::class,'laporan_masuk_report']);
            Route::get('/laporan_bantuan_dana_report',[AdminController::class,'laporan_masuk_report']);
            Route::get('/laporan_dana',[AdminController::class,'laporan_dana']);
            Route::get('/laporan_dana_report',[AdminController::class,'laporan_dana_report']);


        


            Route::get('/laporan_penyaluran_bantuan',[AdminController::class,'laporan_bantuan']);
            Route::get('/laporan_penyaluran_dana',[AdminController::class,'laporan_bantuan']);
            Route::get('/laporan_penyaluran_makanan',[AdminController::class,'laporan_bantuan']);
            Route::get('/laporan_penyaluran_bantuan_report',[AdminController::class,'laporan_bantuan_report']);
            Route::get('/laporan_penyaluran_makanan_report',[AdminController::class,'laporan_bantuan_report']);
            Route::get('/laporan_penyaluran_dana_report',[AdminController::class,'laporan_bantuan_report']);


            /* WIdget*/
            Route::get('/detail_dana_masuk_widget',[AdminController::class,'detail_dana_masuk_widget']);
            Route::get('/detail_makanan_masuk_widget',[AdminController::class,'detail_makanan_masuk_widget']);
            Route::get('/detail_penyaluran_makanan_widget',[AdminController::class,'detail_penyaluran_makanan_widget']);
            Route::get('/detail_penyaluran_dana_widget',[AdminController::class,'detail_penyaluran_dana_widget']);

        

        });
    });