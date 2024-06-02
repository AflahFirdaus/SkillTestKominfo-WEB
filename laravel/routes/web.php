<?php

use App\Http\Controllers\ManagemenBarang\ManagemenBarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home.home');
});

Route::get('/managemen_barang',[ManagemenBarangController::class,'index'])->name('managemen_barang');
Route::post('/managemen_barang',[ManagemenBarangController::class,'store'])->name('managemen_barang.post');
Route::put('/managemen_barang/{id}',[ManagemenBarangController::class,'update'])->name('managemen_barang.update');
Route::delete('/managemen_barang/{id}',[ManagemenBarangController::class,'destroy'])->name('managemen_barang.delete');