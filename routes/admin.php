<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;


Route::get('/backend', function () {
    return redirect()->route('backend.dashboard');
});

Route::prefix('backend')->name('backend.')->group(function () {
    // Admin Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    // Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login']);
    //Auth::routes();

    // Protected Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //Admins
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admins', 'index')->name('admins');
            Route::get('view/admin/{id}', 'view')->name('view.admin');
            Route::get('edit/admin/{id}', 'edit')->name('edit.admin');
            Route::post('update/admin/{id}', 'update')->name('update.admin');
            Route::post('create/admin', 'create')->name('create.admin');
            Route::get('delete/admin/{id}', 'deleteUser')->name('delete.admin');
        });

        //Roles
        Route::controller(RolesController::class)->group(function () {
            Route::get('/roles/{id?}', 'index')->name('roles');
            Route::post('role/create', 'create')->name('create.role');
            Route::post('edit/role/permission/{id}', 'update')->name('edit.permissions');
            Route::get('role/user/remove/{id}', 'removeRole')->name('role.remove');
            Route::get('role/delete/{id}', 'delete')->name('delete.role');
        });

        //Profile
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'index')->name('profile');
            Route::get('/profile/edit', 'edit')->name('edit.profile');
            Route::post('/profile/token', 'addToken');
            Route::post('/profile/password/update', 'updatePassword')->name('profile.password');
        });

        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    });
});

//Auth::routes();

