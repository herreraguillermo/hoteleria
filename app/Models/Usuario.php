<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    protected $table = 'Usuarios';
    protected $primaryKey = 'idUsuario';

    protected $fillable = [
        'Nombre', 'Documento', 'Pasaporte', 'Nacionalidad', 'Email', 'Telefono'
    ];
}
