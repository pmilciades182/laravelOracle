<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\WmsController;
use App\Http\Controllers\ReportController;

// Rutas públicas
Route::middleware('guest')->group(function () {
    // Ruta de login
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Rutas protegidas
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Gestión de Usuarios
    Route::middleware('can:view-users')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('can:create-users');
        Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('can:create-users');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('can:edit-users');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('can:edit-users');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('can:delete-users');
    });

    // Gestión de Sucursales
    Route::middleware('can:view-branches')->group(function () {
        Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');
        Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create')->middleware('can:create-branches');
        Route::post('/branches', [BranchController::class, 'store'])->name('branches.store')->middleware('can:create-branches');
        Route::get('/branches/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit')->middleware('can:edit-branches');
        Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update')->middleware('can:edit-branches');
        Route::delete('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy')->middleware('can:delete-branches');
    });

    // Sistema WMS
    Route::middleware('can:view-inventory')->prefix('wms')->group(function () {
        Route::get('/', [WmsController::class, 'dashboard'])->name('wms.dashboard');
        Route::get('/inventory', [WmsController::class, 'inventory'])->name('wms.inventory');
        Route::get('/orders', [WmsController::class, 'orders'])->name('wms.orders');
        Route::get('/movements', [WmsController::class, 'movements'])->name('wms.movements');
    });

    // Reportes
    Route::middleware('can:view-reports')->prefix('reports')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/inventory', [ReportController::class, 'inventory'])->name('reports.inventory');
        Route::get('/movements', [ReportController::class, 'movements'])->name('reports.movements');
        Route::get('/orders', [ReportController::class, 'orders'])->name('reports.orders');
    });
});
