<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

// home
Route::get('/', [MenuController::class, 'index'])->name('menu.home')->middleware('auth');

// admin
Route::resource('pegawai', PegawaiController::class)->middleware('auth');

// auth
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('auth');
Route::get('daftar', [AuthController::class, 'create'])->name('daftar');
Route::post('daftar', [AuthController::class, 'store'])->name('store');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
