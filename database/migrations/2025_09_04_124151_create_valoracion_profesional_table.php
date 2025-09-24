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
        Schema::create('valoracion_profesional', function (Blueprint $table) {
            $table->integer('id_valoracion', true);
            $table->integer('id_usuario')->nullable()->index('id_usuario');
            $table->date('fecha_valoracion')->nullable();
            $table->text('comentarios')->nullable();
            $table->smallInteger('id_medida')->nullable()->index('id_medida');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valoracion_profesional');
    }
};
