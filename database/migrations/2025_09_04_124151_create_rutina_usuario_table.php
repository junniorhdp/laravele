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
        Schema::create('rutina_usuario', function (Blueprint $table) {
            $table->integer('id_asignacion', true);
            $table->integer('id_usuario')->nullable()->index('id_usuario');
            $table->integer('id_rutina')->nullable()->index('id_rutina');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();
            $table->enum('estado', ['Activa', 'Finalizada', 'Pausada'])->nullable();
            $table->text('adaptaciones_personalizadas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutina_usuario');
    }
};
