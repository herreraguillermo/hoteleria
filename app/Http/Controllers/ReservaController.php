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
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        // Código para mostrar el formulario de creación de reserva
        /* $habitaciones = Habitacion::all();
        return view('reservas.create', compact('habitaciones')); */
        return view('reservas.mostrarreserva');
    }

    public function store(Request $request)
    {
        // Código para almacenar una nueva reserva
        $request->validate([
            'Fecha_checkin' => 'required|date|after_or_equal:today',
            'Fecha_checkout' => 'required|date|after:Fecha_checkin',
            'idHuesped' => 'required|exists:Huespedes,idHuesped',
            'idHabitacion' => 'required|integer',
            'Cant_huespedes' => 'required|integer|min:1',
        ]);

        $reserva = new Reserva();
        $reserva->Fecha_checkin = $request->input('Fecha_checkin');
        $reserva->Fecha_checkout = $request->input('Fecha_checkout');
        $reserva->idHuesped = $request->input('idHuesped');
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
                $query->where('Fecha_checkin', '<', $fechaEgreso)
                      ->where('Fecha_checkout', '>', $fechaIngreso);
            });
        })->get();

        return view('reservas.disponibilidad', compact('habitacionesDisponibles'));
    }

    public function show($idReserva)
    {
        // Recuperar la reserva por ID
        $reserva = Reserva::findOrFail($idReserva);
        
        // Obtener el huésped asociado
        $huesped = $reserva->huesped;

        // Pasar los datos a la vista
        return view('reservas.mostrarreserva', compact('reserva', 'huesped'));
    }
}
