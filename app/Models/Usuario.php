<?php

namespace App\Models;

use PDO;

class Usuario {
    public $idUsuario;
    public $Nombre;
    public $Documento;
    public $Pasaporte;
    public $Nacionalidad;
    public $Email;
    public $Telefono;

    public function save() {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            INSERT INTO Usuarios (Nombre, Documento, Pasaporte, Nacionalidad, Email, Telefono)
            VALUES (:Nombre, :Documento, :Pasaporte, :Nacionalidad, :Email, :Telefono)
        ");
        $stmt->execute([
            ':Nombre' => $this->Nombre,
            ':Documento' => $this->Documento,
            ':Pasaporte' => $this->Pasaporte,
            ':Nacionalidad' => $this->Nacionalidad,
            ':Email' => $this->Email,
            ':Telefono' => $this->Telefono
        ]);
    }
}
