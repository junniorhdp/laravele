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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('id_usuario', true);
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro']);
            $table->string('contrasena');
            $table->tinyInteger('edad')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('objetivo', 100)->nullable();
            $table->string('disciplina_preferida', 100)->nullable();
            $table->date('fecha_registro')->nullable();
            $table->tinyInteger('id_tipo_usuario')->nullable()->index('id_tipo_usuario');
            $table->smallInteger('id_medida')->nullable()->index('id_medida');
            $table->tinyInteger('nivel_usuario')->nullable()->index('nivel_usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
