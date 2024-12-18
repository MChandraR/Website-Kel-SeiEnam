<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\NewsController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('/')->group(function () {
    //API route untuk berita
    Route::get('/news', [Newscontroller::class, 'index']);
    Route::post('/news', [Newscontroller::class, 'store'])->middleware('auth:sanctum');
    Route::put('/news', [Newscontroller::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/news', [Newscontroller::class, 'destroy'])->middleware('auth:sanctum');


    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/pengajuan', [PengajuanController::class, 'create']);
    Route::put('/pengajuan', [PengajuanController::class, 'update'])->middleware("auth:sanctum");
    Route::get('/pengajuan', [PengajuanController::class, 'get'])->middleware("auth:sanctum");
    Route::get('/daftar-pengajuan', [PengajuanController::class, 'daftarAjuan']);
    

    //API ROute untuk pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'read']);
    Route::patch('/pengaduan', [PengaduanController::class, 'readmin']);
    Route::post('/pengaduan', [PengaduanController::class, 'store']);
    Route::delete('/pengaduan', [PengaduanController::class, 'destroy']);
});
