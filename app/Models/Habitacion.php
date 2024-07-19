<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Habitacion extends Model {
    protected $table = 'Habitaciones';
    protected $primaryKey = 'idHabitacion';

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
}
