<?php
include('conexion.php');
include("barra_lateral.php");
?>
<html>
    
<title>Comentarios Tabla</title>
<link rel="icon" href="../img/logo.png" type="image/x-icon">
<body>
<div class="ContenedorPrincipal">  
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


$sqlusu = mysqli_query($conn, "SELECT c.id_comment, c.creationdatecm, loc.textcomment 
from comments c where c.id_comment like '".$buscar."%'");


}
else
{
$sqlusu = mysqli_query($conn, "SELECT c.id_comment, c.creationdatecm, c.textcomment 
from comments c ORDER BY c.id_comment ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
   $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_comments FROM comments");    
   $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_comments'];
  
   ?>



<div class="ContenedorTabla">
   <form method="POST" style="padding:20px; margin-top: 30px;">
   <h1 style="color:white;">Lista de comentarios</h1>
  
   <div class="ContBuscar">
   <div style="float: left;">
   <a href="comentarios_tabla.php" class="BotonesTeam" style="background-color: yellowgreen; font-weight:bold;">Inicio</a>
   <input class="BotonesTeam" style="background-color: yellowgreen; font-weight:bold;" type="submit" value="Buscar" name="btnbuscar">
   <input class="CajaTextoBuscar" type="text" name="txtbuscar"  placeholder="Ingresar el id del comentario" autocomplete="off" >
   </div>
   <div style="float:right;">
   <?php echo "<a class='BotonesTeam5' href=\"comentarios_registrar.php?pag=$pagina\">Agregar comentario</a>";?>
   </div>
   </div>
           </form>
   <table>
           <tr>
           <th>Id</th>
           <th>Fecha</th>
           <th>Comentario</th>
           <th>Acciones</th>
           </tr>
       <?php
       while ($mostrar = mysqli_fetch_assoc($sqlusu))
       {
          
           echo "<tr style='background:#101010; color:white;'>";
           echo "<td>".$mostrar['id_comment']."</td>";
           echo "<td>".$mostrar['creationdatecm']."</td>";
           echo "<td>".$mostrar['textcomment']."</td>";
           echo "<td style='width:24%'>
           <a class='BotonesTeam1' href=\"comentarios_ver.php?id=$mostrar[id_comment]&pag=$pagina\">&#x1F50D;</a>
           <a class='BotonesTeam2' href=\"comentarios_modificar.php?id=$mostrar[id_comment]&pag=$pagina\">&#128397;</a>
           <a class='BotonesTeam3' href=\"comentarios_eliminar.php?id=$mostrar[id_comment]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar el comentario $mostrar[id_comment]?')\">&#10006;</a>
           </td>"; 
          
       }
       ?>
   </table>
   

   


   <div style='text-align:right'>
   <br>
   <?php echo "Total de comentarios: ".$maxusutabla;?>
   </div>
   </div>
<div style='text-align:right'>
<br>
</div>
<div style="text-align:center; font-weight:bold;">
<?php
if (isset($_GET['pag'])) {
if ($_GET['pag'] > 1) {
?>
<a class="BotonesTeam4" href="comentarios_tabla.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
<?php
}
else
{
?>
<a class="BotonesTeam4" href="#" style="pointer-events: none">Anterior</a>
<?php
}
?>
<?php
}
else
{
?>
<a class="BotonesTeam4" href="#" style="pointer-events: none">Anterior</a>
<?php
}
if (isset($_GET['pag'])) {
if ((($pagina) * $filasmax) < $maxusutabla) {
?>
<a class="BotonesTeam4" href="locales_tabla.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
<?php
} else {
?>
<a class="BotonesTeam4" href="#" style="pointer-events: none">Siguiente</a>
<?php
}
?>
<?php
} else {
?>
<a class="BotonesTeam4" href="locales_tabla.php?pag=2">Siguiente</a>
<?php
}
?>
</div>
</div>
</body>
</html>
