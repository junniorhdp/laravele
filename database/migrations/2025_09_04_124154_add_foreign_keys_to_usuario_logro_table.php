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
        Schema::table('usuario_logro', function (Blueprint $table) {
            $table->foreign(['id_usuario'], 'usuario_logro_ibfk_1')->references(['id_usuario'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_logro'], 'usuario_logro_ibfk_2')->references(['id_logro'])->on('logros')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuario_logro', function (Blueprint $table) {
            $table->dropForeign('usuario_logro_ibfk_1');
            $table->dropForeign('usuario_logro_ibfk_2');
        });
    }
};
