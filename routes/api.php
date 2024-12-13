<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PengajuanController;
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
    Route::get('/pengajuan', [PengajuanController::class, 'get'])->middleware("auth:sanctum");
});
