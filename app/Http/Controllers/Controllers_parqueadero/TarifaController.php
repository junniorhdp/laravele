<?php

namespace App\Http\Controllers;

use App\Models\Tarifa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tarifas = Tarifa::all();
        return view('tarifas.index', compact('tarifas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tarifas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'tipo' => 'required|unique:tarifas,tipo|max:50',
            'valor_hora' => 'required|numeric|min:0',
        ]);
        Tarifa::create($request->all());
        return redirect()->route('tarifas.index')
                            ->with('success', 'Tarifa creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
