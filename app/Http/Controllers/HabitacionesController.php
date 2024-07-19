<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;

class HabitacionesController extends Controller {
    public function index() {
        return view('habitaciones.index');
    }

    public function disponibles(Request $request) {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');
        $ocupantes = $request->input('ocupantes');
        $habitaciones = Habitacion::disponibles($fechaInicio, $fechaFin, $ocupantes);
        return view('habitaciones.disponibles', ['habitaciones' => $habitaciones]);
    }
}
