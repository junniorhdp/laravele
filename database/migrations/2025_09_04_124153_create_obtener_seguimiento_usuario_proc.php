<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_seguimiento_usuario`(IN `p_id_usuario` INT)
SELECT 
    s.fecha, s.id_ejercicio, s.repeticiones_realizadas, s.series_realizadas, s.peso_usado
  FROM seguimiento AS s
  WHERE s.id_usuario = p_id_usuario
  ORDER BY s.fecha DESC");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS obtener_seguimiento_usuario");
    }
};
