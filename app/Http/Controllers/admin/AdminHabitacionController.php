<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Disponibilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AdminHabitacionController extends Controller
{
    public function index()
    {
        $habitaciones = Habitacion::all();
        return view('admin.habitaciones.index', compact('habitaciones'));
    }

    public function create()
    {
        return view('admin.habitaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Numero' => 'required',
            'Precio' => 'required',
            'Capacidad' => 'required',
            'Clase' => 'required',
        ]);

        Habitacion::create($request->all());

        return redirect()->route('admin.habitaciones.index')->with('success', 'Habitación creada correctamente.');
    }

    public function edit($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        return view('admin.habitaciones.edit', compact('habitacion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Numero' => 'required',
            'Precio' => 'required',
            'Capacidad' => 'required',
            'Clase' => 'required',
        ]);

        $habitacion = Habitacion::findOrFail($id);
        $habitacion->update($request->all());

        return redirect()->route('admin.habitaciones.index')->with('success', 'Habitación actualizada correctamente.');
    }

    public function destroy($idHabitacion)
{
    DB::transaction(function () use ($idHabitacion) {
        // Eliminar reservas asociadas a la habitación
        Reserva::where('idHabitacion', $idHabitacion)->delete();
        
        // Eliminar disponibilidad asociada a la habitación
        Disponibilidad::where('idHabitacion', $idHabitacion)->delete();
        
        // Finalmente, eliminar la habitación
        Habitacion::find($idHabitacion)->delete();
    });

    return redirect()->route('admin.habitaciones.index')->with('success', 'Habitación eliminada exitosamente.');
}

}
