<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Huesped;
use App\Models\Disponibilidad;

class ReservaController extends Controller
{


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

    public function index(Request $request)
    {
        $reservas = Reserva::all();
        $sort = $request->get('sort', 'Fecha_checkin'); // Default sort column
        $order = $request->get('order', 'asc'); // Default order

        $reservas = Reserva::orderBy($sort, $order)->paginate(10); // Paginate results

        return view('admin.reservas.index', compact('reservas', 'sort', 'order'));
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
    // Obtener la reserva actual
    $reserva = Reserva::find($id);

    // Obtener los datos del formulario
    $nuevaHabitacionId = $request->input('idHabitacion');
    $nuevaFechaCheckin = $request->input('Fecha_checkin');
    $nuevaFechaCheckout = $request->input('Fecha_checkout');

    // Obtener la habitación y las fechas antiguas
    $habitacionActualId = $reserva->idHabitacion;
    $fechaCheckinAntigua = $reserva->Fecha_checkin;
    $fechaCheckoutAntigua = $reserva->Fecha_checkout;

    // Marca la habitación antigua como disponible en las fechas antiguas
    $this->marcarDisponibilidad($habitacionActualId, $fechaCheckinAntigua, $fechaCheckoutAntigua, true);

    // Marca la nueva habitación como ocupada en las nuevas fechas
    $this->marcarDisponibilidad($nuevaHabitacionId, $nuevaFechaCheckin, $nuevaFechaCheckout, false);

    // Actualiza la reserva con la nueva habitación y fechas
    $reserva->idHabitacion = $nuevaHabitacionId;
    $reserva->Fecha_checkin = $nuevaFechaCheckin;
    $reserva->Fecha_checkout = $nuevaFechaCheckout;
    $reserva->save();

    return redirect()->route('reservas.index')->with('success', 'Reserva actualizada correctamente');

}

protected function marcarDisponibilidad($habitacionId, $fechaCheckin, $fechaCheckout, $disponible)
{
    $fechas = $this->generarRangoFechas($fechaCheckin, $fechaCheckout);

    foreach ($fechas as $fecha) {
        Disponibilidad::updateOrCreate(
            ['idHabitacion' => $habitacionId, 'fecha' => $fecha],
            ['disponible' => $disponible]
        );
    }
}

protected function generarRangoFechas($fechaInicio, $fechaFin)
{
    $fechas = [];
    $inicio = \Carbon\Carbon::parse($fechaInicio);
    $fin = \Carbon\Carbon::parse($fechaFin);

    while ($inicio->lte($fin)) {
        $fechas[] = $inicio->format('Y-m-d');
        $inicio->addDay();
    }

    return $fechas;
}





    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);

        // Obtener las fechas de check-in y check-out de la reserva
        $fecha_checkin = $reserva->Fecha_checkin;
        $fecha_checkout = $reserva->Fecha_checkout;
        $idHabitacion = $reserva->idHabitacion;
        

        // Actualizar la disponibilidad de la habitación en las fechas de la reserva
        Disponibilidad::where('idHabitacion', $idHabitacion)
            ->whereBetween('Fecha', [$fecha_checkin, $fecha_checkout])
            ->update(['Disponible' => 1]);

        // Eliminar la reserva
        $reserva->delete();

        return redirect()->route('admin.reservas.index')->with('success', 'Reserva eliminada exitosamente.');
    }
    
}
