<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model {
    protected $table = 'Reservas';
    protected $primaryKey = 'idReserva';

    protected $fillable = [
        'Fecha_checkin', 'Fecha_checkout', 'idUsuario', 'idHabitacion', 'Cant_huespedes'
    ];

    public static function create($data) {
        self::create($data);

        // Marcar fechas como no disponibles
        Disponibilidad::marcarNoDisponible($data['idHabitacion'], $data['Fecha_checkin'], $data['Fecha_checkout']);
    }
}

