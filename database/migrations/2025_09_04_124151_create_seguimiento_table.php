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
        Schema::create('seguimiento', function (Blueprint $table) {
            $table->integer('id_progreso', true);
            $table->integer('id_usuario')->nullable()->index('id_usuario');
            $table->integer('id_ejercicio')->nullable()->index('id_ejercicio');
            $table->date('fecha')->nullable();
            $table->tinyInteger('repeticiones_realizadas')->nullable();
            $table->tinyInteger('series_realizadas')->nullable();
            $table->decimal('peso_usado', 5)->nullable();
            $table->text('comentarios')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento');
    }
};
