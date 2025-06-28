<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitController;

Route::get('/', function () {
    return view('login');
});

Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('/units', [AuthController::class, 'storeUnit'])->name('units.store');
Route::put('/units/{id}', [AuthController::class, 'updateUnit'])->name('units.update');
Route::delete('/units/{id}', [AuthController::class, 'deleteUnit'])->name('units.delete');
Route::get('/units/{id}', [AuthController::class, 'showUnit'])->name('units.show');
// Hapus/komentari rute '/dashboard' Anda yang lama, dan ganti dengan ini
Route::get('/dashboard', [UnitController::class, 'index'])->name('dashboard');
// Tambahkan rute ini, bisa di bawah rute login/register Anda
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

