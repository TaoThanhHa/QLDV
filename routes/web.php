<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoanVienController;
use App\Http\Controllers\AuthController;

Route::resource('doanviens', DoanVienController::class)->middleware('auth');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

