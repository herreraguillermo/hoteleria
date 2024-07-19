<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration {
    public function up() {
        Schema::create('Usuarios', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->string('Nombre');
            $table->string('Documento');
            $table->string('Pasaporte')->nullable();
            $table->string('Nacionalidad');
            $table->string('Email');
            $table->string('Telefono');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('Usuarios');
    }
}
