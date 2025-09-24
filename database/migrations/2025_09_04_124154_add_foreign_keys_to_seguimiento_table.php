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
        Schema::table('seguimiento', function (Blueprint $table) {
            $table->foreign(['id_usuario'], 'seguimiento_ibfk_1')->references(['id_usuario'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_ejercicio'], 'seguimiento_ibfk_2')->references(['id_ejercicio'])->on('ejercicio')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seguimiento', function (Blueprint $table) {
            $table->dropForeign('seguimiento_ibfk_1');
            $table->dropForeign('seguimiento_ibfk_2');
        });
    }
};
