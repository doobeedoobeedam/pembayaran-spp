<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DashboardSiswaController;

Route::redirect('/', '/login');

// Route::get('/', function () {
//     return view('auth/login');
// });

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'autentikasi']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'registrasi']);
Route::get('/dashboard/siswa', [DashboardSiswaController::class, 'index'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/siswa', SiswaController::class)->middleware('auth');
Route::resource('/kelas', KelasController::class)->middleware('auth');
Route::resource('/spp', SppController::class)->middleware('auth');
Route::get('/pembayaran/download', [PembayaranController::class, 'download'])->middleware('auth');
Route::resource('/pembayaran', PembayaranController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');