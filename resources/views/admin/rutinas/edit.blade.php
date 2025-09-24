@extends('layouts.app')

@section('title', 'Editar Rutina')

@section('content')
<h1 class="text-2xl font-bold mb-4">✏️ Editar Rutina</h1>

<form action="{{ route('rutinas.update', $rutina->id_rutina) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
  @csrf
  @method('PUT')
  <div>
    <label>Nombre</label>
    <input type="text" name="nombre" value="{{ $rutina->nombre }}" class="border rounded p-2 w-full" required>
  </div>
  <div>
    <label>Descripción</label>
    <textarea name="descripcion" class="border rounded p-2 w-full">{{ $rutina->descripcion }}</textarea>
  </div>
  <div class="flex gap-2">
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">Actualizar</button>
    <a href="{{ route('rutinas.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Cancelar</a>
  </div>
</form>
@endsection
