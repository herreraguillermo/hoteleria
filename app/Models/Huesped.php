<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Huesped extends Model {
use hasfactory;

    protected $table = 'huespedes';
    protected $primaryKey = 'idHuesped';

    protected $fillable = [
        'Nombre', 'Documento', 'Nacionalidad', 'Email', 'Telefono'
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'idHuesped');
    }
    public function huesped()
    {
        return $this->belongsTo(Huesped::class, 'idHuesped');
    }
}
