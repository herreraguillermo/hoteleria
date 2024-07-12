<?php

namespace App\Controllers;

use App\Models\Usuario;

class UsuarioController {
    public function create() {
        include __DIR__ . '/../Views/usuarios/create.php';
    }

    public function store() {
        $usuario = new Usuario();
        $usuario->nombre = $_POST['nombre'];
        $usuario->email = $_POST['email'];
        $usuario->telefono = $_POST['telefono'];
        $usuario->save();
        
        header('Location: /reservas/crear');
    }
}
