<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Route;

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
    
    // Rutas de profesores
    Route::get('profesores', [ProfesorController::class, 'index'])->name('profesores.index');
    Route::get('profesores/create', [ProfesorController::class, 'create'])->name('profesores.create');
    Route::post('profesores', [ProfesorController::class, 'store'])->name('profesores.store');
    Route::get('profesores/{id}', [ProfesorController::class, 'show'])->name('profesores.show');
    Route::get('profesores/{id}/edit', [ProfesorController::class, 'edit'])->name('profesores.edit');
    Route::put('profesores/{id}', [ProfesorController::class, 'update'])->name('profesores.update');
    Route::delete('profesores/{id}', [ProfesorController::class, 'destroy'])->name('profesores.destroy');
});

require __DIR__.'/auth.php';