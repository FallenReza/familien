<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

