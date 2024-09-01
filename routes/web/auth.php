<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login',  [LoginController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->middleware(['guest'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth'])->name('logout');
