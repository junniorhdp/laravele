<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nosotros - FlexFit</title>
  <link rel="stylesheet" href="{{asset('css/nosotros.css')}}">
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


  <div class="lines">
    <div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div>
    <div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div>
  </div>

  <div class="container">
    <h1>Sobre Nosotros</h1>

    <div class="section">
      <h2>Misión</h2>
      <p>Desarrollar una plataforma web innovadora de entrenamiento físico que combine accesibilidad, diseño moderno y herramientas útiles, permitiendo a los usuarios mejorar su salud desde cualquier lugar y a su propio ritmo.</p>
    </div>

    <div class="section">
      <h2>Visión</h2>
      <p>Ser reconocidos como un equipo joven y emprendedor que transforma ideas simples en soluciones digitales funcionales y atractivas, contribuyendo al bienestar físico y mental de las personas.</p>
    </div>

    <div class="section">
      <h2>Nuestra Historia</h2>
      <p>Somos cuatro estudiantes apasionados por la tecnología, el diseño y la salud. Nacimos como un equipo de trabajo con un sueño en común: crear una plataforma que ayudara a las personas a entrenar sin complicaciones. Así nació FlexFit, un proyecto que va más allá de una tarea: es nuestra primera apuesta por construir algo grande y útil para todos.</p>
    </div>

    <div class="section">
      <h2>Valores</h2>
      <div class="valores">
        <div class="valor">
          <h3>Creatividad</h3>
          <p>Cada parte de FlexFit ha sido pensada y diseñada desde cero, con ideas frescas y una mirada joven.</p>
        </div>
        <div class="valor">
          <h3>Trabajo en equipo</h3>
          <p>Cuatro mentes, una sola meta. Aprendemos y crecemos juntos en cada etapa del proyecto.</p>
        </div>
        <div class="valor">
          <h3>Empatía</h3>
          <p>Entendemos que cada usuario es diferente. Por eso FlexFit se adapta a cada estilo de vida.</p>
        </div>
        <div class="valor">
          <h3>Superación</h3>
          <p>Igual que en el entrenamiento, buscamos mejorar día a día, tanto en nuestras habilidades como en nuestro producto.</p>
        </div>
      </div>
    </div>
  </div>

  <footer>
    &copy; 2025 FlexFit - Todos los derechos reservados
  </footer>
</body>
</html>
