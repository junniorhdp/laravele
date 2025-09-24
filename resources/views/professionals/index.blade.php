@extends('layouts.app')

@section('title', 'Profesionales')

@section('content')
<h1 class="text-3xl font-bold mb-6">👨‍⚕️ Profesionales</h1>

<a href="{{ route('profesionales.create') }}" 
   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 inline-block mb-4">
   ➕ Nuevo Profesional
</a>

<div class="bg-white p-6 rounded shadow space-y-3">
  @foreach($profesionales as $pro)
    <div class="border rounded p-3 flex justify-between items-center">
      <div>
        <p><strong>{{ $pro->nombre }} {{ $pro->apellido }}</strong></p>
        <p class="text-sm text-gray-500">{{ $pro->correo }}</p>
        <p class="text-xs text-gray-400">Especialidad: {{ $pro->especialidad ?? 'No definida' }}</p>
      </div>
      <div class="flex gap-2">
        <a href="{{ route('profesionales.edit', $pro->id_usuario) }}" class="text-blue-600 text-xs">✏️ Editar</a>
        <form action="{{ route('profesionales.destroy', $pro->id_usuario) }}" method="POST" onsubmit="return confirm('¿Eliminar profesional?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-rose-600 text-xs">❌ Eliminar</button>
        </form>
      </div>
    </div>
  @endforeach
</div>
@endsection
