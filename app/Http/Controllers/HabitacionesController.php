<?php

namespace App\Controllers;

use App\Models\Habitacion;

class HabitacionesController {
    public function index() {
        $habitaciones = Habitacion::all();
        include __DIR__ . '/../Views/habitaciones/index.php';
    }

    public function disponibles($fechaInicio, $fechaFin, $ocupantes) {
        $habitaciones = Habitacion::disponibles($fechaInicio, $fechaFin, $ocupantes);
        include __DIR__ . '/../Views/habitaciones/disponibles.php';
    }
}
