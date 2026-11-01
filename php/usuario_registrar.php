<?php
include('./conexion.php');
$nombre=$_POST["nombre"];
$correo= $_POST["email"];
$pass=$_POST["contraseña"];

$pass_fuerte = password_hash($pass, PASSWORD_BCRYPT);
$insertarusu= mysqli_query($conn,"INSERT INTO users(name,email,psswd) VALUES ('$nombre','$correo','$pass_fuerte')");

if(!$insertarusu){
    echo"<script> alert('Correo duplicado, intenta con otro correo');window.location= 'index.php'</script>";
}else{
    echo"<script> alert('Usuario registrado con exito: $nombre');window.location= './index2.php'</script>";
}
?>