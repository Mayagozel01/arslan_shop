<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('home');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('/roles', RoleController::class);

});

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});

