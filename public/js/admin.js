 // Datos persistentes en localStorage
    const LS_USERS = "ff_users";
    const LS_RUTINAS = "rutinasFlexfit"; // ya lo usabas
    const LS_EJERCICIOS = "ff_ejercicios";
    const LS_PROGRAMAS = "ff_programas";

    // Inicializar con valores por defecto si no existe
    let usuarios = JSON.parse(localStorage.getItem(LS_USERS)) || [
      { nombre: "Carlos", apellido: "Gómez", correo: "carlos@mail.com", rol: "usuario" },
      { nombre: "Ana", apellido: "López", correo: "ana@mail.com", rol: "profesional" }
    ];
    let rutinasPendientes = JSON.parse(localStorage.getItem(LS_RUTINAS)) || [];
    let ejercicios = JSON.parse(localStorage.getItem(LS_EJERCICIOS)) || [];
    let programas = JSON.parse(localStorage.getItem(LS_PROGRAMAS)) || [];

    // Guardar estado en localStorage (util)
    function saveAll() {
      localStorage.setItem(LS_USERS, JSON.stringify(usuarios));
      localStorage.setItem(LS_EJERCICIOS, JSON.stringify(ejercicios));
      localStorage.setItem(LS_PROGRAMAS, JSON.stringify(programas));
    }

    function cerrarSesion() {
      // opcional: no borrar todo, solo marcar logout
      localStorage.removeItem('ff_logged_in');
      window.location.href = "index.html";
    }

    // ----------------- USUARIOS CRUD -----------------
    function agregarUsuario() {
      const nombre = document.getElementById("nombreUsuario").value.trim();
      const apellido = document.getElementById("apellidoUsuario").value.trim();
      const correo = document.getElementById("correoUsuario").value.trim();
      const rol = document.getElementById("rolUsuario").value;

      if (!nombre || !apellido || !correo) {
        alert("Completa nombre, apellido y correo.");
        return;
      }
      usuarios.push({ nombre, apellido, correo, rol });
      saveAll();
      verUsuarios();
      // limpiar campos
      document.getElementById("nombreUsuario").value = "";
      document.getElementById("apellidoUsuario").value = "";
      document.getElementById("correoUsuario").value = "";
      document.getElementById("rolUsuario").value = "usuario";
    }

    // Render de lista de usuarios (con toggle, editar y eliminar)
    function verUsuarios() {
      const lista = document.getElementById("usuariosLista");
      lista.innerHTML = usuarios.map((u,i)=>`
        <div id="usuario_${i}" class="border rounded p-2">
          <button onclick="toggleUsuario(${i})" class="w-full text-left font-semibold">
            ${escapeHtml(u.nombre)} ${escapeHtml(u.apellido)} - <span class="text-sm text-gray-500">${escapeHtml(u.rol)}</span>
          </button>
          <div id="usuarioDetalle${i}" class="hidden mt-2 text-sm text-gray-700 space-y-1">
            <p><strong>Nombre:</strong> ${escapeHtml(u.nombre)}</p>
            <p><strong>Apellido:</strong> ${escapeHtml(u.apellido)}</p>
            <p><strong>Correo:</strong> ${escapeHtml(u.correo)}</p>
            <div class="flex gap-2 mt-2">
              <button onclick="editarUsuario(${i})" class="text-blue-600 text-xs">✏️ Editar</button>
              <button onclick="eliminarUsuario(${i})" class="text-rose-600 text-xs">❌ Eliminar</button>
            </div>
          </div>
        </div>
      `).join('');
      actualizarContadores();
    }

    function toggleUsuario(i){
      const detalle = document.getElementById(`usuarioDetalle${i}`);
      if(!detalle) return;
      detalle.classList.toggle("hidden");
    }

    function editarUsuario(i){
      const cont = document.getElementById(`usuario_${i}`);
      if(!cont) return;
      const u = usuarios[i];
      cont.innerHTML = `
        <div class="flex flex-col md:flex-row gap-2 items-start">
          <input id="edit_nombre_${i}" type="text" value="${escapeHtml(u.nombre)}" class="border rounded p-2 w-full md:w-1/4">
          <input id="edit_apellido_${i}" type="text" value="${escapeHtml(u.apellido)}" class="border rounded p-2 w-full md:w-1/4">
          <input id="edit_correo_${i}" type="email" value="${escapeHtml(u.correo)}" class="border rounded p-2 w-full md:w-1/3">
          <select id="edit_rol_${i}" class="border rounded p-2 w-full md:w-1/6">
            <option value="usuario" ${u.rol==='usuario'?'selected':''}>Usuario</option>
            <option value="profesional" ${u.rol==='profesional'?'selected':''}>Profesional</option>
            <option value="admin" ${u.rol==='admin'?'selected':''}>Admin</option>
          </select>
        </div>
        <div class="mt-2 flex gap-2">
          <button onclick="guardarEdicion(${i})" class="bg-green-600 text-white px-3 py-1 rounded text-sm">Guardar</button>
          <button onclick="verUsuarios()" class="bg-gray-300 px-3 py-1 rounded text-sm">Cancelar</button>
        </div>
      `;
    }

    function guardarEdicion(i){
      const nombre = document.getElementById(`edit_nombre_${i}`).value.trim();
      const apellido = document.getElementById(`edit_apellido_${i}`).value.trim();
      const correo = document.getElementById(`edit_correo_${i}`).value.trim();
      const rol = document.getElementById(`edit_rol_${i}`).value;

      if(!nombre || !apellido || !correo){
        alert("Completa todos los campos.");
        return;
      }

      usuarios[i] = { nombre, apellido, correo, rol };
      saveAll();
      verUsuarios();
    }

    function eliminarUsuario(i){
      if(!confirm("¿Eliminar usuario?")) return;
      usuarios.splice(i,1);
      saveAll();
      verUsuarios();
    }

    // ----------------- RUTINAS (pendientes) -----------------
    function mostrarRutinasPendientes() {
      const contenedor = document.getElementById("rutinasAdmin");
      contenedor.innerHTML = rutinasPendientes.map((r, i) => `
        <div class="border rounded p-4 mb-4">
          <h4 class="font-bold">${escapeHtml(r.nombre)}</h4>
          <p>${escapeHtml(r.descripcion)}</p>
          <div class="flex gap-2 mt-2">
            <button onclick="aceptarRutina(${i})" class="bg-green-600 text-white px-3 py-1 rounded">Aceptar</button>
            <button onclick="rechazarRutina(${i})" class="bg-red-600 text-white px-3 py-1 rounded">Rechazar</button>
          </div>
        </div>`).join('');
      document.getElementById("contadorRutinas").innerText = rutinasPendientes.length;
    }
    function aceptarRutina(i) { rutinasPendientes[i].aprobada = true; localStorage.setItem(LS_RUTINAS, JSON.stringify(rutinasPendientes)); mostrarRutinasPendientes(); }
    function rechazarRutina(i) { rutinasPendientes.splice(i, 1); localStorage.setItem(LS_RUTINAS, JSON.stringify(rutinasPendientes)); mostrarRutinasPendientes(); }

    // ----------------- EJERCICIOS -----------------
    function agregarEjercicio() {
      const nombre = document.getElementById("nombreEjercicio").value.trim();
      const grupo = document.getElementById("grupoEjercicio").value.trim();
      const descripcion = document.getElementById("descripcionEjercicio").value.trim();
      if (nombre && grupo) {
        ejercicios.push({ nombre, grupo, descripcion });
        localStorage.setItem(LS_EJERCICIOS, JSON.stringify(ejercicios));
        renderEjercicios();
        document.getElementById("nombreEjercicio").value = "";
        document.getElementById("grupoEjercicio").value = "";
        document.getElementById("descripcionEjercicio").value = "";
      } else {
        alert("Completa nombre y grupo del ejercicio.");
      }
    }
    function renderEjercicios() {
      document.getElementById("ejerciciosLista").innerHTML = ejercicios.map((e,i) => `
        <div class="flex items-center justify-between p-2 border rounded">
          <div>
            <strong>${escapeHtml(e.nombre)}</strong> <span class="text-sm text-gray-500">- ${escapeHtml(e.grupo)}</span>
            <div class="text-sm text-gray-600">${escapeHtml(e.descripcion || '')}</div>
          </div>
          <div class="flex gap-2">
            <button onclick="eliminarEjercicio(${i})" class="text-rose-600 text-sm">Eliminar</button>
          </div>
        </div>
      `).join('');
    }
    function eliminarEjercicio(i){
      if(!confirm("Eliminar ejercicio?")) return;
      ejercicios.splice(i,1);
      localStorage.setItem(LS_EJERCICIOS, JSON.stringify(ejercicios));
      renderEjercicios();
    }

    // ----------------- PROGRAMAS -----------------
    function agregarPrograma(){
      const nombre = document.getElementById("nombrePrograma").value.trim();
      const link = document.getElementById("linkPrograma").value.trim();
      const imagen = document.getElementById("imagenPrograma").value.trim();
      if(!nombre || !link){ alert("Nombre y link son obligatorios."); return; }
      programas.push({ nombre, link, imagen });
      localStorage.setItem(LS_PROGRAMAS, JSON.stringify(programas));
      renderProgramas();
      document.getElementById("nombrePrograma").value = "";
      document.getElementById("linkPrograma").value = "";
      document.getElementById("imagenPrograma").value = "";
    }

    function renderProgramas(){
      const cont = document.getElementById("programasLista");
      if(programas.length===0){
        cont.innerHTML = "<p class='text-sm text-gray-500'>No hay programas.</p>";
      } else {
        cont.innerHTML = programas.map((p,i)=>`
          <div class="flex items-center gap-4 border rounded p-3">
            <div class="w-20 h-20 bg-gray-100 rounded flex items-center justify-center overflow-hidden">
              ${p.imagen ? `<img src="${escapeHtml(p.imagen)}" alt="${escapeHtml(p.nombre)}" class="object-cover w-full h-full">` : `<div class="text-sm text-gray-400">Sin imagen</div>`}
            </div>
            <div class="flex-1">
              <div class="flex items-start justify-between">
                <div>
                  <strong>${escapeHtml(p.nombre)}</strong>
                  <div class="text-xs text-gray-500"><a href="${escapeHtml(p.link)}" target="_blank" class="hover:underline text-blue-600">${escapeHtml(p.link)}</a></div>
                </div>
                <div class="flex flex-col gap-2">
                  <button onclick="eliminarPrograma(${i})" class="text-rose-600 text-sm">Eliminar</button>
                </div>
              </div>
            </div>
          </div>
        `).join('');
      }
      document.getElementById("contadorProgramas").innerText = programas.length;
    }
    function eliminarPrograma(i){
      if(!confirm("Eliminar programa?")) return;
      programas.splice(i,1);
      localStorage.setItem(LS_PROGRAMAS, JSON.stringify(programas));
      renderProgramas();
    }

    // ----------------- CONFIG / Eliminar cuenta -----------------
    function eliminarCuenta(){
      if(confirm("⚠️ ¿Seguro que quieres eliminar tu cuenta de administrador? Se borrarán los datos locales.")){
        localStorage.clear();
        alert("Cuenta eliminada ❌");
        window.location.href = "index.html";
      }
    }

    // ----------------- UTIL y Inicialización -----------------
    function escapeHtml(text){
      if(!text && text !== 0) return "";
      return String(text)
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
    }

    function actualizarContadores(){
      document.getElementById("contadorUsuarios").textContent = usuarios.length;
      document.getElementById("contadorProfesionales").textContent = usuarios.filter(u=>u.rol==="profesional").length;
      document.getElementById("contadorRutinas").textContent = rutinasPendientes.length;
      document.getElementById("contadorProgramas").textContent = programas.length;
    }

    // primera carga
    verUsuarios();
    mostrarRutinasPendientes();
    renderEjercicios();
    renderProgramas();