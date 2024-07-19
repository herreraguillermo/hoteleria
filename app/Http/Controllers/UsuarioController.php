<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function create(Request $request)
    {
        $idHabitacion = $request->input('idHabitacion');
        return view('usuarios.create', compact('idHabitacion'));
        
    }

    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->Nombre = $request->input('Nombre');
        $usuario->Documento = $request->input('Documento');
        $usuario->Pasaporte = $request->input('Pasaporte');
        $usuario->Nacionalidad = $request->input('Nacionalidad');
        $usuario->Email = $request->input('Email');
        $usuario->Telefono = $request->input('Telefono');
        $usuario->save();

        // Redirigir a reservas/create con el id del usuario y de la habitación
        return redirect()->route('reservas.create', ['idUsuario' => $usuario->idUsuario, 'idHabitacion' => $request->input('idHabitacion')]);
    }
}
