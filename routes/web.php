<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\AgendamientoDeCitaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Ruta para la página de inicio
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ruta para el dashboard (solo para usuarios autenticados y verificados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas (requieren autenticación)
Route::middleware('auth')->group(function () {

    // Rutas del perfil de usuario
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Rutas para el módulo de ventas
    Route::prefix('ventas')->group(function () {
        Route::get('/', [VentasController::class, 'index'])->name('ventas.index');
        Route::get('/create', [VentasController::class, 'create'])->name('ventas.create');
        Route::post('/store', [VentasController::class, 'store'])->name('ventas.store');
        Route::get('/edit/{id}', [VentasController::class, 'edit'])->name('ventas.edit');
        Route::post('/update/{id}', [VentasController::class, 'update'])->name('ventas.update');
        Route::delete('/delete/{id}', [VentasController::class, 'delete'])->name('ventas.delete');
    });

    // Rutas para el módulo de agendamiento de citas
    Route::prefix('agendamiento')->group(function () {
        Route::get('/', [AgendamientoDeCitaController::class, 'index'])->name('agendamiento.index');
        Route::get('/create', [AgendamientoDeCitaController::class, 'create'])->name('agendamiento.create');
        Route::post('/store', [AgendamientoDeCitaController::class, 'store'])->name('agendamiento.store');
        Route::get('/edit/{id}', [AgendamientoDeCitaController::class, 'edit'])->name('agendamiento.edit');
        Route::post('/update/{id}', [AgendamientoDeCitaController::class, 'update'])->name('agendamiento.update');
        Route::delete('/delete/{id}', [AgendamientoDeCitaController::class, 'delete'])->name('agendamiento.delete');
    });

    // Rutas para el módulo de inventario
    Route::prefix('inventario')->group(function () {
        Route::get('/', [InventarioController::class, 'index'])->name('inventario.index');
        Route::get('/create', [InventarioController::class, 'create'])->name('inventario.create');
        Route::post('/store', [InventarioController::class, 'store'])->name('inventario.store');
        Route::get('/edit/{item}', [InventarioController::class, 'edit'])->name('inventario.edit'); // 'item' es el modelo aquí
        Route::post('/update/{item}', [InventarioController::class, 'update'])->name('inventario.update');
        Route::delete('/delete/{item}', [InventarioController::class, 'delete'])->name('inventario.delete');
    });
    // Rutas del carrito de compras
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index'); // Ver el carrito
    Route::post('/', [CartController::class, 'store'])->name('cart.store'); // Agregar al carrito
    Route::put('/{id}', [CartController::class, 'update'])->name('cart.update'); // Actualizar el carrito
    Route::delete('/{id}', [CartController::class, 'destroy'])->name('cart.destroy'); // Eliminar un artículo del carrito
});
});

// Incluir rutas de autenticación
require __DIR__.'/auth.php';
