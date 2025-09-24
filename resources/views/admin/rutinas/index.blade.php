@extends('layouts.app')

@section('title', 'Rutinas')

@section('content')
<h1 class="text-3xl font-bold mb-6">🏋️ Rutinas</h1>

<a href="{{ route('rutinas.create') }}" 
   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 inline-block mb-4">
   ➕ Nueva Rutina
</a>

<div class="bg-white p-6 rounded shadow space-y-3">
  @foreach($rutinas as $rutina)
    <div class="border rounded p-3 flex justify-between items-center">
      <div>
        <p><strong>{{ $rutina->nombre }}</strong></p>
        <p class="text-sm text-gray-500">{{ $rutina->descripcion }}</p>
      </div>
      <div class="flex gap-2">
        <a href="{{ route('rutinas.edit', $rutina->id_rutina) }}" class="text-blue-600 text-xs">✏️ Editar</a>
        <form action="{{ route('rutinas.destroy', $rutina->id_rutina) }}" method="POST" onsubmit="return confirm('¿Eliminar rutina?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-rose-600 text-xs">❌ Eliminar</button>
        </form>
      </div>
    </div>
  @endforeach
</div>
@endsection
