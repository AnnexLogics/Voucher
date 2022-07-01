<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/voucher/index',[\App\Http\Controllers\VoucherController::class,'index'])->name('voucher.get');
 
Route::post('/voucher/store',[App\Http\Controllers\VoucherController::class,'store'])->name('voucher.store');

Route::get('/voucher/edit/{id}',[\App\Http\Controllers\VoucherController::class,'edit'])->name('voucher.edit');

Route::post('/voucher/update',[App\Http\Controllers\VoucherController::class,'update'])->name('voucher.update');

Route::get('/voucher/delete/{id}',[\App\Http\Controllers\VoucherController::class,'delete'])->name('voucher.delete');

// Route::get('/voucher/restore/{id}',[\App\Http\Controllers\VoucherController::class,'restore'])->name('voucher.restore');