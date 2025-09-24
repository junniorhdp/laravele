<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membresias</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
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

<div class="header-content container">
      
    <div class="header-info">
           
             
        <h1>Se fuerte</h1>
        <p>No se trata de ser el mejor, se trata de ser mejor que ayer</p>
<!-- FAqui inicia el boton --> <a href="membresias.html">
<div class="container-button">
  <div class="hover bt-1"></div>
  <div class="hover bt-2"></div>
  <div class="hover bt-3"></div>
  <div class="hover bt-4"></div>
  <div class="hover bt-5"></div>
  <div class="hover bt-6"></div>
</div>
</a> <!-- aqui termina el boton -->
    </div>

</div>

    </header>
            <!-- Sección Membresías -->
    <section class="gym container" id="membresias">
        <div class="gym-1">
            <h2><span>Próximamente:</span> Membresías FlexFit</h2>
            <p>Estamos trabajando en planes accesibles, personalizados y llenos de beneficios. Muy pronto podrás elegir la membresía que mejor se adapte a tus objetivos, tu estilo de vida y tu nivel de entrenamiento.</p>
            <p>Accede a contenido exclusivo, seguimiento de tu progreso y rutinas premium diseñadas por profesionales.</p>
            <a class="btn-glitch-fill" href="#">
                <span class="text">Muy pronto</span><span class="text-decoration">🔥</span>
            </a>
        </div>

        <div class="gym-2">
            <img class="img-1" src="img/descarga.jpg" alt="Plan básico">
            <img class="img-2" src="img/descarga2.jpg" alt="Plan avanzado">
        </div>
    </section>
      <footer>
    &copy; 2025 FlexFit - Todos los derechos reservados
  </footer>


</body>
</html>
