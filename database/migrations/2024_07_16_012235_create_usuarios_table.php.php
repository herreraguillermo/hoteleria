<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuespedesTable extends Migration {
    public function up() {
        Schema::create('Huespedes', function (Blueprint $table) {
            $table->id('idHuesped');
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
        Schema::dropIfExists('Huespedes');
    }
}
