<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- INI PERUBAHAN UTAMA ---
// Kita tetapkan lagi bahwa halaman utama (/) adalah HomeController Anda.
Route::get('/', [HomeController::class, 'index'])->name('home');


// --- Rute Publik (Bisa diakses semua orang) ---
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


// --- Rute yang Membutuhkan Login (Hanya untuk Pengguna) ---
Route::middleware('auth')->group(function () {
    // Rute dashboard dari Breeze, ini adalah halaman yang dilihat user setelah login
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute profil dari Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute keranjang dan checkout Anda
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [OrderController::class, 'create'])->name('order.create');
    Route::post('/checkout', [OrderController::class, 'store'])->name('order.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('orders', \App\Http\controllers\Admin\OrderController::class)->only(['index', 'show', 'update']);
});

// Baris ini ditambahkan oleh Breeze dan PENTING, jangan dihapus.
// Ini yang memuat semua rute untuk login, register, logout, dll.
require __DIR__ . '/auth.php';
