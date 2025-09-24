@extends('layouts.app')

@section('title', 'Editar Profesional')

@section('content')
<h1 class="text-2xl font-bold mb-4">✏️ Editar Profesional</h1>

<form action="{{ route('profesionales.update', $pro->id_usuario) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
  @csrf
  @method('PUT')
  <div>
    <label>Nombre</label>
    <input type="text" name="nombre" value="{{ $pro->nombre }}" class="border rounded p-2 w-full" required>
  </div>
  <div>
    <label>Apellido</label>
    <input type="text" name="apellido" value="{{ $pro->apellido }}" class="border rounded p-2 w-full" required>
  </div>
  <div>
    <label>Correo</label>
    <input type="email" name="correo" value="{{ $pro->correo }}" class="border rounded p-2 w-full" required>
  </div>
  <div>
    <label>Especialidad</label>
    <input type="text" name="especialidad" value="{{ $pro->especialidad }}" class="border rounded p-2 w-full">
  </div>
  <div>
    <label>Nueva Contraseña (opcional)</label>
    <input type="password" name="password" class="border rounded p-2 w-full">
  </div>

  <div class="flex gap-2">
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">Actualizar</button>
    <a href="{{ route('profesionales.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Cancelar</a>
  </div>
</form>
@endsection
