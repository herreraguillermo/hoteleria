<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Reserva extends Model {
    use hasfactory;
    protected $table = 'Reservas';
    protected $primaryKey = 'idReserva';

    protected $fillable = [
        'Fecha_checkin', 'Fecha_checkout', 'idHuesped', 'idHabitacion', 'Cant_huespedes'
    ];

    public static function create($data) {
        self::create($data);

        // Marcar fechas como no disponibles
        Disponibilidad::marcarNoDisponible($data['idHabitacion'], $data['Fecha_checkin'], $data['Fecha_checkout']);
    }
    //esta parte es nueva
    public function huesped()
    {
        return $this->belongsTo(Huesped::class, 'idHuesped');
    }
    
    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'idHabitacion');
    }

    protected static function booted()
    {
        static::creating(function ($reserva) {
            $reserva->token = Str::random(32); // Genera un token único para cada reserva
        });
    }
}


