<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Habitacion extends Model {

    use HasFactory;
    protected $table = 'Habitaciones';
    protected $primaryKey = 'idHabitacion';
    public $timestamps = false;

    public static function disponibles($fechaInicio, $fechaFin, $ocupantes) {
        $habitaciones = DB::table('Habitaciones')
            ->select('Habitaciones.idHabitacion', 'Habitaciones.Numero', 'Habitaciones.Precio', 'Habitaciones.Capacidad', 'Habitaciones.Clase')
            ->leftJoin('Disponibilidad', 'Habitaciones.idHabitacion', '=', 'Disponibilidad.idHabitacion')
            ->where('Habitaciones.Capacidad', '>=', $ocupantes)
            ->whereBetween('Disponibilidad.Fecha', [$fechaInicio, $fechaFin])
            ->where('Disponibilidad.Disponible', true)
            ->groupBy('Habitaciones.idHabitacion', 'Habitaciones.Numero', 'Habitaciones.Precio', 'Habitaciones.Capacidad', 'Habitaciones.Clase')
            ->havingRaw('COUNT(Disponibilidad.Fecha) = DATEDIFF(?, ?) + 1', [$fechaFin, $fechaInicio])
            ->get();

        return $habitaciones;
    }
    

    protected $fillable = [
        'Numero',
        'Precio',
        'Capacidad',
        'Clase',
    ];
    //relacionadas a destruir habitaciones
    public function reservasActivas()
    {
    return $this->hasMany(Reserva::class, 'idHabitacion')
                ->where('Fecha_checkout', '>', now()); // Ejemplo para reservas futuras
    }

    public function tieneReservasActivas()
    {
    return $this->reservasActivas()->exists();
    }

    
}
