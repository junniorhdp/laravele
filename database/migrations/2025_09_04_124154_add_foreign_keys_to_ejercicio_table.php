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
        Schema::table('ejercicio', function (Blueprint $table) {
            $table->foreign(['tipo_ejercicio'], 'ejercicio_ibfk_1')->references(['id_tipo'])->on('tipo_ejercicio')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ejercicio', function (Blueprint $table) {
            $table->dropForeign('ejercicio_ibfk_1');
        });
    }
};
