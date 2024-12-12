<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\SessionController;

Route::get('/', function () {
    return view('homeView');
});


Route::get('/layanan', [PelayananController::class, 'index']);
Route::get('/pengajuan', [PengajuanController::class, 'index']);
Route::get('/template', [TemplateController::class, 'index']);
Route::get('/template/ahliwaris', [TemplateController::class, 'ahliWaris']);


Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/permohonan', [AdminController::class, 'permohonan']);
Route::get('/admin/login', [AdminController::class, 'loginPage']);
Route::post('/admin/login', [SessionController::class, 'login']);
Route::post('/admin/register', [SessionController::class, 'register']);





