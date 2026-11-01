<?php
include('conexion.php');
include("bara_lateral.php");
$pagina = $_GET['pag'];
$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM comments WHERE id_comment='$id'");
header("Location:comentarios_tabla.php?pag=$pagina");

?>