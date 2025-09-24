@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">👥 Gestión de Usuarios</h1>

<!-- Botón crear -->
<a href="{{ route('usuarios.create') }}" 
   class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
   ➕ Crear Usuario
</a>

<!-- Listado de usuarios -->
<div class="bg-white p-6 rounded shadow space-y-3">
  @foreach($usuarios as $usuario)
    <div class="border rounded p-3 flex justify-between items-center">
      <div>
        <p><strong>{{ $usuario->nombre }} {{ $usuario->apellido }}</strong> - {{ $usuario->tipo_usuario->rol ?? 'No definido' }}</p>
        <p class="text-sm text-gray-500">{{ $usuario->email }}</p>
      </div>
      <div class="flex gap-2">
        <!-- Botón Editar -->
        <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" 
           class="bg-yellow-400 hover:bg-yellow-300 text-white px-3 py-1 rounded text-xs">
           ✏️ Actualizar
        </a>

        <!-- Botón Eliminar -->
        <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded text-xs">
            ❌ Eliminar
          </button>
        </form>
      </div>
    </div>
  @endforeach
</div>

<!-- Mensaje de éxito -->
@if(session('success'))
    <div id="success-message" class="fixed top-5 right-5 bg-green-600 text-white px-4 py-2 rounded shadow">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function() {
            let msg = document.getElementById('success-message');
            if(msg) msg.remove();
        }, 3000);
    </script>
@endif
@endsection
