<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlexFIt</title>
    <link rel="icon" href="img/ejercicio.png">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
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

<div class="header-content container">
      
    <div class="header-info">
           
             
        <h1>Se fuerte</h1>
        <p>No se trata de ser el mejor, se trata de ser mejor que ayer</p>
<!-- FAqui inicia el boton --> <a href="{{route('pages.membresia')}}">
<div class="container-button">
  <div class="hover bt-1"></div>
  <div class="hover bt-2"></div>
  <div class="hover bt-3"></div>
  <div class="hover bt-4"></div>
  <div class="hover bt-5"></div>
  <div class="hover bt-6"></div>
  <button></button>
</div>
</a> <!-- aqui termina el boton -->
    </div>

</div>

    </header>


    <section class="gym container">
  
        <div class="gym-1">
                <h2><span>Diseña</span> tu rutina</h2>
                <p>No necesitas un gimnasio ni un entrenador encima. 
                    Con FlexFit, tú eliges los días, el tipo de 
                    entrenamiento y cuánto tiempo dedicarle. 
                    Todo desde tu compu.</p>
<!-- Aqui inicia --> <a class="btn-glitch-fill" href="registro.html">
  <span class="text">Unete</span><span class="text-decoration">⇒</span>
</a><!-- Aqui termina --> 

            </div>  
            <div class="gym-2">

                <img class="img-1" src="img/g1.jpg" alt="">
                <img class="img-2" src="img/g2.jpg" alt="">


            </div>
    </section>
      
         <section class="gym container">
            
            <div class="gym-2">

                <img class="img-1" src="img/edoardo-cuoghi-5uzsDVRov2w-unsplash.jpg" alt="">
                <img class="img-2" src="img/g4.jpg" alt="">


            </div>
  
        <div class="gym-1">
                <h2><span>Entrenamiento</span> en casa y en el gym</h2>
                <p>No importa dónde entrenes. FlexFit te acompaña tanto si estás en tu casa, 
                    en el parque o en el gimnasio. Tú eliges el lugar y nosotros te damos las rutinas y 
                    herramientas para seguir progresando como si tuvieras un entrenador personal siempre contigo.</p>

                     
            </div>  

    </section>

<section class="gym container">
    <div class="gym-2">
        <img class="img-1" src="img/g6.jpg" alt="">
        <img class="img-2" src="img/gordon-cowie-pZqiQ6uvokA-unsplash.jpg" alt="">
    </div>  
    <div class="gym-1">
        <h2><span>A tu ritmo</span> sin presión</h2>
        <p>Con FlexFit no tienes que seguir el ritmo de nadie más. Tú decides cuándo y cómo entrenar. El sistema se adapta a tu nivel, tu tiempo y tus metas. Sin comparaciones, sin presiones… solo tú y tu progreso.</p>
        <a href="registro.html" class="btn-glitch-fill">
            <span class="text">Unete</span><span class="text-decoration">⇒</span>
        </a>
    </div>
</section>

  <footer>
    &copy; 2025 FlexFit - Todos los derechos reservados
  </footer>


</body>
</html>
