@extends('layouts.app')

@section('title', 'Crear Profesional')

@section('content')
<h1 class="text-2xl font-bold mb-4">➕ Crear Profesional</h1>

<form action="{{ route('profesionales.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
  @csrf
  <div>
    <label>Nombre</label>
    <input type="text" name="nombre" class="border rounded p-2 w-full" required>
  </div>
  <div>
    <label>Apellido</label>
    <input type="text" name="apellido" class="border rounded p-2 w-full" required>
  </div>
  <div>
    <label>Correo</label>
    <input type="email" name="correo" class="border rounded p-2 w-full" required>
  </div>
  <div>
    <label>Especialidad</label>
    <input type="text" name="especialidad" class="border rounded p-2 w-full">
  </div>
  <div>
    <label>Contraseña</label>
    <input type="password" name="password" class="border rounded p-2 w-full" required>
  </div>
  <input type="hidden" name="rol" value="profesional">

  <div class="flex gap-2">
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">Guardar</button>
    <a href="{{ route('profesionales.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Cancelar</a>
  </div>
</form>
@endsection
