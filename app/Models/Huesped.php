<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huesped extends Model {
    protected $table = 'huespedes';
    protected $primaryKey = 'idHuesped';

    protected $fillable = [
        'Nombre', 'Documento', 'Nacionalidad', 'Email', 'Telefono'
    ];
}
