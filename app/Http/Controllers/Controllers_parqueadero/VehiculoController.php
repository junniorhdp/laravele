<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar todos los vehículos
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Método para mostrar el formulario de creación
        return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Este método guarda el vehículo en la base de datos
        $request->validate([
            'placa' => 'required|unique:vehiculos,placa|max:10',
            'marca' => 'required|max:50',
            'modelo' => 'required|max:50',
            'color' => 'required|max:30',
        ]);
        Vehiculo::create($request->all());
        return redirect()->route('vehiculos.index')
                            ->with('success', 'Vehículo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Aquí vamos a buscar el vehículo por su ID
        $vehiculo = Vehiculo::findOrFail($id);

        //Retornar la vista con la información del vehículo
        return view('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        //Aquí vamos a buscar el vehículo por su ID
        $vehiculo = Vehiculo::findOrFail($id);

        //Retornar la vista con la información del vehículo
        return view('vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validamos los datos
        $request->validate([
            'placa' => 'required|unique:vehiculos,placa,'.$id.'|max:10',
            'marca' => 'required|max:50',
            'modelo' => 'required|max:50',
            'color' => 'required|max:30',
        ]);

        //Buscar el vehículo por su ID
        $vehiculo = Vehiculo::findOrFail($id);
        //Actualizar el vehículo con los datos del formulario
        $vehiculo->update($request->all());

        //Redirigir al listado de vehículos con un mensaje de éxito
        return redirect()->route('vehiculos.index')
                            ->with('success', 'Vehículo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //eliminar un vehículo
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();

        //Redirigir al listado de vehículos con un mensaje de éxito
        return redirect()->route('vehiculos.index')
                            ->with('success', 'Vehículo eliminado exitosamente.');
    }
}
