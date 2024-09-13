<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\AgendamientoDeCitaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',
[HomeController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rutas del perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para el módulo de ventas
    Route::prefix('ventas')->group(function () {
        Route::get('/', [VentasController::class, 'index'])->name('ventas.index');
        Route::get('create', [VentasController::class, 'create'])->name('ventas.create');
        Route::post('store', [VentasController::class, 'store'])->name('ventas.store');
        Route::get('edit/{id}', [VentasController::class, 'edit'])->name('ventas.edit');
         Route::post('update/{id}', [VentasController::class, 'update'])->name('ventas.update');
        Route::delete('delete/{id}', [VentasController::class, 'delete'])->name('ventas.delete');
    });

    // Rutas para el módulo de agendamiento de citas
    Route::prefix('agendamiento')->group(function () {
        Route::get('/', [AgendamientoDeCitaController::class, 'index'])->name('agendamiento.index');
        Route::get('create', [AgendamientoDeCitaController::class, 'create'])->name('agendamiento.create');
        Route::post('store', [AgendamientoDeCitaController::class, 'store'])->name('agendamiento.store');
        Route::get('edit/{id}', [AgendamientoDeCitaController::class, 'edit'])->name('agendamiento.edit');
        Route::post('update/{id}', [AgendamientoDeCitaController::class, 'update'])->name('agendamiento.update');
        Route::delete('delete/{id}', [AgendamientoDeCitaController::class, 'delete'])->name('agendamiento.delete');
    });
    // Ruta de el modulo de inventario 
    Route::prefix('inventario')->group(function () {
        Route::get('/', [InventarioController::class, 'index'])->name('inventario.index');
        Route::get('create', [InventarioController::class, 'create'])->name('inventario.create');
        Route::post('store', [InventarioController::class, 'store'])->name('inventario.store');
        Route::get('edit/{item}', [InventarioController::class, 'edit'])->name('inventario.edit'); // 'item' es el modelo aquí
        Route::post('update/{item}', [InventarioController::class, 'update'])->name('inventario.update');
        Route::delete('delete/{item}', [InventarioController::class, 'delete'])->name('inventario.delete');
    });    
});

require __DIR__.'/auth.php';
