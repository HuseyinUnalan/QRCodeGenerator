<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRController;
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



Route::get('/', [QRController::class, 'Index']);
Route::post('/', [QRController::class, 'generateQRCode'])->name('store.qr');
