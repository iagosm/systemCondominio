<?php

use App\Http\Controllers\IncidentController;
use App\Http\Controllers\ResidentsController;
use App\Http\Controllers\RoleController;
// use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

// Route::resource("users", UserController::class);
// ->only(['create', 'store'])->middleware('permission:users.create');
// Route::resource("roles", RoleController::class);
// ->only(['create', 'store'])->middleware('permission:roles.create');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource("residents", ResidentsController::class);
    // Route::resource("units", UnitController::class);// Pendente
    Route::resource("incidents", IncidentController::class);
    Route::resource("users", UserController::class);
    Route::resource("roles", RoleController::class);
});


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
