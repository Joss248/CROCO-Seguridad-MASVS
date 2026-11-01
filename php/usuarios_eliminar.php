<?php
include('conexion.php');
include("bara_lateral.php");
$pagina = $_GET['pag'];
$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM users WHERE email ='$id'");
header("Location:usuarios_tabla.php?pag=$pagina");

?>