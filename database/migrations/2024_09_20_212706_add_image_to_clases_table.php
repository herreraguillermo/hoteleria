<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('clases', function (Blueprint $table) {
            $table->string('imagen')->nullable(); // Campo para el nombre del archivo de imagen
        });
    }
    
    public function down()
    {
        Schema::table('clases', function (Blueprint $table) {
            $table->dropColumn('imagen');
        });
    }
    
};
