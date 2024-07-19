<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Disponibilidad;

class HabitacionesController extends Controller {
    public function index() {
        return view('habitaciones.index');
    }

    public function disponibles(Request $request) {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');
        $ocupantes = $request->input('ocupantes');
        // Buscar habitaciones que cumplan con la capacidad
        $habitaciones = Habitacion::where('Capacidad', '>=', $ocupantes)->get();
        $habitacionesDisponibles = [];

        foreach ($habitaciones as $habitacion) {
            // Verificar disponibilidad de la habitación en el rango de fechas
            $noDisponible = Disponibilidad::where('idHabitacion', $habitacion->idHabitacion)
                ->whereBetween('Fecha', [$fechaInicio, $fechaFin])
                ->where('Disponible', false)
                ->exists();

            if (!$noDisponible) {
                $habitacionesDisponibles[] = $habitacion;
            }
        }


        $habitaciones = Habitacion::disponibles($fechaInicio, $fechaFin, $ocupantes);
        return view('habitaciones.disponibles', ['habitaciones' => $habitacionesDisponibles]);
    }
}
