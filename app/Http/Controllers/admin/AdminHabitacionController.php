<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Habitacion;

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

    public function destroy($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $habitacion->delete();

        return redirect()->route('admin.habitaciones.index')->with('success', 'Habitación eliminada correctamente.');
    }
}