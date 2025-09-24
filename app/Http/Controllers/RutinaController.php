<?php

namespace App\Http\Controllers;

use App\Models\Rutina;
use Illuminate\Http\Request;

class RutinaController extends Controller
{
    public function index()
    {
        $rutinas = Rutina::all();
        return view('rutina.index', compact('rutina'));
    }

    public function create()
    {
        return view('rutina.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'         => 'required|max:100',
            'descripcion'    => 'required|max:255',
            'id_nivel'       => 'required|integer|exists:nivel,id_nivel',
            'disciplina'     => 'required|max:100',
            'duracion_total' => 'required|integer|min:1',
            'comentario'     => 'nullable|max:255',
        ]);

        Rutina::create($request->all());

        return redirect()->route('rutina.index')
                         ->with('success', 'Rutina creada exitosamente.');
    }

    public function show(string $id)
    {
        $rutina = Rutina::findOrFail($id);
        return view('rutina.show', compact('rutina'));
    }

    public function edit(string $id)
    {
        $rutina = Rutina::findOrFail($id);
        return view('admin.rutinas.edit', compact('rutina'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre'         => 'required|max:100',
            'descripcion'    => 'required|max:255',
            'id_nivel'       => 'required|integer|exists:nivel,id_nivel',
            'disciplina'     => 'required|max:100',
            'duracion_total' => 'required|integer|min:1',
            'comentario'     => 'nullable|max:255',
        ]);

        $rutina = Rutina::findOrFail($id);
        $rutina->update($request->all());

        return redirect()->route('rutina.index')
                         ->with('success', 'Rutina actualizada exitosamente.');
    }

    public function destroy(string $id)
    {
        $rutina = Rutina::findOrFail($id);
        $rutina->delete();

        return redirect()->route('rutina.index')
                         ->with('success', 'Rutina eliminada exitosamente.');
    }
}
// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use App\Models\Rutina;

// use Illuminate\Http\Request;


// class RutinaController extends Controller
// {
//     /*
//       Display a listing of the resource.
//      */
//     public function index()
//     {
//         //Mostrar todos las rutinas
//         $rutina = Rutina::all();
//         return view('rutina.index', compact('rutina'));
//     }

//     /*
//       Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //Método para mostrar el formulario de creación
//         return view('.create');
//     }

//     /*
//       Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //Este método guarda la rutina en la base de datos
//         $request->validate([
//             'nombre'        => 'required|max:100',
//             'descripcion'   => 'required|max:255',
//             'id_nivel'      => 'required|integer|exists:niveles,id_nivel',
//             'disciplina'    => 'required|max:100',
//             'duracion_total'=> 'required|integer|min:1',
//             'comentario'    => 'nullable|max:255',
//         ]);

//     Rutina::create($request->all());

//     return redirect()->route('rutinas.index')
//                      ->with('success', 'Rutina creada exitosamente.');
//     }


//     /*
//       Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //Aquí vamos a buscar el vehículo por su ID
//         $rutina = Rutina::findOrFail($id);

//         //Retornar la vista con la información del vehículo
//         return view('rutina.show', compact('rutina'));
//     }

//     /*
//       Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//         //Aquí vamos a buscar el vehículo por su ID
//         $rutina = Rutina::findOrFail($id);

//         //Retornar la vista con la información del vehículo
//         return view('rutina.edit', compact('rutina'));
//     }

//     /*
//       Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //Validamos los datos
//         $request->validate([
//             'nombre'        => 'required|max:100',
//             'descripcion'   => 'required|max:255',
//             'id_nivel'      => 'required|integer|exists:niveles,id_nivel',
//             'disciplina'    => 'required|max:100',
//             'duracion_total'=> 'required|integer|min:1',
//             'comentario'    => 'nullable|max:255',
//         ]);

//         //Buscar la rutina por su ID
//         $rutina = Rutina::findOrFail($id);
//         //Actualizar la rutina con los datos del formulario
//         $rutina->update($request->all());

//         return redirect()->route('rutinas.index')
//                      ->with('success', 'La rutina actualizada exitosamente.');
//     }


//     /*
//       Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //eliminar una rutina
        
//         $rutina = Rutina::findOrFail($id);
//         $rutina->delete();

//         //Redirigir al listado de las rutinas con un mensaje de éxito
//         return redirect()->route('rutina.index')
//                             ->with('success', 'La rutina ha sido eliminada exitosamente.');
//     }
// }
