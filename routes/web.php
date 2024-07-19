<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuarioController;

Route::get('/', [HabitacionesController::class, 'index']);
Route::get('/habitaciones', [HabitacionesController::class, 'index']);
Route::post('/habitaciones/disponibles', [HabitacionesController::class, 'disponibles']);
Route::get('/habitaciones/{id}', [HabitacionesController::class, 'show']);

/* Route::get('/reservas', [ReservaController::class, 'index']);
Route::get('/reservas/create', [ReservaController::class, 'create']);
Route::post('/reservas/create', [ReservaController::class, 'create']);
Route::post('/reservas', [ReservaController::class, 'store']); */
Route::resource('reservas', ReservaController::class);
Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');

/* Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::get('/usuarios/create', [UsuarioController::class, 'create']);
Route::post('/usuarios', [UsuarioController::class, 'store']); */
Route::resource('usuarios', UsuarioController::class);
//Route::post('usuarios', UsuarioController::class, 'store');

