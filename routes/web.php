<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SotrudnikController;
use App\Http\Controllers\PokupatelController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
})->name('home');


// Guest Routes (Auth)
Route::middleware('guest')->group(function () {
    Route::get('/register', [PokupatelController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [PokupatelController::class, 'register'])->name('register.submit');
    Route::get('/login', [PokupatelController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [PokupatelController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [PokupatelController::class, 'logout'])->name('logout')->middleware('auth');

// Pokupatel Routes
Route::prefix('pokupatel')->name('pokupatel.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [PokupatelController::class, 'dashboard'])->name('dashboard');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('/roles', RoleController::class);
    Route::resource('/sotrudniks', SotrudnikController::class);
    Route::get('/products', [ProductController::class, 'index'])->name('products');


});

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});
