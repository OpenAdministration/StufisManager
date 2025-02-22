<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/dashboard', 'welcome');

Route::middleware(['auth'])->group(function (): void {


});

// login routes
Route::get('auth/login', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
Route::get('auth/callback', [\App\Http\Controllers\Auth\AuthController::class, 'callback'])->name('login.callback');
Route::get('auth/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout')->middleware(['auth']);
