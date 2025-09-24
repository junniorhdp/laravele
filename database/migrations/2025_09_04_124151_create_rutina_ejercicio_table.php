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
        Schema::create('rutina_ejercicio', function (Blueprint $table) {
            $table->integer('id_rutina_ejercicio', true);
            $table->integer('id_rutina')->nullable()->index('id_rutina');
            $table->integer('id_ejercicio')->nullable()->index('id_ejercicio');
            $table->enum('dia_semana', ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'])->nullable();
            $table->tinyInteger('orden')->nullable();
            $table->tinyInteger('repeticiones')->nullable();
            $table->tinyInteger('series')->nullable();
            $table->string('descanso', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutina_ejercicio');
    }
};
