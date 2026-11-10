<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'proses'])->name('login.proses');

Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
    Route::post('/logout', [PageController::class, 'logout'])->name('logout');
});

Route::redirect('/', '/login');
