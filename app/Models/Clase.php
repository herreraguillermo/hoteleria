<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;
    protected $table = 'clases';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombre', 'precio'/* , 'imagen' */
    ];

    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'id_clase', 'id');
    }
}
