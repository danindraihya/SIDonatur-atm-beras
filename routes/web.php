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

Route::get('/', [DonaturController::class, 'index']);
Route::post('/tambahDonatur', [DonaturController::class, 'store']);
Route::put('/editDonatur', [DonaturController::class, 'update']);
Route::delete('/deleteDonatur', [DonaturController::class, 'destroy']);