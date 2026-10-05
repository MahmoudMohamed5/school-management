<?php

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // User Management All Route
    Route::prefix('users')
        ->controller(UserController::class)
        ->group(function () {
            Route::get('/view', 'index')->name('user.index');
            Route::get('/create', 'create')->name('user.create');
            Route::post('/create', 'store')->name('user.store');
            Route::get('/edit/{id}', 'edit')->name('user.edit');
            Route::put('/update/{id}', 'update')->name('user.update');
            Route::get('/delete/{id}', 'destroy')->name('user.destroy');
        });

    // User Profile and Change Password Route
    Route::prefix('profile')
        ->controller(ProfileController::class)
        ->group(function () {
            Route::get('/', 'index')->name('profile.index');
            Route::get('/edit', 'edit')->name('profile.edit');
            Route::put('/update', 'update')->name('profile.update');
            Route::get('/remove/image', 'removeImage')->name('profile.image.delete');
        });
});
