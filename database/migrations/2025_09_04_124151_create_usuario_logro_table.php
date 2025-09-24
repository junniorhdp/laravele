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
        Schema::create('usuario_logro', function (Blueprint $table) {
            $table->integer('id_usuario');
            $table->smallInteger('id_logro')->index('id_logro');
            $table->date('fecha_obtenida')->nullable();

            $table->primary(['id_usuario', 'id_logro']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_logro');
    }
};
