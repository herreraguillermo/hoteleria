<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuarioController;

Route::get('/', [HabitacionesController::class, 'index']);
Route::post('/habitaciones/disponibles', [HabitacionesController::class, 'disponibles']);
Route::get('/reservas/crear', [ReservasController::class, 'create']);
Route::post('/reservas/store', [ReservasController::class, 'store']);
Route::get('/reservas', [ReservasController::class, 'index']);
Route::get('/reservas', [ReservaController::class, 'index']);
Route::get('/reservas/crear', [ReservaController::class, 'create']);
Route::post('/reservas/crear', [ReservaController::class, 'create']);
Route::post('/reservas', [ReservaController::class, 'store']);

Route::get('/', [HabitacionesController::class, 'index']);
Route::get('/habitaciones', [HabitacionesController::class, 'index']);
Route::post('/habitaciones/disponibles', [HabitacionesController::class, 'disponibles']);
Route::get('/habitaciones/{id}', [HabitacionesController::class, 'show']);

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);

Route::post('/reservas', [ReservaController::class, 'store']);