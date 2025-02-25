<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/profile', 'welcome')->name('profile');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

});


// login routes
Route::get('auth/login', [AuthController::class, 'login'])->name('login');
Route::get('auth/callback', [AuthController::class, 'callback'])->name('login.callback');
Route::get('auth/logout', [AuthController::class, 'logout'])->middleware(['auth'])->name('logout');
