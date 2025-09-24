<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/styleIniciarSesion.css')}}">
<link rel="icon" href="/img/ejercicio.png">
  <title>Iniciar Sesion</title>
</head>
<body>
<header class="header">
<div class="menu container">
    <a href="{{route('welcome')}}" class="logo">FLEXFIT</a>
    <input type="checkbox" id="menu">
    <label for="menu"><img src="img/menu.png" class="menu-icono" alt=""></label>
    <nav class="navbar">
          <ul>
            <li><a href="{{route('login')}}">Iniciar Sesion</a></li>
            <li><a href="{{route('pages.contacto')}}">Contactos</a></li>
            <li><a href="{{route('pages.nosotros')}}">Nosotros</a></li>
            <li><a href="{{route('pages.membresia')}}">Membresias</a></li>
          </ul>

    </nav>
</div>
</header>
        <!-- aqui inicia el objeto-->
            <div class="box-of-star1">
    <div class="star star-position1"></div>
    <div class="star star-position2"></div>
    <div class="star star-position3"></div>
    <div class="star star-position4"></div>
    <div class="star star-position5"></div>
    <div class="star star-position6"></div>
    <div class="star star-position7"></div>
  </div>
  <div class="box-of-star2">
    <div class="star star-position1"></div>
    <div class="star star-position2"></div>
    <div class="star star-position3"></div>
    <div class="star star-position4"></div>
    <div class="star star-position5"></div>
    <div class="star star-position6"></div>
    <div class="star star-position7"></div>
  </div>
  <div class="box-of-star3">
    <div class="star star-position1"></div>
    <div class="star star-position2"></div>
    <div class="star star-position3"></div>
    <div class="star star-position4"></div>
    <div class="star star-position5"></div>
    <div class="star star-position6"></div>
    <div class="star star-position7"></div>
  </div>
  <div class="box-of-star4">
    <div class="star star-position1"></div>
    <div class="star star-position2"></div>
    <div class="star star-position3"></div>
    <div class="star star-position4"></div>
    <div class="star star-position5"></div>
    <div class="star star-position6"></div>
    <div class="star star-position7"></div>
  </div>
  <div data-js="astro" class="astronaut">
    <div class="head"></div>
    <div class="arm arm-left"></div>
    <div class="arm arm-right"></div>
    <div class="body">
      <div class="panel"></div>
    </div>
    <div class="leg leg-left"></div>
    <div class="leg leg-right"></div>
    <div class="schoolbag"></div>
  </div>
    <!-- Aqui termina el objeto-->
    <div class='ripple-background'>
  <div class='circle xxlarge shade1'></div>
  <div class='circle xlarge shade2'></div>
  <div class='circle large shade3'></div>
  <div class='circle mediun shade4'></div>
  <div class='circle small shade5'></div>
</div>
<section class="form-register">
  <h4>Iniciar Sesión En FLEXFIT</h4>

  <form action="{{ route('login') }}" method="POST">
  @csrf

  {{-- Campo Email --}}
  <input class="controls" 
         type="email" 
         name="email" 
         id="loginCorreo" 
         value="{{ old('email') }}" 
         placeholder="Ingrese su correo" 
         required>
  @error('email')
    <div style="color:red;">{{ $message }}</div>
  @enderror

  {{-- Campo Contraseña --}}
  <input class="controls" 
         type="password" 
         name="password"  {{-- ¡Cambiamos 'contrasena' a 'password'! --}}
         id="loginPassword" 
         placeholder="Ingrese su Contraseña" 
         required>
  @error('password')
    <div style="color:red;">{{ $message }}</div>
  @enderror

  {{-- Mensaje de error general de autenticación --}}
  @error('auth')
    <div style="color:red;">{{ $message }}</div>
  @enderror

  <p>Estoy de acuerdo con <a href="#">Términos y Condiciones</a></p>
  <input class="botons" type="submit" value="Iniciar Sesión">

  <p><a href="{{ route('register') }}">¿No Te Has Registrado? Regístrate</a></p>
</form>
</section>


<!-- <script>
  document.getElementById("loginForm").addEventListener("submit", function(e) {
  e.preventDefault();

  const correo = document.getElementById("loginCorreo").value.trim();
  const password = document.getElementById("loginPassword").value;

  const usuarios = [
    { correo: "admin@flex.com", contraseña: "admin123", rol: "administrador" },
    { correo: "user@flex.com", contraseña: "user123", rol: "usuario" },
    { correo: "pro@flex.com", contraseña: "pro123", rol: "profesional" }
  ];

  const usuario = usuarios.find(
    u => u.correo === correo && u.contraseña === password
  );

  if (usuario) {
    // Puedes guardar el rol para usarlo luego si deseas
    localStorage.setItem("rol", usuario.rol);
    localStorage.setItem("correo", usuario.correo);

    switch (usuario.rol) {
      case "administrador":
        window.location.href = "admin.html";
        break;
      case "usuario":
        window.location.href = "usuario.html";
        break;
      case "profesional":
        window.location.href = "profesional.html";
        break;
    }
  } else {
    alert("Correo o contraseña incorrectos.");
  }
});

</script> -->


</body>
</html>
