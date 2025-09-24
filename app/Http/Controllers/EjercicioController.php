<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;
use Illuminate\Http\Request;

class EjercicioController extends Controller
{
    public function index()
    {
        $ejercicios = Ejercicio::all();
        return view('ejercicio.index', compact('ejercicio'));
    }

    public function create()
    {
        return view('ejercicio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'       => 'required|max:100',
            'descripcion'  => 'required|max:255',
            'musculo'      => 'required|max:100',
            'video_url'    => 'nullable|url',
        ]);

        Ejercicio::create($request->all());

        return redirect()->route('ejercicio.index')
                         ->with('success', 'Ejercicio creado exitosamente.');
    }

    public function show(string $id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        return view('ejercicio.show', compact('ejercicio'));
    }

    public function edit(string $id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        return view('ejercicio.edit', compact('ejercicio'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre'       => 'required|max:100',
            'descripcion'  => 'required|max:255',
            'musculo'      => 'required|max:100',
            'video_url'    => 'nullable|url',
        ]);

        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio->update($request->all());

        return redirect()->route('ejercicio.index')
                         ->with('success', 'Ejercicio actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio->delete();

        return redirect()->route('ejercicio.index')
                         ->with('success', 'Ejercicio eliminado exitosamente.');
    }
}