<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all(); // Trae todos los usuarios, sin filtrar por rol
        return view('admin.usuarios.index', compact('usuarios'));
    }

    // Formulario crear usuario
    public function create()
    {
        $roles = TipoUsuario::all(); // Para llenar el select de roles
        return view('admin.usuarios.create', compact('roles'));
    }

    // Guardar usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo'   => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6',
            'rol'      => 'required|exists:tipo_usuario,id_tipo_usuario',
        ]);

        Usuario::create([
            'nombre'          => $request->nombre,
            'apellido'        => $request->apellido,
            'email'           => $request->correo, // Mapeamos correo a email
            'password'        => Hash::make($request->password),
            'id_tipo_usuario' => $request->rol,
            'fecha_registro'  => now(),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente ✅');
    }

    // Formulario editar usuario
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $roles = TipoUsuario::all(); // Para llenar el select de roles
        return view('admin.usuarios.edit', compact('usuario', 'roles'));
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo'   => 'required|email|unique:usuarios,email,' . $usuario->id_usuario . ',id_usuario',
            'password' => 'required|min:6',
            'rol'      => 'required|exists:tipo_usuario,id_tipo_usuario',
        ]);

        $usuario->update([
            'nombre'          => $request->nombre,
            'apellido'        => $request->apellido,
            'email'           => $request->correo,
            'password'        => Hash::make($request->password),
            'id_tipo_usuario' => $request->rol,
        ]);

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
            $usuario->save();
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente ✏️');
    }

    // Eliminar usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente ❌');
    }
}


/*

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $usuarios = User::all();
        return view('users.index', compact('usuarios'));
    }

    // Mostrar formulario para crear usuario
    public function create()
    {
        return view('users.create');
    }

    // Guardar usuario nuevo
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // en Laravel se recomienda encriptar la contraseña
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('users.index')
                         ->with('success', 'Usuario creado exitosamente.');
    }

    // Mostrar un usuario en detalle
    public function show(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('users.show', compact('usuario'));
    }

    // Mostrar formulario para editar usuario
    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('users.edit', compact('usuario'));
    }

    // Actualizar usuario
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'  => 'required|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $usuario = User::findOrFail($id);

        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // no sobreescribir si no envían password
        }

        $usuario->update($data);

        return redirect()->route('users.index')
                         ->with('success', 'Usuario actualizado exitosamente.');
    }

    // Eliminar usuario
    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('users.index')
                         ->with('success', 'Usuario eliminado exitosamente.');
    }
}
*/