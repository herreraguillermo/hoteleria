<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\UsuarioController;
//no se si es necesario por tantos use controller
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
$router = new Router($requestUri, $method);

$router->addRoute('/', [HabitacionesController::class, 'index']);
$router->addRoute('/habitaciones/disponibles', [HabitacionesController::class, 'disponibles']);
$router->addRoute('/usuarios/crear', [UsuarioController::class, 'create']);
$router->addRoute('/usuarios/store', [UsuarioController::class, 'store']);
$router->addRoute('/reservas/crear', [ReservasController::class, 'create']);
$router->addRoute('/reservas/store', [ReservasController::class, 'store']);
$router->addRoute('/reservas', [ReservasController::class, 'index']);

$router->dispatch();

/*Route::get('/', function () {
    return view('nuevo');
})*/
;
