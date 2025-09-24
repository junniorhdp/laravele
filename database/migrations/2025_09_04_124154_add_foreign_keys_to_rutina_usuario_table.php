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
        Schema::table('rutina_usuario', function (Blueprint $table) {
            $table->foreign(['id_usuario'], 'rutina_usuario_ibfk_1')->references(['id_usuario'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_rutina'], 'rutina_usuario_ibfk_2')->references(['id_rutina'])->on('rutina')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rutina_usuario', function (Blueprint $table) {
            $table->dropForeign('rutina_usuario_ibfk_1');
            $table->dropForeign('rutina_usuario_ibfk_2');
        });
    }
};
