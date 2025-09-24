@extends('layouts.app')

@section('title', 'Crear Rutina')

@section('content')
<h1 class="text-2xl font-bold mb-4">➕ Crear Rutina</h1>

<form action="{{ route('rutinas.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
  @csrf
  <div>
    <label>Nombre</label>
    <input type="text" name="nombre" class="border rounded p-2 w-full" required>
  </div>
  <div>
    <label>Descripción</label>
    <textarea name="descripcion" class="border rounded p-2 w-full"></textarea>
  </div>
  <div class="flex gap-2">
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">Guardar</button>
    <a href="{{ route('rutinas.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Cancelar</a>
  </div>
</form>
@endsection
