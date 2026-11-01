<?php
include('conexion.php');
include("barra_lateral.php");
?>
<html>
    
<title>Locales Tabla</title>
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


$sqlusu = mysqli_query($conn, "SELECT loc.id_fp, loc.name, loc.location, loc.schedule, loc.bg
from food_place loc where loc.name like '".$buscar."%'");


}
else
{
$sqlusu = mysqli_query($conn, "SELECT loc.id_fp,loc.name,loc.location, loc.schedule, loc.bg
FROM food_place loc ORDER BY loc.id_fp ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
   $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_food_places FROM food_place");    
   $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_food_places'];
  
   ?>



<div class="ContenedorTabla">
   <form method="POST" style="padding:20px; margin-top: 30px;">
   <h1 style="color:white;">Lista de locales de comida</h1>
   </form>
   <div class="ContBuscar">
   <div style="float: left;">
   <a href="productos_tabla.php" class="BotonesTeam" style="background-color: yellowgreen; font-weight:bold;">Inicio</a>
   <input class="BotonesTeam" style="background-color: yellowgreen; font-weight:bold;" type="submit" value="Buscar" name="btnbuscar">
   <input class="CajaTextoBuscar" type="text" name="txtbuscar"  placeholder="Ingresar el nombre del local" autocomplete="off" >
   </div>
   <div style="float:right;">
   <?php echo "<a class='BotonesTeam5' href=\"locales_registrar.php?pag=$pagina\">Agregar local</a>";?>
   </div>
   </div>
           </form>
   <table>
           <tr>
           <th>Id</th>
           <th>Nombre</th>
           <th>Locación</th>
           <th>Horario</th>
           <th>BG</th>
           <th>Acciones</th>
           </tr>
       <?php
       while ($mostrar = mysqli_fetch_assoc($sqlusu))
       {
          
           echo "<tr style='background:#101010; color:white;'>";
           echo "<td>".$mostrar['id_fp']."</td>";
           echo "<td>".$mostrar['name']."</td>";
           echo "<td>".$mostrar['location']."</td>";
           echo "<td>".$mostrar['schedule']."</td>";
           echo "<td>".$mostrar['bg']."</td>";
           echo "<td style='width:24%'>
           <a class='BotonesTeam1' href=\"locales_ver.php?id=$mostrar[id_fp]&pag=$pagina\">&#x1F50D;</a>
           <a class='BotonesTeam2' href=\"locales_modificar.php?id=$mostrar[id_fp]&pag=$pagina\">&#128397;</a>
           <a class='BotonesTeam3' href=\"locales_eliminar.php?id=$mostrar[id_fp]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar el local $mostrar[name]?')\">&#10006;</a>
           </td>"; 
          
       }
       ?>
   </table>
   

   


   <div style='text-align:right'>
   <br>
   <?php echo "Total de locales: ".$maxusutabla;?>
   </div>
   </div>
<div style='text-align:right'>
<br>
</div>
<div style="text-align:center">
<?php
if (isset($_GET['pag'])) {
if ($_GET['pag'] > 1) {
?>
<a class="BotonesTeam4" href="locales_tabla.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
