
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilidadTable extends Migration {
    public function up() {
        Schema::create('Disponibilidad', function (Blueprint $table) {
            $table->id('idDisponibilidad');
            $table->foreignId('idHabitacion')->constrained('Habitaciones');
            $table->date('Fecha');
            $table->boolean('Disponible')->default(true);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('Disponibilidad');
    }
}
