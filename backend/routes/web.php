<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

// Avaleht
Route::get('/', function () {
    return view('index');
})->name('home');

// Kontaktileht
Route::get('/contact', function () {
    return view('contact');
})->name('contact.show');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

// suuna /login -> /admin/login (middleware seda kasutab)
Route::get('/login', function () {
    return redirect('/admin/login');
});


Route::get('/admin/login', [AuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'login']);

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->name('admin.logout');


Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');


    Route::resource('products', ProductController::class)->except(['show']);
});

Route::get('/pood', [ShopController::class, 'index'])->name('shop');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/product/{product}', [ShopController::class, 'show'])
    ->name('product.show');
