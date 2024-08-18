<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('habitaciones', function (Blueprint $table) {
        $table->unsignedInteger('id_clase')->after('Capacidad'); // Agrega la columna id_clase después de Capacidad
        $table->foreign('id_clase')->references('id')->on('clases')->onDelete('cascade'); // Define la foreign key
    });
}

public function down()
{
    Schema::table('habitaciones', function (Blueprint $table) {
        $table->dropForeign(['id_clase']); // Elimina la foreign key
    });
}

};
