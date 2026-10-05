<?php

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\StudentClassController;
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
            Route::get('/remove/image', 'removeImage')->name(
                'profile.image.delete',
            );
            Route::get('/edit/password', 'editPassword')->name(
                'profile.password.edit',
            );
            Route::put('/update/password', 'updatePassword')->name(
                'profile.password.update',
            );
        });

    // Setup Management
    Route::prefix('setups')
        ->controller(StudentClassController::class)
        ->group(function () {
            Route::get('/student/class', 'index')->name(
                'student.class.index',
            );
            Route::get('/student/class/create', 'create')->name(
                'student.class.create',
            );
            Route::post('/student/class/store', 'store')->name(
                'student.class.store',
            );
            Route::get('/student/class/edit/{studentClass}', 'edit')->name(
                'student.class.edit',
            );
            Route::put('/student/class/update/{studentClass}', 'update')->name(
                'student.class.update',
            );
            Route::get('/student/class/delete/{studentClass}', 'destroy')->name(
                'student.class.destroy',
            );
        });
});
