<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionesTable extends Migration {
    public function up() {
        Schema::create('Habitaciones', function (Blueprint $table) {
            $table->id('idHabitacion');
            $table->integer('Numero');
            $table->decimal('Precio', 10, 2);
            $table->integer('Capacidad');
            $table->string('Clase');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('Habitaciones');
    }
}
