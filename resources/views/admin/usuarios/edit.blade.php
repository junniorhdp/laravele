@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<h1 class="text-2xl font-bold mb-4">✏️ Editar Usuario</h1>

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

<form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
  @csrf
  @method('PUT')

  <div>
    <label class="block font-semibold mb-1">Nombre</label>
    <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" 
           class="border rounded p-2 w-full" required>
    @error('nombre') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block font-semibold mb-1">Apellido</label>
    <input type="text" name="apellido" value="{{ old('apellido', $usuario->apellido) }}" 
           class="border rounded p-2 w-full" required>
    @error('apellido') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block font-semibold mb-1">Correo</label>
    <input type="email" name="correo" value="{{ old('correo', $usuario->email) }}" 
           class="border rounded p-2 w-full" required>
    @error('correo') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block font-semibold mb-1">Contraseña (opcional)</label>
    <input type="password" name="password" placeholder="Dejar vacío para no cambiar" 
           class="border rounded p-2 w-full">
    @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block font-semibold mb-1">Rol</label>
    <select name="rol" class="border rounded p-2 w-full">
      @foreach($roles as $tipo)
        <option value="{{ $tipo->id_tipo_usuario }}" 
            {{ $usuario->id_tipo_usuario == $tipo->id_tipo_usuario ? 'selected' : '' }}>
            {{ $tipo->rol }}
        </option>
      @endforeach
    </select>
    @error('rol') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>

  <div class="flex gap-2">
    <button type="submit" class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded">
      💾 Actualizar
    </button>
    <a href="{{ route('usuarios.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
      Cancelar
    </a>
  </div>
</form>
@endsection
