<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Maneja la petición entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  Rol esperado (admin, profesional, usuario)
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Si no está logueado, redirige al login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $usuario = Auth::user();

        // Verifica si coincide el rol requerido con el del usuario
        if ($usuario->id_tipo_usuario === $this->roleToId($role)) {
            return $next($request);
        }

        // Si no coincide, redirige a home (o podrías lanzar 403)
        return redirect()->route('home')->withErrors([
            'auth' => 'No tienes permisos para acceder a esta sección.',
        ]);
    }

    /**
     * Convierte el nombre de rol (string) en id_tipo_usuario (int).
     */
    private function roleToId(string $role): int
    {
        return match ($role) {
            'admin' => 3,
            'profesional' => 2,
            'usuario' => 1,
            default => 1, // fallback a usuario
        };
    }
}
