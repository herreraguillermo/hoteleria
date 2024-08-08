<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Disponibilidad extends Model {
    protected $table = 'Disponibilidad';
    protected $primaryKey = 'idDisponibilidad';

    public static function marcarNoDisponible($idHabitacion, $fechaInicio, $fechaFin) {
        $dates = self::getDateRange($fechaInicio, $fechaFin);

        foreach ($dates as $date) {
            DB::table('Disponibilidad')->updateOrInsert(
                ['idHabitacion' => $idHabitacion, 'Fecha' => $date],
                ['Disponible' => false]
            );
        }
    }

    public static function marcarDisponible($idHabitacion, $fechaInicio, $fechaFin) {
        $dates = self::getDateRange($fechaInicio, $fechaFin);

        foreach ($dates as $date) {
            DB::table('Disponibilidad')->updateOrInsert(
                ['idHabitacion' => $idHabitacion, 'Fecha' => $date],
                ['Disponible' => true]
            );
        }
    }

    private static function getDateRange($startDate, $endDate) {
        $dates = [];
        $currentDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        while ($currentDate <= $endDate) {
            $dates[] = date('Y-m-d', $currentDate);
            $currentDate = strtotime("+1 day", $currentDate);
        }

        return $dates;
    }
}
