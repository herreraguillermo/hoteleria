<?php
/* 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HuespedController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminHabitacionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HabitacionesController::class, 'index']);
Route::get('/habitaciones', [HabitacionesController::class, 'index']);
Route::post('/habitaciones/disponibles', [HabitacionesController::class, 'disponibles']);
Route::get('/habitaciones/{id}', [HabitacionesController::class, 'show']);

Route::resource('reservas', ReservaController::class);
Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
Route::get('/reservas/{idReserva}', [ReservaController::class, 'show'])->name('reservas.show');
Route::get('/reservas/{token}', [ReservaController::class, 'show'])->name('reservas.show');


Route::resource('Huespedes', HuespedController::class);
Route::post('/huespedes', [HuespedController::class, 'store'])->name('usuarios.store');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */


//esto hace que ande parece
/* Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('habitaciones', HabitacionesController::class, ['as' => 'admin']);
    Route::resource('reservas', ReservaController::class, ['as' => 'admin']);
    Route::resource('huespedes', HuespedController::class, ['as' => 'admin']);
}); */


/* // Rutas del panel de administración
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index') *//* ->middleware('auth');; */;
 /*    Route::resource('/admin/habitaciones', HabitacionesController::class);
    Route::resource('/admin/reservas', ReservaController::class);
    Route::resource('/admin/huespedes', HuespedController::class);
}); */

/* Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('habitaciones', HabitacionesController::class, ['as' => 'admin']);
    Route::resource('reservas', ReservaController::class, ['as' => 'admin']);
    Route::resource('huespedes', HuespedController::class, ['as' => 'admin']);
}); */

//rutas de administracion para habitaciones
/* Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('habitaciones', HabitacionesController::class);
    Route::resource('reservas', ReservaController::class);
    Route::resource('huespedes', HuespedController::class);
}); */
// routes/web.php
/* Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('habitaciones', HabitacionesController::class);
    Route::resource('reservas', ReservaController::class);
    Route::resource('huespedes', HuespedController::class);
});


Route::prefix('admin')->group(function () {
    Route::resource('habitaciones', HabitacionesController::class);
    Route::get('/habitaciones', [AdminHabitacionController::class, 'index'])->name('admin.habitaciones.index');
    Route::get('/habitaciones/create', [AdminHabitacionController::class, 'create'])->name('admin.habitaciones.create');
    Route::post('/habitaciones', [AdminHabitacionController::class, 'store'])->name('admin.habitaciones.store');
    Route::get('/habitaciones/{id}/edit', [AdminHabitacionController::class, 'edit'])->name('admin.habitaciones.edit');
    Route::put('/habitaciones/{id}', [AdminHabitacionController::class, 'update'])->name('admin.habitaciones.update');
    Route::delete('/habitaciones/{id}', [AdminHabitacionController::class, 'destroy'])->name('admin.habitaciones.destroy');
});

Route::get('/admin/habitaciones/{id}/edit', [HabitacionesController::class, 'edit'])->name('admin.habitaciones.edit');
Route::put('/admin/habitaciones/{id}', [HabitacionesController::class, 'update'])->name('admin.habitaciones.update');

Route::get('/admin/reservas/{id}/edit', [ReservaController::class, 'edit'])->name('admin.reservas.edit');
Route::put('/admin/reservas/{id}', [ReservaController::class, 'update'])->name('admin.reservas.update');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HuespedController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminHabitacionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HabitacionesController::class, 'index']);
Route::get('/habitaciones', [HabitacionesController::class, 'index']);
Route::post('/habitaciones/disponibles', [HabitacionesController::class, 'disponibles']);
Route::get('/habitaciones/{id}', [HabitacionesController::class, 'show']);

Route::resource('reservas', ReservaController::class);
Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
Route::get('/reservas/{idReserva}', [ReservaController::class, 'show'])->name('reservas.show');
Route::get('/reservas/{token}', [ReservaController::class, 'show'])->name('reservas.show');

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
