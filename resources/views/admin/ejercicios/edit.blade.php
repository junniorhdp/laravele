@extends('layouts.app')

@section('title', 'Editar Ejercicio')

@section('content')
<h1 class="text-2xl font-bold mb-4">✏️ Editar Ejercicio</h1>

<form action="{{ route('ejercicios.update', $ejercicio->id_ejercicio) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
  @csrf
  @method('PUT')
  <div>
    <label>Nombre</label>
    <input type="text" name="nombre" value="{{ $ejercicio->nombre }}" class="border rounded p-2 w-full" required>
  </div>
  <div>
    <label>Grupo Muscular</label>
    <input type="text" name="grupo_muscular" value="{{ $ejercicio->grupo_muscular }}" class="border rounded p-2 w-full" required>
  </div>
  <div>
    <label>Descripción</label>
    <textarea name="descripcion" class="border rounded p-2 w-full">{{ $ejercicio->descripcion }}</textarea>
  </div>
  <div class="flex gap-2">
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">Actualizar</button>
    <a href="{{ route('ejercicios.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Cancelar</a>
  </div>
</form>
@endsection
