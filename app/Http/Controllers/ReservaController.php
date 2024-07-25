<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Huesped;


class ReservaController extends Controller
{
    /* public function index()
    {
        // Código para listar las reservas
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    } */

    /* public function create()
    {
        // Código para mostrar el formulario de creación de reserva
        // $habitaciones = Habitacion::all();
        return view('reservas.create', compact('habitaciones'));
        return view('reservas.mostrarreserva');
    } */

    /* public function store(Request $request)
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
    } */

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
    
    public function show($token)
    {
    $reserva = Reserva::where('token', $token)->firstOrFail();
    $huesped = Huesped::findOrFail($reserva->idHuesped);

    return view('reservas.mostrarreserva', compact('reserva', 'huesped'));
    }

    //esto es nuevo para agregar admin

    public function index()
    {
        $reservas = Reserva::all();
        return view('admin.reservas.index', compact('reservas'));
    }

    public function create()
    {
        $habitaciones = Habitacion::all();
        $huespedes = Huesped::all();
        return view('admin.reservas.create', compact('habitaciones', 'huespedes'));
    }

    public function store(Request $request)
    {
        $reserva = new Reserva();
        $reserva->Fecha_checkin = $request->input('Fecha_checkin');
        $reserva->Fecha_checkout = $request->input('Fecha_checkout');
        $reserva->idHuesped = $request->input('idHuesped');
        $reserva->idHabitacion = $request->input('idHabitacion');
        $reserva->Cant_huespedes = $request->input('Cant_huespedes');
        $reserva->save();

        return redirect()->route('admin.reservas.index')->with('success', 'Reserva creada exitosamente.');
    }

    public function edit($id)
{
    $reserva = Reserva::findOrFail($id);
    $huespedes = Huesped::all();
    $habitaciones = Habitacion::all();
    // Convertir las fechas a formato DateTime
    $reserva->Fecha_checkin = \Carbon\Carbon::parse($reserva->Fecha_checkin);
    $reserva->Fecha_checkout = \Carbon\Carbon::parse($reserva->Fecha_checkout);
    return view('admin.reservas.edit', compact('reserva', 'huespedes', 'habitaciones'));
}


    public function update(Request $request, $id)
{
    $request->validate([
        'Fecha_checkin' => 'required|date',
        'Fecha_checkout' => 'required|date',
        'Cant_huespedes' => 'required|integer',
        'idHuesped' => 'required|exists:huespedes,idHuesped',
        'idHabitacion' => 'required|exists:habitaciones,idHabitacion',
    ]);

    $reserva = Reserva::findOrFail($id);
    $reserva->update($request->only(['Fecha_checkin', 'Fecha_checkout', 'Cant_huespedes', 'idHuesped', 'idHabitacion']));

    return redirect()->route('admin.reservas.index')->with('success', 'Reserva actualizada exitosamente.');
}


    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return redirect()->route('admin.reservas.index')->with('success', 'Reserva eliminada exitosamente.');
    }
    
}
