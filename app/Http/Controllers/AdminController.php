<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rutina;
use App\Models\Ejercicio;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Contadores para el dashboard principal
        $totalUsuarios = Usuario::count();
        $admins = Usuario::where('id_tipo_usuario', 3)->count();
        $profesionales = Usuario::where('id_tipo_usuario', 2)->count();
        $clientes = Usuario::where('id_tipo_usuario', 1)->count();
        $totalRutinas = Rutina::count();
        $totalEjercicios = Ejercicio::count();

        // Datos para las tablas CRUD
        $usuarios = Usuario::all();
        $rutinas = Rutina::all();
        $ejercicios = Ejercicio::all();

        return view('admin.dashboard', compact(
            'totalUsuarios',
            'admins',
            'profesionales',
            'clientes',
            'totalRutinas',
            'totalEjercicios',
            'usuarios', // Pasamos la lista completa de usuarios
            'rutinas', // Pasamos la lista completa de rutinas
            'ejercicios' // Pasamos la lista completa de ejercicios
        ));
    }
}

// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\Http\Request;

// class AdminController extends Controller
// {
//     /**
//      * Dashboard principal del administrador.
//      */
//     public function index()
//     {
//         // ejemplo: contar usuarios y profesionales
//         $totalUsuarios = User::whereHas('roles', fn($q) => $q->where('name', 'usuario'))->count();
//         $totalProfesionales = User::whereHas('roles', fn($q) => $q->where('name', 'profesional'))->count();

//         return view('admin.index', compact('totalUsuarios', 'totalProfesionales'));
//     }

//     /**
//      * Listado de todos los usuarios (clientes + profesionales).
//      */
//     public function users()
//     {
//         $usuarios = User::with('roles')->get();
//         return view('admin.users', compact('usuarios'));
//     }

//     /**
//      * Editar un usuario específico.
//      */
//     public function edit($id)
//     {
//         $usuario = User::findOrFail($id);
//         return view('admin.edit-user', compact('usuario'));
//     }

//     /**
//      * Actualizar usuario desde el panel admin.
//      */
//     public function update(Request $request, $id)
//     {
//         $usuario = User::findOrFail($id);

//         $request->validate([
//             'name'  => 'required|max:100',
//             'email' => 'required|email|unique:users,email,' . $id,
//         ]);

//         $usuario->update($request->all());

//         return redirect()->route('admin.users')->with('success', 'Usuario actualizado correctamente.');
//     }

//     /**
//      * Eliminar usuario.
//      */
//     public function destroyUser($id)
//     {
//         $usuario = User::findOrFail($id);
//         $usuario->delete();

//         return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente.');
//     }
// }
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //Mostrar todos los vehículos
//         $vehiculos = Vehiculo::all();
//         return view('vehiculos.index', compact('vehiculos'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //Método para mostrar el formulario de creación
//         return view('vehiculos.create');
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //Este método guarda el vehículo en la base de datos
//         $request->validate([
//             'placa' => 'required|unique:vehiculos,placa|max:10',
//             'marca' => 'required|max:50',
//             'modelo' => 'required|max:50',
//             'color' => 'required|max:30',
//         ]);
//         Vehiculo::create($request->all());
//         return redirect()->route('vehiculos.index')
//                             ->with('success', 'Vehículo creado exitosamente.');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //Aquí vamos a buscar el vehículo por su ID
//         $vehiculo = Vehiculo::findOrFail($id);

//         //Retornar la vista con la información del vehículo
//         return view('vehiculos.show', compact('vehiculo'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//         //Aquí vamos a buscar el vehículo por su ID
//         $vehiculo = Vehiculo::findOrFail($id);

//         //Retornar la vista con la información del vehículo
//         return view('vehiculos.edit', compact('vehiculo'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //Validamos los datos
//         $request->validate([
//             'placa' => 'required|unique:vehiculos,placa,'.$id.'|max:10',
//             'marca' => 'required|max:50',
//             'modelo' => 'required|max:50',
//             'color' => 'required|max:30',
//         ]);

//         //Buscar el vehículo por su ID
//         $vehiculo = Vehiculo::findOrFail($id);
//         //Actualizar el vehículo con los datos del formulario
//         $vehiculo->update($request->all());

//         //Redirigir al listado de vehículos con un mensaje de éxito
//         return redirect()->route('vehiculos.index')
//                             ->with('success', 'Vehículo actualizado exitosamente.');
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //eliminar un vehículo
//         $vehiculo = Vehiculo::findOrFail($id);
//         $vehiculo->delete();

//         //Redirigir al listado de vehículos con un mensaje de éxito
//         return redirect()->route('vehiculos.index')
//                             ->with('success', 'Vehículo eliminado exitosamente.');
//     }
// }
