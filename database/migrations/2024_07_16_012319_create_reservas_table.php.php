<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration {
    public function up() {
        Schema::create('Reservas', function (Blueprint $table) {
            $table->id('idReserva');
            $table->date('Fecha_checkin');
            $table->date('Fecha_checkout');
            $table->foreignId('idHuesped')->constrained('Huespedes');
            $table->foreignId('idHabitacion')->constrained('Habitaciones');
            $table->integer('Cant_huespedes');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('Reservas');
    }
}

