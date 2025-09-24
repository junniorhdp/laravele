<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfessionalController extends Controller
{
    // Mostrar todos los profesionales
    public function index()
    {
        $profesionales = User::where('rol', 'profesional')->get();
        return view('admin.profesionales.index', compact('profesionales'));
    }

    // Formulario crear profesional
    public function create()
    {
        return view('admin.profesionales.create');
    }

    // Guardar profesional
    public function store(Request $request)
    {
        $request->validate([
            'nombre'       => 'required|string|max:255',
            'apellido'     => 'required|string|max:255',
            'correo'       => 'required|email|unique:users,correo',
            'password'     => 'required|min:6',
            'especialidad' => 'nullable|string|max:255',
        ]);

        User::create([
            'nombre'       => $request->nombre,
            'apellido'     => $request->apellido,
            'correo'       => $request->correo,
            'password'     => Hash::make($request->password),
            'rol'          => 'profesional',
            'especialidad' => $request->especialidad
        ]);

        return redirect()->route('profesionales.index')->with('success', 'Profesional creado correctamente ✅');
    }

    // Formulario editar profesional
    public function edit($id)
    {
        $pro = User::findOrFail($id);
        return view('admin.profesionales.edit', compact('pro'));
    }

    // Actualizar profesional
    public function update(Request $request, $id)
    {
        $pro = User::findOrFail($id);

        $request->validate([
            'nombre'       => 'required|string|max:255',
            'apellido'     => 'required|string|max:255',
            'correo'       => 'required|email|unique:users,correo,' . $pro->id_usuario . ',id_usuario',
            'especialidad' => 'nullable|string|max:255',
        ]);

        $pro->update([
            'nombre'       => $request->nombre,
            'apellido'     => $request->apellido,
            'correo'       => $request->correo,
            'especialidad' => $request->especialidad,
        ]);

        if ($request->filled('password')) {
            $pro->password = Hash::make($request->password);
            $pro->save();
        }

        return redirect()->route('profesionales.index')->with('success', 'Profesional actualizado correctamente ✏️');
    }

    // Eliminar profesional
    public function destroy($id)
    {
        $pro = User::findOrFail($id);
        $pro->delete();

        return redirect()->route('profesionales.index')->with('success', 'Profesional eliminado correctamente ❌');
    }
}

/*
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    public function index()
    {
        $profesionales = Usuario::all();
        return view('professionals.index', compact('profesionales'));
    }

    public function create()
    {
        return view('professionals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required|max:100',
            'especialidad' => 'required|max:100',
            'telefono'  => 'nullable|max:15',
        ]);

        Usuario::create($request->all());

        return redirect()->route('professionals.index')
                         ->with('success', 'Profesional creado exitosamente.');
    }

    public function show(string $id)
    {
        $profesional = Usuario::findOrFail($id);
        return view('professionals.show', compact('profesional'));
    }

    public function edit(string $id)
    {
        $profesional = Usuario::findOrFail($id);
        return view('professionals.edit', compact('profesional'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre'    => 'required|max:100',
            'especialidad' => 'required|max:100',
            'telefono'  => 'nullable|max:15',
        ]);

        $profesional = Usuario::findOrFail($id);
        $profesional->update($request->all());

        return redirect()->route('professionals.index')
                         ->with('success', 'Profesional actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        $profesional = Usuario::findOrFail($id);
        $profesional->delete();

        return redirect()->route('professionals.index')
                         ->with('success', 'Profesional eliminado exitosamente.');
    }
} */