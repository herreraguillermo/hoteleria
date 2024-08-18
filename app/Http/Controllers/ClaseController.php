<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    public function index()
    {
        $clases = Clase::all();
        return view('admin.clases.index', compact('clases'));
    }
    public function create()
    {
        return view('admin.clases.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'precio' => 'required|numeric',
            'nombre' => 'required|string',
        ]);
    
        // Crear una nueva habitación si la validación pasa
        $clase = new Clase();
        $clase->Precio = $request->input('precio');
        $clase->Nombre = $request->input('nombre');
        $clase->save();
    
        return redirect()->route('admin.clases.index')->with('success', 'Clase creada exitosamente.');
    }
    public function show(Clase $clase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clase $clase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clase $clase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clase $clase)
    {
        //
    }
}
