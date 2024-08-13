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
    public function index(Request $request)
    {
        $habitaciones = Habitacion::all();
        $sort = $request->input('sort', 'Numero'); // Por defecto ordena por número de habitación
        $direction = $request->input('direction', 'asc'); // Por defecto en orden ascendente

        $habitaciones = Habitacion::orderBy($sort, $direction)->get();

        return view('admin.habitaciones.index', compact('habitaciones', 'sort', 'direction'));
  
    }
    
    public function create()
    {
        return view('admin.habitaciones.create');
    }

    public function store(Request $request)
{
    // Validar que el número de habitación no exista ya en la base de datos
    $request->validate([
        'Numero' => [
            'required',
            'numeric',
            'min:0',
            'integer',
            function ($attribute, $value, $fail) {
                if (Habitacion::where('Numero', $value)->exists()) {
                    $fail('El número de habitación ya está en uso.');
                }
            },
        ],
        'Precio' => 'required|numeric',
        'Capacidad' => 'required|integer',
        'Clase' => 'required|string',
    ]);

    // Crear una nueva habitación si la validación pasa
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
