<?php

use Illuminate\Support\Facades\Route;
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

Route::prefix('jenis-donatur')->group(function () {

});

Route::prefix('donatur')->group(function () {
    Route::get('/', [DonaturController::class, 'index'])->name('donatur.index');
    Route::post('/store', [DonaturController::class, 'store'])->name('donatur.store');
    Route::put('/update', [DonaturController::class, 'update'])->name('donatur.update');
    Route::delete('/destroy', [DonaturController::class, 'destroy'])->name('donatur.destroy');
});

Route::prefix('donasi-uang')->group(function () {

});

Route::prefix('donasi-beras')->group(function () {

});