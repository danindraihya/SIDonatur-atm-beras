<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisDonaturController;
use App\Http\Controllers\DonaturController;

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
Route::prefix('donasi-uang')->group(function () {});
Route::prefix('donasi-beras')->group(function () {});