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
        Schema::create('notificacion', function (Blueprint $table) {
            $table->integer('id_notificacion', true);
            $table->integer('id_usuario')->nullable()->index('id_usuario');
            $table->text('mensaje')->nullable();
            $table->dateTime('fecha_hora')->nullable();
            $table->enum('estado', ['Leída', 'No Leída'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacion');
    }
};
