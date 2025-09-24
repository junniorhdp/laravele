@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<h1 class="text-2xl font-bold mb-4">➕ Crear Usuario</h1>

<form action="{{ route('usuarios.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
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
    <label>Contraseña</label>
    <input type="password" name="password" class="border rounded p-2 w-full" required>
  </div>
  <div>
    <label>Rol</label>
    <select name="rol" class="border rounded p-2 w-full">
        @foreach(\App\Models\TipoUsuario::all() as $tipo)
            <option value="{{ $tipo->id_tipo_usuario }}">{{ $tipo->rol }}</option>
        @endforeach
    </select>
  </div>
  <div class="flex gap-2">
    <button type="submit" class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
    <a href="{{ route('usuarios.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
  </div>
</form>
@endsection
