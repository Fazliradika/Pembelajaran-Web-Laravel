<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\StokController;

// =============================================
// Public Routes
// =============================================

// Halaman Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Halaman About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Halaman Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// =============================================
// Auth Routes (Login & Register)
// =============================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// =============================================
// Protected Routes (Require Authentication)
// =============================================
Route::middleware(['auth.check'])->group(function () {
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', function () {
        $products = \App\Models\Product::latest()->get();
        $tokos = \App\Models\Toko::latest()->get();
        $stoks = \App\Models\Stok::with(['product', 'toko'])->latest()->get();
        $users = \App\Models\User::latest()->get();
        
        return view('dashboard', compact('products', 'tokos', 'stoks', 'users'));
    })->name('dashboard');
    
    // Produk Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    // Toko Routes
    Route::get('/toko', [TokoController::class, 'index'])->name('tokos.index');
    Route::get('/toko/create', [TokoController::class, 'create'])->name('tokos.create');
    Route::post('/toko', [TokoController::class, 'store'])->name('tokos.store');
    Route::get('/toko/{toko}/edit', [TokoController::class, 'edit'])->name('tokos.edit');
    Route::put('/toko/{toko}', [TokoController::class, 'update'])->name('tokos.update');
    Route::delete('/toko/{toko}', [TokoController::class, 'destroy'])->name('tokos.destroy');
    
    // Stok Routes
    Route::get('/stoks', [StokController::class, 'index'])->name('stoks.index');
    Route::get('/stoks/create', [StokController::class, 'create'])->name('stoks.create');
    Route::post('/stoks', [StokController::class, 'store'])->name('stoks.store');
    Route::get('/stoks/{stok}/edit', [StokController::class, 'edit'])->name('stoks.edit');
    Route::put('/stoks/{stok}', [StokController::class, 'update'])->name('stoks.update');
    Route::delete('/stoks/{stok}', [StokController::class, 'destroy'])->name('stoks.destroy');
    
});
