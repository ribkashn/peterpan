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
});

//petugas
Route::group(['middleware' => 'petugas'], function (){
    Route::get('/petugas',[PetugasController::class,'index']);
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
});