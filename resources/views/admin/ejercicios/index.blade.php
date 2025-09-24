@extends('layouts.app')

@section('title', 'Ejercicios')

@section('content')
<h1 class="text-3xl font-bold mb-6">💪 Ejercicios</h1>

<a href="{{ route('ejercicios.create') }}" 
   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 inline-block mb-4">
   ➕ Nuevo Ejercicio
</a>

<div class="bg-white p-6 rounded shadow space-y-3">
  @foreach($ejercicios as $ejercicio)
    <div class="border rounded p-3 flex justify-between items-center">
      <div>
        <p><strong>{{ $ejercicio->nombre }}</strong> ({{ $ejercicio->grupo_muscular }})</p>
        <p class="text-sm text-gray-500">{{ $ejercicio->descripcion }}</p>
      </div>
      <div class="flex gap-2">
        <a href="{{ route('ejercicios.edit', $ejercicio->id_ejercicio) }}" class="text-blue-600 text-xs">✏️ Editar</a>
        <form action="{{ route('ejercicios.destroy', $ejercicio->id_ejercicio) }}" method="POST" onsubmit="return confirm('¿Eliminar ejercicio?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-rose-600 text-xs">❌ Eliminar</button>
        </form>
      </div>
    </div>
  @endforeach
</div>
@endsection
