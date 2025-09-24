<?php

namespace App\Http\Controllers;

use App\Models\Parqueo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParqueoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $parqueos = Parqueo::all();
        return view('parqueos.index', compact('parqueos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('parqueos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'hora_entrada' => 'required|date_format:H:i',
            'hora_salida' => 'nullable|date_format:H:i|after:hora_entrada',
            'tarifa' => 'required|numeric|min:0',
        ]);
        Parqueo::create($request->all());
        return redirect()->route('parqueos.index')
                            ->with('success', 'Parqueo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $parqueo = Parqueo::findOrFail($id);
        return view('parqueos.show', compact('parqueo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $parqueo = Parqueo::findOrFail($id);
        return view('parqueos.edit', compact('parqueo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'hora_entrada' => 'required|date_format:H:i',
            'hora_salida' => 'nullable|date_format:H:i|after:hora_entrada',
            'tarifa' => 'required|numeric|min:0',
        ]);
        $parqueo = Parqueo::findOrFail($id);
        $parqueo->update($request->all());
        return redirect()->route('parqueos.index')
                            ->with('success', 'Parqueo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $parqueo = Parqueo::findOrFail($id);
        $parqueo->delete();
        return redirect()->route('parqueos.index')
                            ->with('success', 'Parqueo eliminado exitosamente.');
    }
}
