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
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign(['id_tipo_usuario'], 'usuarios_ibfk_1')->references(['id_tipo_usuario'])->on('tipo_usuario')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_medida'], 'usuarios_ibfk_2')->references(['id_medida'])->on('medidas')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['nivel_usuario'], 'usuarios_ibfk_3')->references(['id_nivel'])->on('niveles')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('usuarios_ibfk_1');
            $table->dropForeign('usuarios_ibfk_2');
            $table->dropForeign('usuarios_ibfk_3');
        });
    }
};
