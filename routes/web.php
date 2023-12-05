<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/logout', [LoginController::class, 'logout']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('/kriteria', KriteriaController::class)->parameter('kriteria', 'id');

    Route::resource('/alternatif', AlternatifController::class)->parameter('alternatif', 'id');

    Route::resource('sub_kriteria', SubKriteriaController::class);


});

// //menampilkan halaman login sebagai halaman utama
// Route::view('/','layouts.login')->name('login');

Route::fallback(function () {
    return redirect('/login');
});
