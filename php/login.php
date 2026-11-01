<?php
session_start();
include('../php/conexion.php');
if(isset($_SESSION['usuarioingresado']))
{
    header('Location: ./index.php');
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Login | REGISTRO</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="../estilos/login.css">
        <link rel="stylesheet" href="../estilos/style.css">
        <link rel="icon" href="../img/logo.png" type="image/x-icon">
    </head>

    <body class="bg-black" id="body-login">

    <!-- HEADER DE LA PÁGINA -->
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
                <a href="../index.php" class="nav-link text-light">Volver</a>
                </li>
                </ul>
            
                <div class="d-flex" role="search">
                                <a class="btn botones" style="color: #9acd32;" href="./php/login.php">
                                    <i class="bi bi-person-plus-fill"></i>
                                </a>
                            </div>
                  </div>
                </div>
                </nav>
        </header>
        
        <!-- ESTE ES EL FORMULARIO DE REGISTRO -->
<div class="main">
    <input type="checkbox" aria-hidden="true" id="chk" >
    <div class="signup">
        <form action="usuario_registrar.php" method="POST" id="formulario1" >
            <label for="chk" aria-hidden="true">Registrarse</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre de usuario" required autocomplete="off" style="color: white;">

            <input type="email" name="email" id="email" placeholder="Correo" required  autocomplete="off" style="color: white;">

            <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required  autocomplete="off" style="color: white;">
            <button type="submit" name="Registrarse">Registrarse</button>
        </form>
    </div>
        <!-- ESTE ES EL FORMULARIO DE LOGIN -->
    <div class="login">
        <form method="post" id="formulario" action="usuario_login.php">
            <label for="chk" aria-hidden="true">Login</label>
            <input type="email" name="email" id="email" placeholder="Correo" required autocomplete="off"  style="color: white;">
            <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required autocomplete="off" style="color: white;">
            <button type="submit" name="IniciarSesion" id="btnEnviar">Login</button>
        </form>
    </div>
</div>


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
    </body>
    
</html>
