<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisDonaturController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\DonasiUangController;
use App\Http\Controllers\DonasiBerasController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('jenis-donatur')->group(function () {
    Route::get('/', [JenisDonaturController::class, 'index'])->name('jenis_donatur.index');
    Route::post('/store', [JenisDonaturController::class, 'store'])->name('jenis_donatur.store');
    Route::put('/update', [JenisDonaturController::class, 'update'])->name('jenis_donatur.update');
    Route::delete('/destroy', [JenisDonaturController::class, 'destroy'])->name('jenis_donatur.destroy');
});
Route::prefix('donatur')->group(function () {
    Route::get('/', [DonaturController::class, 'index'])->name('donatur.index');
    Route::post('/store', [DonaturController::class, 'store'])->name('donatur.store');
    Route::put('/update', [DonaturController::class, 'update'])->name('donatur.update');
    Route::delete('/destroy', [DonaturController::class, 'destroy'])->name('donatur.destroy');
});
Route::prefix('donasi-uang')->group(function () {
    Route::get('/', [DonasiUangController::class, 'index'])->name('donasi_uang.index');
    Route::post('/store', [DonasiUangController::class, 'store'])->name('donasi_uang.store');
    Route::put('/update', [DonasiUangController::class, 'update'])->name('donasi_uang.update');
    Route::delete('/destroy', [DonasiUangController::class, 'destroy'])->name('donasi_uang.destroy');
});
Route::prefix('donasi-beras')->group(function () {
    Route::get('/', [DonasiBerasController::class, 'index'])->name('donasi_beras.index');
    Route::post('/store', [DonasiBerasController::class, 'store'])->name('donasi_beras.store');
    Route::put('/update', [DonasiBerasController::class, 'update'])->name('donasi_beras.update');
    Route::delete('/destroy', [DonasiBerasController::class, 'destroy'])->name('donasi_beras.destroy');
});