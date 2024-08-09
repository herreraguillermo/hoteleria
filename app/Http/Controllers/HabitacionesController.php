<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Disponibilidad;

class HabitacionesController extends Controller {
    
    public function disponibles(Request $request) {

        // Validación
        $request->validate([
            'fechaInicio' => 'required|date|after_or_equal:today',
            'fechaFin' => 'required|date|after:fechaInicio',
            'ocupantes' => 'required|integer|min:1|max:5',
        ]);

        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');
        $ocupantes = $request->input('ocupantes');
        $orden = $request->input('ordenm', 'asc'); // Obtenemos el orden, por defecto ascendente

        
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

        // Ordenar las habitaciones disponibles por precio
        usort($habitacionesDisponibles, function($a, $b) use ($orden) {
            if ($orden === 'asc') {
                return $a->Precio <=> $b->Precio;
            } else {
                return $b->Precio <=> $a->Precio;
            }
        });

        return view('habitaciones.disponibles', ['habitaciones' => $habitacionesDisponibles]);
    }

    // Para admin controller

    public function index()
    {
        $habitaciones = Habitacion::all();
        return view('habitaciones.index', compact('habitaciones'));
    }

    public function create()
    {
        return view('admin.habitaciones.create');
    }

    public function store(Request $request)
    {
        $habitacion = new Habitacion();
        $habitacion->Numero = $request->input('Numero');
        $habitacion->Precio = $request->input('Precio');
        $habitacion->Capacidad = $request->input('Capacidad');
        $habitacion->Clase = $request->input('Clase');
        $habitacion->save();

        return redirect()->route('admin.habitaciones.index')->with('success', 'Habitación creada exitosamente.');
    }

    public function edit($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        return view('admin.habitaciones.edit', compact('habitacion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Numero' => 'required|string|max:255',
            'Precio' => 'required|numeric',
            'Capacidad' => 'required|integer',
            'Clase' => 'required|string|max:255',
        ]);

        $habitacion = Habitacion::findOrFail($id);
        $habitacion->update($request->only(['Numero', 'Precio', 'Capacidad', 'Clase']));

        return redirect()->route('admin.habitaciones.index')->with('success', 'Habitación actualizada exitosamente.');
    }

}
