<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password, 
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $usuario = Auth::user();

            // Aquí se decide a dónde va cada tipo de usuario
            switch ($usuario->id_tipo_usuario) {
                case 3:
                    return redirect()->route('admin.dashboard');
                case 2:
                    return redirect()->route('profesionales.index');
                default:
                    return redirect()->route('users.index');
            }
        }

        return back()->withErrors([
            'auth' => 'Credenciales inválidas.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6|confirmed', 
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'id_tipo_usuario' => 1, // usuario por defecto
        ]);

        Auth::login($usuario);
        return redirect('/home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}