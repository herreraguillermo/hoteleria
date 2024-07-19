<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Reserva;
use App\Models\Disponibilidad;

class UsuarioController extends Controller
{
    public function create(Request $request)
    {
        $idHabitacion = $request->input('idHabitacion');
        return view('usuarios.create', compact('idHabitacion'));
        
    }

    public function store(Request $request)
    {
        // Crear usuario
        $usuario = new Usuario();
        $usuario->Nombre = $request->input('Nombre');
        $usuario->Documento = $request->input('Documento');
        $usuario->Pasaporte = $request->input('Pasaporte');
        $usuario->Nacionalidad = $request->input('Nacionalidad');
        $usuario->Email = $request->input('Email');
        $usuario->Telefono = $request->input('Telefono');
        $usuario->save();

        // Crear reserva
        $reserva = new Reserva();
        $reserva->Fecha_checkin = $request->input('fechaInicio');
        $reserva->Fecha_checkout = $request->input('fechaFin');
        $reserva->idUsuario = $usuario->idUsuario;
        $reserva->idHabitacion = $request->input('idHabitacion');
        $reserva->Cant_huespedes = $request->input('ocupantes');
        $reserva->save();

        // Actualizar disponibilidad
        $start = new \DateTime($request->input('fechaInicio'));
        $end = new \DateTime($request->input('fechaFin'));
        $end->modify('+1 day'); // Incluir el día de salida

        $interval = new \DateInterval('P1D');
        $period = new \DatePeriod($start, $interval, $end);

        foreach ($period as $date) {
            $disponibilidad = new Disponibilidad();
            $disponibilidad->idHabitacion = $request->input('idHabitacion');
            $disponibilidad->Fecha = $date->format('Y-m-d');
            $disponibilidad->Disponible = false;
            $disponibilidad->save();

        // Redirigir a reservas/create con el id del usuario y de la habitación
        }return redirect()->route('reservas.create', ['idUsuario' => $usuario->idUsuario, 'idHabitacion' => $request->input('idHabitacion')]);
    }
}