<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/styleIniciarSesion.css')}}">
 <link rel="icon" href="img/ejercicio.png">
  <title>Formulario Registro</title>
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
  <h4>Formulario Registro</h4>
  <form id="registroForm">
    <input class="controls" type="text" name="nombres" id="registroNombres" placeholder="Ingrese su Nombre">
    <input class="controls" type="text" name="apellidos" id="registroApellidos" placeholder="Ingrese su Apellido">
    <input class="controls" type="email" name="correo" id="registroCorreo" placeholder="Ingrese su Correo">
    <input class="controls" type="password" name="password" id="registroPassword" placeholder="Ingrese su Contraseña">
    <p>Estoy de acuerdo con <a href="#">Términos y Condiciones</a></p>
    <input class="botons" type="submit" value="Registrar">
    <p><a href="{{route('login')}}">¿Ya tienes Cuenta? Registrate</a></p>
  </form>
</section>

</body>
</html>
