<?php
session_start();
include('conexion.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="icon" href="../img/1/logo1.png" type="image/x-icon">
</head>
<body style="background-color: black;">


    <div class="BarraLateral" style="background-color: #050505; padding-top:100px;">
        <img src="../img/logo.png" height="25%">
        <p style="color:white; font-weight:800;"><span style="color: yellowgreen;">Croco</span>midat</p>
        <ul>
            <li style="text-align: center; font-weight:800; font-size: 10px;"><a href="locales_tabla.php">Locales </a></li>
            <li style="text-align: center; font-weight:800; font-size: 10px;"><a href="comentarios_tabla.php">Comentarios</a></li>
            <li style="text-align: center; font-weight:800; font-size: 10px;"><a href="usuarios_tabla.php">Usuarios</a></li>
            <li style="text-align: center; font-weight:800; font-size: 10px;"><a href="cerrar_sesion.php">Cerrar sesión</a></li>
        </ul>
    <hr>
</div>
</body>
</html>