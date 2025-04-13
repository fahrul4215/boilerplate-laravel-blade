<?php

use App\Http\Controllers\Auth\AppSettingsController;
use App\Http\Controllers\Auth\CategoryProductController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\ProductController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        // Volt::route('register', 'pages.auth.register')
        //     ->name('register');

        Volt::route('login', 'pages.auth.login')
            ->name('login');

        Volt::route('forgot-password', 'pages.auth.forgot-password')
            ->name('password.request');

        Volt::route('reset-password/{token}', 'pages.auth.reset-password')
            ->name('password.reset');
    });

    Route::middleware('auth')->group(function () {
        Volt::route('verify-email', 'pages.auth.verify-email')
            ->name('verification.notice');

        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Volt::route('confirm-password', 'pages.auth.confirm-password')
            ->name('password.confirm');

        Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::view('profile', 'auth.profile')
            ->name('profile');

        Route::resource('category-product', CategoryProductController::class);
        Route::resource('product', ProductController::class);
        Route::resource('app-settings', AppSettingsController::class);
    });
});
