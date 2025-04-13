<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\CategoryProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('tnc', 'front-end.tnc')->name('tnc');
Route::view('privacy-policy', 'front-end.privacy-policy')->name('privacy-policy');

Route::get('products', [ShopController::class, 'index'])->name('shop');
Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
Route::post('checkout', [CheckOutController::class, 'index'])->name('checkout.post');

require __DIR__ . '/auth.php';

Route::get('{category}/{slug}', [ProductController::class, 'index'])->name('product');
Route::get('{category}', [CategoryController::class, 'index'])->name('category');
