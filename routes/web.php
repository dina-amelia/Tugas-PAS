<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnakPantiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\KonfirmasiController;

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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', function () {
     if (Auth::user()->type == 2) { // if the current role is Administrator
                    return redirect("admin");
                }else{
                    return redirect("user");

                }
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth',"admin"]],
    function (){

        Route::get('/', function () {
            return view('admin.index');
        });
        Route::group(['prefix' => 'content'],function (){
            Route::resource('anakpanti', AnakPantiController::class);
            Route::resource('kegiatan', KegiatanController::class);
            Route::resource('galeri', GaleriController::class);
            Route::resource('donasi', DonasiController::class);
            Route::resource('konfirmasi', KonfirmasiController::class);
        });

});


Route::group(['prefix' => 'user', 'middleware' => ['auth',"member"]],
    function (){
        Route::get('/', [LaporanController::class, 'index']);
        //  Route::get('/user/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');
        Route::resource('laporan', LaporanController::class);

});



Route::resource('donatur', DonaturController::class);