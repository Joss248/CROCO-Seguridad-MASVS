<?php
session_start();
include('./conexion.php');
$correo =$_POST["email"];
$pass=$_POST["contraseña"];


$buscandousu= mysqli_query($conn,"SELECT * FROM users WHERE email= '".$correo."'");

$nr=mysqli_num_rows($buscandousu);
$mostrar = mysqli_fetch_array($buscandousu);

if(($nr==1) && (password_verify($pass,$mostrar['psswd'])) ){
    //VALIDAR
    if($mostrar['rol']==1){
        //administrador
        header("location:./locales_tabla.php");
    }else{
        //Usuario Normal
        header("location: ./index2.php");
    }
    }else{
    echo"<script> alert('Usuario no existe');window.location= '../index.php'</script>";

}

?>
