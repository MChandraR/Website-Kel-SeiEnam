<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PengajuanController;

Route::get('/', function () {
    return view('homeView');
});


Route::get('/layanan', [PelayananController::class, 'index']);
Route::get('/pengajuan', [PengajuanController::class, 'index']);