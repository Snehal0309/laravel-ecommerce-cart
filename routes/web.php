<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
 use App\Http\Controllers\Admin\CartAdminController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Admin Panel routes
    Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Products CRUD

    Route::resource('products', ProductController::class);


    // Cart

Route::prefix('admin')->middleware(['web','auth'])->group(function () {
    Route::get('/cart', [CartAdminController::class, 'index'])->name('admin.cart.index');
});
    Route::get('/admin/cart', [CartController::class, 'index'])->name('admin.cart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.delete');

    // Orders
Route::resource('orders', OrderController::class)->only(['index', 'show']);
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});

require __DIR__.'/auth.php';
