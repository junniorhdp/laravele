<?php

namespace Database\Seeders;
use App\Models\TipoUsuario; // Importa el modelo Usuario
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;


class TipoUsuarioSeeder extends Seeder
{
    public function run()
    {

    TipoUsuario::create([
    'id_tipo_usuario' => '1',
    'rol' => 'Usuario',
    ]);
    TipoUsuario::create([
        'id_tipo_usuario' => '2',
        'rol' => 'Profesional',
    ]);
    TipoUsuario::create([
        'id_tipo_usuario' => '3',
        'rol' => 'Admin',
    ]);
    }
}