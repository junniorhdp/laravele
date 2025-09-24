<!-- ADMINISTRADOR - admin.html -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Panel Administrador - FLEXFIT</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Barra lateral -->
  <div class="flex min-h-screen">
    <aside class="bg-gray-900 text-white w-64 flex flex-col">
      <div class="p-6 text-2xl font-bold border-b border-gray-700">FLEXFIT</div>
      <nav class="flex-1 p-4 space-y-2">
        <a href="#" class="block p-3 rounded hover:bg-gray-800">📊 Dashboard</a>
        <a href="#" class="block p-3 rounded hover:bg-gray-800">👥 Usuarios</a>
        <a href="#" class="block p-3 rounded hover:bg-gray-800">🏋️ Rutinas</a>
        <a href="#" class="block p-3 rounded hover:bg-gray-800">📈 Estadísticas</a>
      </nav>
      <!-- Botón Cerrar Sesión -->
<button 
    onclick="cerrarSesion()" 
    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-200"
>
    <i class="fa fa-sign-out-alt mr-2"></i>Cerrar sesión
</button>

<script>
function cerrarSesion() {
    // Limpiar datos almacenados
    localStorage.clear();
    // Redirigir al inicio
    window.location.href = "index.html";
}
</script>

    </aside>

    <!-- Contenido principal -->
    <main class="flex-1 p-6">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">Panel del Administrador</h1>

      <!-- Tarjetas de estadísticas -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded shadow">
          <p class="text-gray-500">Usuarios activos</p>
          <h2 class="text-2xl font-bold">124</h2>
        </div>
        <div class="bg-white p-6 rounded shadow">
          <p class="text-gray-500">Rutinas totales</p>
          <h2 id="contadorRutinas" class="text-2xl font-bold">0</h2>
        </div>
        <div class="bg-white p-6 rounded shadow">
          <p class="text-gray-500">Profesionales</p>
          <h2 class="text-2xl font-bold">12</h2>
        </div>
      </div>

      <!-- Gestión de usuarios -->
      <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-xl font-semibold mb-4">Gestión de Profesionales y Usuarios</h2>
        <div class="flex flex-col md:flex-row gap-4 mb-4">
          <input type="text" id="nombreUsuario" placeholder="Nombre del usuario" class="border rounded p-2 flex-1">
          <select id="rolUsuario" class="border rounded p-2">
            <option value="usuario">Usuario</option>
            <option value="profesional">Profesional</option>
          </select>
        </div>
        <div class="flex flex-wrap gap-2">
          <button onclick="agregarUsuario()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">Agregar usuario</button>
          <button onclick="verUsuarios()" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-500">Ver todos</button>
          <button onclick="eliminarUsuario()" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Eliminar</button>
          <button onclick="promoverProfesional()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">Promover</button>
        </div>
        <div id="usuariosLista" class="mt-4"></div>
      </div>

      <!-- Rutinas -->
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Supervisión de Rutinas</h2>
        <div id="rutinasAdmin"></div>
      </div>
    </main>
  </div>

  <script>
    let usuarios = [
      { nombre: "Carlos", rol: "usuario" },
      { nombre: "Ana", rol: "profesional" },
      { nombre: "Luis", rol: "usuario" }
    ];

    let rutinasPendientes = JSON.parse(localStorage.getItem("rutinasFlexfit")) || [];

    function agregarUsuario() {
      const nombre = document.getElementById("nombreUsuario").value.trim();
      const rol = document.getElementById("rolUsuario").value;
      if (nombre) {
        usuarios.push({ nombre, rol });
        verUsuarios();
        document.getElementById("nombreUsuario").value = "";
      }
    }

    function verUsuarios() {
      const contenedor = document.getElementById("usuariosLista");
      contenedor.innerHTML = `
        <ul class="divide-y divide-gray-200">
          ${usuarios.map(u => `<li class="py-2">${u.nombre} - <span class="font-semibold">${u.rol}</span></li>`).join('')}
        </ul>
      `;
    }

    function eliminarUsuario() {
      const nombre = document.getElementById("nombreUsuario").value.trim();
      usuarios = usuarios.filter(u => u.nombre.toLowerCase() !== nombre.toLowerCase());
      verUsuarios();
    }

    function promoverProfesional() {
      const nombre = document.getElementById("nombreUsuario").value.trim();
      const usuario = usuarios.find(u => u.nombre.toLowerCase() === nombre.toLowerCase());
      if (usuario) {
        usuario.rol = "profesional";
        verUsuarios();
      }
    }

    function mostrarRutinasPendientes() {
      const contenedor = document.getElementById("rutinasAdmin");
      contenedor.innerHTML = "";
      rutinasPendientes.forEach((r, i) => {
        contenedor.innerHTML += `
          <div class="border rounded p-4 mb-4">
            <h4 class="font-bold text-lg">${r.nombre}</h4>
            <p class="text-gray-600">${r.descripcion}</p>
            <div class="flex gap-2 mt-2">
              <button onclick="aceptarRutina(${i})" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-500">Aceptar</button>
              <button onclick="rechazarRutina(${i})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-500">Rechazar</button>
            </div>
          </div>
        `;
      });
      document.getElementById("contadorRutinas").innerText = rutinasPendientes.length;
    }

    function aceptarRutina(index) {
      rutinasPendientes[index].aprobada = true;
      localStorage.setItem("rutinasFlexfit", JSON.stringify(rutinasPendientes));
      mostrarRutinasPendientes();
    }

    function rechazarRutina(index) {
      rutinasPendientes.splice(index, 1);
      localStorage.setItem("rutinasFlexfit", JSON.stringify(rutinasPendientes));
      mostrarRutinasPendientes();
    }

    mostrarRutinasPendientes();
  </script>
</body>
</html>