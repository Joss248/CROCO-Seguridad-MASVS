<?php
include('conexion.php');
include("bara_lateral.php");
$pagina = $_GET['pag'];
$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM food_place WHERE id_fp='$id'");
header("Location:locales_tabla.php?pag=$pagina");

?>