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
        Schema::table('valoracion_profesional', function (Blueprint $table) {
            $table->foreign(['id_usuario'], 'valoracion_profesional_ibfk_1')->references(['id_usuario'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_medida'], 'valoracion_profesional_ibfk_2')->references(['id_medida'])->on('medidas')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('valoracion_profesional', function (Blueprint $table) {
            $table->dropForeign('valoracion_profesional_ibfk_1');
            $table->dropForeign('valoracion_profesional_ibfk_2');
        });
    }
};
