<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario; // Importa el modelo Usuario
use Illuminate\Support\Facades\Hash; // Importa la fachada de Hash
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Usuario::create([
        'nombre' => 'Admin',
        'apellido' => 'User',
        'email' => 'admin@example.com',
        'password' => Hash::make('password123'),
        'id_tipo_usuario' => 3, // O el tipo de usuario que desees
        // ... otros campos requeridos
    ]);
    Usuario::create([
        'nombre' => 'profesional',
        'apellido' => 'User',
        'email' => 'profe@example.com',
        'password' => Hash::make('password123'),
        'id_tipo_usuario' => 2, // O el tipo de usuario que desees
        // ... otros campos requeridos
    ]);
    Usuario::create([
        'nombre' => 'usuario',
        'apellido' => 'User',
        'email' => 'user@example.com',
        'password' => Hash::make('password123'),
        'id_tipo_usuario' => 1, // O el tipo de usuario que desees
        // ... otros campos requeridos
    ]);
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
}
}
