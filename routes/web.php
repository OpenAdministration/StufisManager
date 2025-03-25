<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/instances', \App\Livewire\Pages\Instances\TableView::class)->name('instances');
    Route::get('/instances/new', \App\Livewire\Pages\Instances\Create::class)->name('instances.create');
    Route::get('/instances/{instance_id}', \App\Livewire\Pages\Instances\Report::class)->name('instances.report');
});

// login routes
Route::get('auth/login', [AuthController::class, 'login'])->name('login');
Route::get('auth/callback', [AuthController::class, 'callback'])->name('login.callback');
Route::get('auth/logout', [AuthController::class, 'logout'])->middleware(['auth'])->name('logout');
