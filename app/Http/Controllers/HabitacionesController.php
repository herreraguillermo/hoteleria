<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Disponibilidad;
use App\Models\Clase;
use Carbon\Carbon;

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
        $orden = $request->input('orden', 'asc'); // Obtenemos el orden, por defecto ascendente
        // Consulta de habitaciones disponibles con el criterio de ordenación aplicado
        // Consulta de habitaciones disponibles con la unión de la tabla 'clases'
        $habitaciones = Habitacion::select('habitaciones.*')
        ->where('habitaciones.Capacidad', '>=', $ocupantes)
        ->join('clases', 'habitaciones.id_clase', '=', 'clases.id')
        
        ->orderBy('clases.precio', $orden) // Ordenar por precio de la clase
        ->get();

            
       
        // Convierte las fechas en instancias de Carbon
        $fechaCheckin = Carbon::parse($fechaInicio);
        $fechaCheckout = Carbon::parse($fechaFin);
        // Calcula la diferencia en días
        $diferenciaDias = $fechaCheckin->diffInDays($fechaCheckout);
        
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
                // Asegúrate de que 'precioTotal' se asigne correctamente
                $habitacion->precioTotal = $diferenciaDias * $habitacion->Clase->precio; 
                $habitacionesDisponibles[] = $habitacion;
            }
        }
        
        // Ordenar las habitaciones disponibles por precio
        usort($habitacionesDisponibles, function($a, $b) use ($orden) {
            if ($a->precioTotal == $b->precioTotal) { // Asegúrate de usar el atributo correcto
                return 0;
            }
            return ($orden === 'asc') ? ($a->precioTotal < $b->precioTotal ? -1 : 1) : ($a->precioTotal > $b->precioTotal ? -1 : 1);
        });
        

        return view('habitaciones.disponibles', [
            'habitaciones' => $habitacionesDisponibles, 
            'diferenciaDias' => $diferenciaDias,
        ]);
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
    
    public function edit($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $clases = Clase::all();
        
        return view('admin.habitaciones.edit', compact('habitacion', 'clases'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Numero' => [
                'required',
                'numeric',
                'min:0',
                'integer',
                    function ($attribute, $value, $fail) use ($id) {
                        if (Habitacion::where('Numero', $value)->where('idHabitacion', '<>', $id)->exists()) {
                            $fail('El número de habitación ya está en uso.');
                    }
                },
            ],
            /* 'Precio' => 'nullable|numeric', */
            'Capacidad' => 'required|integer',
            'Clase' => 'required|integer'
        ]);

        $habitacion = Habitacion::findOrFail($id);
        $habitacion->update($request->only(['Numero', /* 'Precio', */ 'Capacidad', 'Clase']));

        return redirect()->route('admin.habitaciones.index')->with('success', 'Habitación actualizada exitosamente.');
    }
    
}