<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;

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

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('prosesLogin', 'App\Http\Controllers\AuthController@prosesLogin')->name('prosesLogin');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('prosesReg', 'App\Http\Controllers\AuthController@prosesReg')->name('prosesRegister');

Route::group(['middleware'=>['auth']], function(){
    Route::group(['middleware'=>['CekUser:admin']], function(){
        //route untuk role admin
        Route::resource('admin', AdminController::class);
        Route::resource('pengaduan', PengaduanController::class);
        Route::resource('tanggapan', TanggapanController::class);
    });

    Route::group(['middleware'=>['CekUser:petugas']], function() {
        //Route untuk Petugas
        Route::resource('petugas', PetugasController::class);
    });

    Route::group(['middleware'=>['CekUser:masyarakat']], function() {
        //Route untuk masyarakat
        Route::resource('masyarakat', MasyarakatController::class);
        //Route::resource('pengaduan', PengaduanController::class);
        Route::get('pengaduanku', 'App\Http\Controllers\PengaduanController@pengaduanUser')->name('pengaduanku');
    });

});