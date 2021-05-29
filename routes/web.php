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
});

//petugas
Route::group(['middleware' => 'petugas'], function (){
    Route::get('/petugas',[PetugasController::class,'index']);
});
//pelanggan
Route::group(['middleware' => 'pelanggan'], function (){
    Route::get('/pelanggan',[PelangganController::class,'index']);
});