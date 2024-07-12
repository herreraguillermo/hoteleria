<?php

namespace App\Models;

use PDO;

class Habitacion {
    public $idHabitacion;
    public $Numero;
    public $Precio;
    public $Capacidad;
    public $Clase;

    public static function all() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM Habitaciones");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function disponibles($fechaInicio, $fechaFin, $ocupantes) {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            SELECT * FROM Habitaciones h
            WHERE h.Capacidad >= :ocupantes
            AND h.idHabitacion NOT IN (
                SELECT r.idHabitacion FROM Reservas r
                WHERE r.Fecha_checkin < :fechaFin
                AND r.Fecha_checkout > :fechaInicio
            )
        ");
        $stmt->execute([':ocupantes' => $ocupantes, ':fechaInicio' => $fechaInicio, ':fechaFin' => $fechaFin]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
