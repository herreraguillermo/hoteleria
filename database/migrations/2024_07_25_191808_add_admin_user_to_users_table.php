<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up()
{
    DB::table('users')->insert([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'), // Asegúrate de que la contraseña esté hasheada
        'role' => 'admin', // Asigna el rol de administrador
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}

public function down()
{
    DB::table('users')->where('email', 'admin@example.com')->delete();
}

};
