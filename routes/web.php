<?php

use App\Livewire\RoleManagement;
use App\Livewire\UserManagement;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:superadmin,admin')->group(function () {
        Route::get('/admin', function () {
            return view('admin');
        })->name('admin');

        Route::get('/roles', RoleManagement::class)->name('roles');
        Route::get('/users', UserManagement::class)->name('users.index');
    });
});
