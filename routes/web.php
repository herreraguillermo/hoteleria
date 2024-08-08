<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HuespedController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminHabitacionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HabitacionesController::class, 'index']);
Route::get('/habitaciones', [HabitacionesController::class, 'index']);
Route::get('/habitaciones/disponibles', [HabitacionesController::class, 'disponibles'])->name('habitaciones.disponibles');
Route::post('/habitaciones/disponibles', [HabitacionesController::class, 'disponibles'])->name('habitaciones.disponibles');
Route::get('/habitaciones/{id}', [HabitacionesController::class, 'show'])->name('habitaciones.show');

Route::resource('reservas', ReservaController::class);
Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
Route::get('/reservas/{idReserva}', [ReservaController::class, 'show'])->name('reservas.show');
Route::get('/reservas/{token}', [ReservaController::class, 'show'])->name('reservas.show');
Route::resource('admin/reservas', ReservaController::class);



Route::resource('Huespedes', HuespedController::class);
Route::post('/huespedes', [HuespedController::class, 'store'])->name('usuarios.store');

// Rutas del panel de administración
 Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminhabitacionController::class, 'index'])->name('admin.dashboard');
    Route::resource('habitaciones', AdminHabitacionController::class , ['as' => 'admin']);
    Route::resource('reservas', ReservaController::class , ['as' => 'admin']);
    Route::resource('huespedes', HuespedController::class , ['as' => 'admin']);
    Route::get('/admin/habitaciones/{id}/edit', [HabitacionesController::class, 'edit'])->name('admin.habitaciones.edit');
    Route::put('/admin/habitaciones/{id}', [HabitacionesController::class, 'update'])->name('admin.habitaciones.update');
    Route::delete('/habitaciones/{id}', [AdminHabitacionController::class, 'destroy'])->name('admin.habitaciones.destroy');
}); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/', [LoginController::class, 'logout'])->name('logout');