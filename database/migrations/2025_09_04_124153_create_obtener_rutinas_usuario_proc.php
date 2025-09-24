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
        DB::unprepared("CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_rutinas_usuario`(IN `p_id_usuario ` INT)
SELECT 
    r.id_rutina, r.nombre, r.descripcion, r.disciplina, r.duracion_total
  FROM rutina AS r
  INNER JOIN rutina_usuario AS ru 
    ON ru.id_rutina = r.id_rutina
  WHERE ru.id_usuario = p_id_usuario");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS obtener_rutinas_usuario");
    }
};
