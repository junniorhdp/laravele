<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLEXFIT - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Layout -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-900 text-white w-64 flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-gray-700">
                FLEXFIT
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block p-3 rounded hover:bg-gray-800">📊 Dashboard</a>
                <a href="{{ route('usuarios.index') }}" class="block p-3 rounded hover:bg-gray-800">👥 Usuarios</a>
                <a href="{{ route('rutinas.index') }}" class="block p-3 rounded hover:bg-gray-800">🏋️ Rutinas</a>
                <a href="{{ route('ejercicios.index') }}" class="block p-3 rounded hover:bg-gray-800">💪 Ejercicios</a>
                <a href="#programas" class="block p-3 rounded hover:bg-gray-800">📂 Programas</a>
                <a href="#configuracion" class="block p-3 rounded hover:bg-gray-800">⚙️ Configuración</a>
            </nav>

            <!-- Botón cerrar sesión -->
            <div class="p-4 border-t border-gray-700">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button 
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white w-full py-2 rounded font-semibold transition"
                    >
                        🔒 Cerrar sesión
                    </button>
                </form>
            </div>
        </aside>

        <!-- Contenido dinámico -->
        <main class="flex-1 p-6 space-y-10">
            @yield('content')
        </main>
    </div>

</body>
</html>
