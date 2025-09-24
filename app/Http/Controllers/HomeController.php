<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $rol = $usuario->tipo_usuario->rol; // obtiene "admin", "profesional" o "usuario"

        if ($rol === 'admin') {
            return redirect()->route('admin.index');
        } elseif ($rol === 'profesional') {
            return redirect()->route('profesionales.index');
        } else {
            return redirect()->route('users.show');
        }
    }

    public function welcome()
    {
        return view('welcome');
    }
}
