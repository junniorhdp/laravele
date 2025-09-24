<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rutina;
use App\Models\Ejercicio;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $filtro = $request->input('filtro');

        $usuarios = Usuario::when($filtro, function ($query, $filtro) {
            return $query->where('nombre', 'like', "%$filtro%");
        })->get();

        $rutinas = Rutina::when($filtro, function ($query, $filtro) {
            return $query->where('nombre', 'like', "%$filtro%");
        })->get();

        $ejercicios = Ejercicio::when($filtro, function ($query, $filtro) {
            return $query->where('nombre', 'like', "%$filtro%");
        })->get();

        return view('reportes.index', compact('usuarios', 'rutinas', 'ejercicios', 'filtro'));
    }
}