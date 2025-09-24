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
        Schema::create('logros', function (Blueprint $table) {
            $table->smallInteger('id_logro', true);
            $table->string('nombre', 100)->nullable();
            $table->text('descripcion')->nullable();
            $table->text('requisito')->nullable();
            $table->tinyInteger('valoracion_num')->nullable();
            $table->enum('estado', ['Disponible', 'Bloqueado', 'Alcanzado'])->nullable();
            $table->smallInteger('cantidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logros');
    }
};
