<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Huesped;
use App\Models\Reserva;
use App\Models\Disponibilidad;

class HuespedController extends Controller
{
    public function create(Request $request)
    {
        $idHabitacion = $request->input('idHabitacion');
        return view('Huespedes.create', compact('idHabitacion'));
        
    }

    public function store(Request $request)
    {
        // Crear Huesped
        $Huesped = new Huesped();
        $Huesped->Nombre = $request->input('Nombre');
        $Huesped->Documento = $request->input('Documento');
        $Huesped->Nacionalidad = $request->input('Nacionalidad');
        $Huesped->Email = $request->input('Email');
        $Huesped->Telefono = $request->input('Telefono');
        $Huesped->save();

        // Crear reserva
        $reserva = new Reserva();
        $reserva->Fecha_checkin = $request->input('fechaInicio');
        $reserva->Fecha_checkout = $request->input('fechaFin');
        $reserva->idHuesped = $Huesped->idHuesped;
        $reserva->idHabitacion = $request->input('idHabitacion');
        $reserva->Cant_huespedes = $request->input('ocupantes');
        $reserva->save();
        //esto es nuevo hay que ver si anda
        //return redirect()->route('reservas.show', ['reserva' => $reserva->idReserva]);

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

        
        }
        // Redirigir a la vista de reserva con el token
        return redirect()->route('reservas.show', ['token' => $reserva->token]);
    }

    //admin
    public function index()
    {
        $huespedes = Huesped::all();
        return view('admin.huespedes.index', compact('huespedes'));
    }

    /* public function create()
    {
        return view('admin.huespedes.create');
    } */

    /* public function store(Request $request)
    {
        $huesped = new Huesped();
        $huesped->Nombre = $request->input('Nombre');
        $huesped->Documento = $request->input('Documento');
        $huesped->Nacionalidad = $request->input('Nacionalidad');
        $huesped->Email = $request->input('Email');
        $huesped->Telefono = $request->input('Telefono');
        $huesped->save();

        return redirect()->route('admin.huespedes.index')->with('success', 'Huésped creado exitosamente.');
    }
 */
    public function edit($id)
    {
        $huesped = Huesped::findOrFail($id);
        return view('admin.huespedes.edit', compact('huesped'));
    }

    public function update(Request $request, $id)
    {
        $huesped = Huesped::findOrFail($id);
        $huesped->Nombre = $request->input('Nombre');
        $huesped->Documento = $request->input('Documento');
        $huesped->Nacionalidad = $request->input('Nacionalidad');
        $huesped->Email = $request->input('Email');
        $huesped->Telefono = $request->input('Telefono');
        $huesped->save();

        return redirect()->route('admin.huespedes.index')->with('success', 'Huésped actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $huesped = Huesped::findOrFail($id);
        $huesped->delete();

        return redirect()->route('admin.huespedes.index')->with('success', 'Huésped eliminado exitosamente.');
    }
}