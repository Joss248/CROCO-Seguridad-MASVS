<?php
include('./php/conexion.php');
?>


<!doctype html>
<html lang="en">
    <head>
        <title>Crocomidat</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link rel="stylesheet" href="../estilos/estilo.css">
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="./estilos/style.css">
        <link rel="icon" href="./img/logo.png" type="image/x-icon">
    </head>

    <body class="bg-black">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-black fixed-top">

                <div class="container">
                  <a href="#" class="navbar-brand fw-bold fs-4 text-light"><span class="fw-bold fs-4" style="color: yellowgreen;">Croco</span>midat</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbar-start" aria-controls="navbar-start" aria-expanded="false"
                  aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
                  <div class="collapse navbar-collapse" id="navbar-start">
                
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a href="#" class="nav-link text-light">Inicio</a>
                </li>
            
                <li class="nav-item">
                <a href="#Locales" class="nav-link text-light">Locales</a>
                </li>
            
                <li class="nav-item">
                <a href="#conocenos" class="nav-link text-light">Conocenos</a>
                </li>
                  
                <li class="nav-item">
                <a href="#prod" class="nav-link text-light">Perfil</a>
                </li>

                <li class="nav-item">
                <a href="./php/login.php" class="nav-link text-light"><span style="color: yellowgreen;">Iniciar Sesión / Registro</span></a>
                </li>
                            
                </ul>

                  </div>
                </div>
                </nav>
        </header>



<!-- CARRUSEL -->

<div id="carouselE1" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselE1" data-bs-slide-to="0" class="active" aria-current="true"
    aria-label="Slide 1">
    </button>
    
    <button type="button" data-bs-target="#carouselE1" data-bs-slide-to="1"
    aria-label="Slide 2">
    </button>
    
    <button type="button" data-bs-target="#carouselE1" data-bs-slide-to="2"
    aria-label="Slide 3">
    </button>
    </div>
    
    <div class="carousel-inner">
    
     <div class="carousel-item active">
    <img src="./img/pexels/pexels-chanwalrus-958545.jpg" class="d-block w-100">
    <div class="carousel-caption">
      <h5>¡Prueba lo desconocido en Gutiérrez Zamora!</h5>
    </div>
      </div>
    
  
    <div class="carousel-item">
      <img src="./img/pexels/pexels-chanwalrus-941861.jpg" class="d-block w-100">
      <div class="carousel-caption">
        <h5>Busca y encuentra delicias escondidas</h5>
</div>
    </div>
    
    <div class="carousel-item">
      <img src="./img/pexels/pexels-pixabay-260922.jpg" class="d-block w-100">
      <div class="carousel-caption">
        <h5>Deja que tu paladar aventure</h5>
      </div>
      </div>
        </div>
    
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselE1"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
        <span class="visually-hidden">Previous</span>
      </button>
    
      <button class="carousel-control-next" type="button" data-bs-target="#carouselE1"
      data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    
      </button>
</div>


<!-- LOCALES -->
<section class="services" id="Locales">

    <div class="container">
      <div class="row">
    
      <?php
$filasmax = 7;
if (isset($_GET['pag']))
   {
       $pagina = $_GET['pag'];
   } else
   {
       $pagina = 1;
   }
if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];


$sqlusu = mysqli_query($conn, "SELECT loc.id_fp, loc.name, loc.location, loc.schedule 
from food_place loc where loc.name like '".$buscar."%'");


}
else
{
$sqlusu = mysqli_query($conn, "SELECT loc.id_fp,loc.name,loc.location, loc.schedule
FROM food_place loc ORDER BY loc.id_fp ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
   $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_food_places FROM food_place");    
   $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_food_places'];
  
   ?>



<div class="ContenedorTabla">
   <form method="POST" style="padding:20px; margin-top: 30px;">
   <h1 style="color:white;">Lista de locales de comida</h1>
   </form>
   </div>
           </form>
      <?php
       while ($mostrar = mysqli_fetch_assoc($sqlusu))
       {
          
        echo "        <div class='col-12 col-md-12 col-lg-4 mb-3'>";
           echo " <div class='card text-white text-center bg-a11 pb-2 bg-black' style='height: 400px;'>";
                echo "<div class='card-body d-grid justify-content-center align-items-center'>";
                  echo "<h3 class='card-title' style='padding-top: 25%;'>".$mostrar['name']."</h3>";
                  echo "<p>" .$mostrar['location']."</p>";
                  echo "<p>".$mostrar['schedule']."</p>";
                echo "  <button class='btn text-white' style='width: 150px; margin: 0 auto; background-color: yellowgreen;'>Conócelo</button>";
          echo "  </div>";
         echo " </div>";
      echo "</div>";
       }
       ?>

    </div>
   
    </section>

    <!-- ACERCA DE NOSOTROS -->
     
<section class="banner" id="conocenos">
    <div class="container p-5">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>ACERCA DE NOSOTROS </h2>
        <br>
        <p class="fw-bold pt-2 fs-4" style="text-align: justify;"><!-- Somos un equipo de tres estudiantes pertenecientes a la  
            Universidad Tecnológica de Gutiérrez Zamora con el fin de hacer conocer al mundo la gran variedad de sabores 
            tradicionales tanto exquisitos como exóticos de nuestra hermosa ciudad. Empezamos a desarrollar este proyecto 
            debido a ciertas razones entre las cuales la más destacable es el hecho de que nuestra ciudad es tratada como 
            un sitio de paso para las personas que solo se dejan llevar por los sitios que ya conocen o los más vistosos 
           sin a explorar otros establecimientos que pueden ofrecerles una experiencia gastronómica espectacular.-->
           En CROCOMIDAT, somos un equipo apasionado de la Universidad Tecnológica de Gutiérrez Zamora dedicado a transformar la forma en que descubres la gastronomía local. Nuestra misión es poner en el mapa esos locales de comida que a menudo pasan desapercibidos y que ofrecen experiencias culinarias únicas, pero que no reciben la atención que merecen.
<br><br><br>
           Gutiérrez Zamora es conocido por ser un punto de paso para muchos, pero nosotros creemos que tiene mucho más que ofrecer. Nos proponemos mostrarte los tesoros gastronómicos escondidos en nuestra ciudad, revelando sabores auténticos y originales que a menudo se encuentran fuera del radar.
        </p>
        <div>
          <br><br>
          <img src="img/logo.png" width="80px">
        </div>
      </div>
    </div>
  </div>
</section>

        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>

        <footer class="bg-black p-4 text-center border-top border-white">
          <div class="container">
            <p class="text-white">&copy; 2024 Crocomidat. Todos los derechos reservados.</p>
          </div>
        </footer>
    </body>
</html>
