<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ejercicio', function (Blueprint $table) {
            $table->integer('id_ejercicio', true);
            $table->string('nombre', 100)->nullable();
            $table->tinyInteger('tipo_ejercicio')->nullable()->index('tipo_ejercicio');
            $table->text('equipo_necesario')->nullable();
            $table->enum('nivel_dificultad', ['Bajo', 'Medio', 'Alto'])->nullable();
            $table->text('instrucciones')->nullable();
            $table->text('url_video')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicio');
    }
};
