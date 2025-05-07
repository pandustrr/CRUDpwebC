<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'authenticate']);
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');

Route::resource('menus', MenuController::class)->except(['show']);
Route::get('/pengelolaan', [MenuController::class, 'index'])->name('pengelolaan');
