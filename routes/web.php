<?php

use App\Http\Controllers\categoriaController;
use App\Http\Controllers\laboratorioController;
use App\Http\Controllers\marcaController;
use App\Http\Controllers\presentacioneController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\proveedoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

route::resources([
    'categorias' => categoriaController::class,
    'marcas' => marcaController::class,
    'presentaciones' => presentacioneController::class,
    'proveedores' => proveedoreController::class,
    'laboratorios' => laboratorioController::class,
    'productos' => productoController::class
]);
