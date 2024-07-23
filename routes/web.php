<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HuespedController;

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
Route::get('/reservas/{idReserva}', [ReservaController::class, 'show'])->name('reservas.show');
Route::get('/reservas/{token}', [ReservaController::class, 'show'])->name('reservas.show');


/* Route::get('/Usuarios', [UsuarioController::class, 'index']);
Route::get('/Usuarios/{id}', [UsuarioController::class, 'show']);
Route::get('/Usuarios/create', [UsuarioController::class, 'create']);
Route::post('/Usuarios', [UsuarioController::class, 'store']); */
Route::resource('Huespedes', HuespedController::class);
Route::post('/huespedes', [HuespedController::class, 'store'])->name('usuarios.store');
//Route::post('Huespedes', HuespedController::class, 'store');

