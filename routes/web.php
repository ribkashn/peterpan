<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PetugasController;
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
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); //..halaman home utama / pelanggan

//admin
Route::group(['middleware' => 'admin'], function (){
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/transaksi',[AdminController::class,'transaksi']);
    Route::get('/admin/motor_reg/input',[AdminController::class,'input_motor_reg']);
    Route::post('/admin/motor_reg/simpan',[AdminController::class,'simpan']);
    //form input motor premium
    Route::get('/admin/motor_pre/input',[AdminController::class,'input_motor_pre']);
    Route::post('/admin/motor_pre/simpan',[AdminController::class,'simpan']);
    //form input mobil reg
    Route::get('/admin/mobil_reg/input',[AdminController::class,'input_mobil_reg']);
    Route::post('/admin/mobil_reg/simpan',[AdminController::class,'simpan']);
    //form input mobil premium
    Route::get('/admin/mobil_pre/input',[AdminController::class,'input_mobil_pre']);
    Route::post('/admin/mobil_pre/simpan',[AdminController::class,'simpan']);
    // edit data transaksi
    Route::get('/transaksi/edit_trans/{id_trans}',[AdminController::class,'edit']); // edit data kp  
    Route::post('/transaksi/update/{id_trans}',[AdminController::class,'update']); // simpan edit  data transaksi  
    Route::get('/transaksi/delete_trans/{id_trans}',[AdminController::class,'delete']); // hapus data transaksi  
    // tambah data user
    Route::get('/data_petugas',[AdminController::class,'data_petugas']);
    Route::get('/data_petugas/input',[AdminController::class,'input_petugas']);
    Route::post('/data_petugas/simpan',[AdminController::class,'simpan_petugas']);
    Route::get('/data_petugas/delete_petugas/{id}',[AdminController::class,'hapus']);
    //laporan
    Route::get('/laporan/transaksi',[AdminController::class,'laporan']);
    Route::post('/laporan/transaksi',[AdminController::class,'laporan']);
    Route::get('/transaksi/export', [AdminController::class,'transaksiexport']);
    // laporan petugas
    Route::get('/laporan/petugas',[AdminController::class,'laporanPetugas']);
    Route::post('/laporan/petugas',[AdminController::class,'laporanPetugas']);
    Route::get('/petugas/export/', [AdminController::class,'petugasexport']);
    //Rating
    
    //Route::get('/laporpetugas',[AdminController::class,'laporanPetugas']);
    //Route::post('/laporpetugas',[AdminController::class,'laporanPetugas']);

    //Route::get('/laporan',[AdminController::class,'laporan']);
    Route::get('/laporan_pelanggan',[AdminController::class,'laporan_count']);
    // gaji
    Route::get('/detail_gaji',[AdminController::class,'detailgaji']);
    Route::get('/detail_gaji/edit_gaji/{id}',[AdminController::class,'editgaji']);
    Route::post('/detail_gaji/update/{id}',[AdminController::class,'updategaji']);

   
    //export excel
    //Route::post('/transaksiexport',[AdminController::class,'transaksiexport']);
    //Route::get('/petugasexport',[AdminController::class,'petugasexport']);
});

//petugas
Route::group(['middleware' => 'petugas'], function (){
    Route::get('/petugas',[PetugasController::class,'index']);
    Route::get('/laporan_petugas',[PetugasController::class,'laporan']);
    Route::get('/daftar_cuci',[PetugasController::class,'daftar_cuci']);

    Route::get('/daftar_cuci/edit_cuci/{id_trans}',[PetugasController::class,'editCuci']); // edit data kp  
    Route::post('/daftar_cuci/update/{id_trans}',[PetugasController::class,'updateCuci']);
    // laporan
    Route::get('/laporan_petugas',[PetugasController::class,'laporan']);
    Route::post('/laporan_petugas',[PetugasController::class,'laporan']);
});
//pelanggan
Route::group(['middleware' => 'pelanggan'], function (){
    Route::get('/pelanggan',[PelangganController::class,'index']);
    Route::get('/tentang',[PelangganController::class,'tentang']); //tampilkan view
    Route::get('/cuci_motor',[PelangganController::class,'motor']);
    Route::get('/cuci_mobil',[PelangganController::class,'mobil']);
    Route::get('/pesanan',[PelangganController::class,'pesanan']);
    //form input motor reg
    Route::get('/motor_reg/input',[PelangganController::class,'input_motor_reg']);
    Route::post('/motor_reg/simpan',[PelangganController::class,'simpan']);
    //form input motor premium
    Route::get('/motor_pre/input',[PelangganController::class,'input_motor_pre']);
    Route::post('/motor_pre/simpan',[PelangganController::class,'simpan']);
    //form input mobil reg
    Route::get('/mobil_reg/input',[PelangganController::class,'input_mobil_reg']);
    Route::post('/mobil_reg/simpan',[PelangganController::class,'simpan']);
    //form input mobil premium
    Route::get('/mobil_pre/input',[PelangganController::class,'input_mobil_pre']);
    Route::post('/mobil_pre/simpan',[PelangganController::class,'simpan']);
    //rating
    Route::get('/rating/edit_rating/{id_trans}',[PelangganController::class,'editRating']); // edit data kp  
    Route::post('/rating/update/{id_trans}',[PelangganController::class,'updateRating']);
});