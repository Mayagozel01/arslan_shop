<?php

use App\Http\Controllers\AdminController\CountryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SotrudnikController;
use App\Http\Controllers\PokupatelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminController\WarehouseController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');


// Guest Routes (Auth)

Route::get('/register', [PokupatelController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [PokupatelController::class, 'register'])->name('register.submit');
Route::get('/login', [PokupatelController::class, 'showLoginForm'])->name('login');
Route::post('/login', [PokupatelController::class, 'login'])->name('login.submit');

Route::post('/logout', [PokupatelController::class, 'logout'])->name('logout')->middleware('auth');

// Pokupatel Routes
Route::prefix('pokupatel')->name('pokupatel.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [PokupatelController::class, 'dashboard'])->name('dashboard');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'showLoginForm'])->name('dashboard');
    Route::get('locations', [CountryController::class, 'index'])->name('locations');
    Route::post('/dashboard/login', [AuthController::class, 'dashboardLogin'])->name('dashboard.login');
    Route::get('/dashboard/home', [AdminController::class, 'dashboard'])->name('dashboard.home');
    Route::resource('/roles', RoleController::class);
    Route::resource('/sotrudniks', SotrudnikController::class);
    Route::resource('/products', AdminProductController::class);
    Route::resource('/warehouses', WarehouseController::class);

    // AJAX routes for creating related entities
    Route::post('/products/store-brand', [AdminProductController::class, 'storeBrand'])->name('products.store-brand');
    Route::post('/products/store-category', [AdminProductController::class, 'storeCategory'])->name('products.store-category');
    Route::post('/products/store-sub-category', [AdminProductController::class, 'storeSubCategory'])->name('products.store-sub-category');
    Route::post('/products/store-style', [AdminProductController::class, 'storeStyle'])->name('products.store-style');
    Route::post('/products/store-size', [AdminProductController::class, 'storeSize'])->name('products.store-size');
    Route::post('/products/store-color', [AdminProductController::class, 'storeColor'])->name('products.store-color');
    Route::get('/categories-by-main/{mainCategory}', function ($mainCategoryId) {
        return \App\Models\Category::where('main_category_id', $mainCategoryId)->get();
    })->name('categories.by-main');

    Route::resource('/locations', CountryController::class);
    Route::post('/locations/{country}/cities', [CountryController::class, 'storeCity'])->name('admin.locations.store-city');

});

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});
