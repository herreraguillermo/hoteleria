<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function index()
    {
        // Código para listar las reservas
    }

    public function create()
    {
        // Código para mostrar el formulario de creación de reserva
    }

    public function store(Request $request)
    {
        // Código para almacenar una nueva reserva
        $reserva = new Reserva();
        $reserva->Fecha_checkin = $request->input('Fecha_checkin');
        $reserva->Fecha_checkout = $request->input('Fecha_checkout');
        $reserva->idUsuario = $request->input('idUsuario');
        $reserva->idHabitacion = $request->input('idHabitacion');
        $reserva->Cant_huespedes = $request->input('Cant_huespedes');
        $reserva->save();

        return redirect('/reservas')->with('success', 'Reserva creada con éxito');
    }
    
    public function disponibilidad(Request $request)
    {
        $request->validate([
            'fecha_ingreso' => 'required|date|after_or_equal:today',
            'fecha_egreso' => 'required|date|after:fecha_ingreso',
        ]);

        $fechaIngreso = $request->input('fecha_ingreso');
        $fechaEgreso = $request->input('fecha_egreso');

        // Obtener las habitaciones disponibles
        $habitacionesDisponibles = Habitacion::whereDoesntHave('reservas', function ($query) use ($fechaIngreso, $fechaEgreso) {
            $query->where(function ($query) use ($fechaIngreso, $fechaEgreso) {
                $query->where('fecha_ingreso', '<', $fechaEgreso)
                      ->where('fecha_egreso', '>', $fechaIngreso);
            });
        })->get();

        return view('disponibilidad', compact('habitacionesDisponibles'));
    }
}

