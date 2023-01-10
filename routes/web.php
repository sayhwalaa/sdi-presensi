<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;

// home
Route::get('/', [MenuController::class, 'index'])->name('menu.home')->middleware('auth');

// admin
Route::get('admin/pegawai', [AdminController::class, 'pegawai'])->name('admin.pegawai')->middleware('auth');
Route::get('admin/user', [AdminController::class, 'user'])->name('admin.user')->middleware('auth');

// auth
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('auth');
Route::get('daftar', [AuthController::class, 'create'])->name('daftar');
Route::post('daftar', [AuthController::class, 'store'])->name('store');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// resource
Route::resource('pegawai', PegawaiController::class)->middleware('auth');
