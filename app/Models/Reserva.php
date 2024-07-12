<?php

namespace App\Models;

use PDO;

class Reserva {
    public $idReserva;
    public $Fecha_checkin;
    public $Fecha_checkout;
    public $idUsuario;
    public $idHabitacion;
    public $Cant_huespedes;

    public function save() {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            INSERT INTO Reservas (Fecha_checkin, Fecha_checkout, idUsuario, idHabitacion, Cant_huespedes)
            VALUES (:Fecha_checkin, :Fecha_checkout, :idUsuario, :idHabitacion, :Cant_huespedes)
        ");
        $stmt->execute([
            ':Fecha_checkin' => $this->Fecha_checkin,
            ':Fecha_checkout' => $this->Fecha_checkout,
            ':idUsuario' => $this->idUsuario,
            ':idHabitacion' => $this->idHabitacion,
            ':Cant_huespedes' => $this->Cant_huespedes
        ]);
    }

    public static function all() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM Reservas");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
