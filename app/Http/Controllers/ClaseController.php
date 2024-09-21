<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


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
            'imagen' => 'nullable',/* |image|mimes:jpg,jpeg,png|max:2048 */
        ]);
    
        $clase = new Clase();
        $clase->Precio = $request->input('precio');
        $clase->Nombre = $request->input('nombre');
        if ($request->hasFile('imagen')) {
            dd($request->file('imagen')->getMimeType());
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images/clases'), $imageName);
            $clase->imagen = $imageName;
        }
        $clase->descripcion = $request->input('descripcion');
        $clase->save();
    
        return redirect()->route('admin.clases.index')->with('success', 'Clase creada exitosamente.');
    }

    public function show(Clase $clase)
    {
        //
    }

    public function edit($id)
    {
        $clases = Clase::findOrFail($id);
        return view('admin.clases.edit', compact('clases'));
    }

    public function update(Request $request, $id)
    {
        $clase = clase::findOrFail($id);
        $clase->nombre = $request->input('nombre');
        $clase->precio = $request->input('precio');
        if ($request->hasFile('imagen')) {
            // Borrar la imagen anterior si existe
            if ($clase->imagen) {
                File::delete(public_path('images/clases/'.$clase->imagen));
            }
    
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images/clases'), $imageName);
            $clase->imagen = $imageName;
        }
        $clase->descripcion = $request->input('descripcion');
        $clase->save();

        return redirect()->route('admin.clases.index')->with('success', 'Clase actualizada exitosamente.');
    }
    
    public function destroy($id)
    {
        $clase = clase::findOrFail($id);
        $clase->delete();

        return redirect()->route('admin.clases.index')->with('success', 'Clase eliminada exitosamente.');
    }

}
