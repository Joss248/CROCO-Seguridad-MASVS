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


$sqlusu = mysqli_query($conn, "SELECT u.name, u.email, u.psswd, u.rol 
from users u where u.name like '".$buscar."%'");


}
else
{
$sqlusu = mysqli_query($conn, "SELECT u.name, u.email, u.psswd, u.rol 
from users u ORDER BY u.name ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
   $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_users FROM users");    
   $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_users'];
  
   ?>



<div class="ContenedorTabla">
   <form method="POST" style="padding:20px; margin-top: 30px;">
   <h1 style="color: white;">Lista de usuarios</h1>
  
   <div class="ContBuscar">
   <div style="float: left;">
   <a href="usuarios_tabla.php" class="BotonesTeam" style="background-color: yellowgreen; font-weight:bold;">Inicio</a>
   <input class="BotonesTeam" style="background-color: yellowgreen; font-weight:bold;"type="submit" value="Buscar" name="btnbuscar">
   <input class="CajaTextoBuscar" type="text" name="txtbuscar"  placeholder="Ingresar el correo" autocomplete="off" >
   </div>
   <div style="float:right;">
   <?php echo "<a class='BotonesTeam5' href=\"usuarios_registrar1.php?pag=$pagina\">Agregar usuario</a>";?>
   </div>
   </div>
           </form>
   <table>
           <tr>
           <th>Nombre</th>
           <th>Email</th>
           <th>password</th>
           <th>rol</th>
           <th>Acciones</th>
           </tr>
       <?php
       while ($mostrar = mysqli_fetch_assoc($sqlusu))
       {
          
           echo "<tr style='background:#101010; color:white;'>";
           echo "<td>".$mostrar['name']."</td>";
           echo "<td>".$mostrar['email']."</td>";
           echo "<td>".$mostrar['psswd']."</td>";
           echo "<td>".$mostrar['rol']."</td>";
           echo "<td style='width:24%'>
           <a class='BotonesTeam1' href=\"usuarios_ver.php?id=$mostrar[email]&pag=$pagina\">&#x1F50D;</a>
           <a class='BotonesTeam2' href=\"usuarios_modificar.php?id=$mostrar[email]&pag=$pagina\">&#128397;</a>
           <a class='BotonesTeam3' href=\"usuarios_eliminar.php?id=$mostrar[email]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar el usuario $mostrar[name]?')\">&#10006;</a>
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
<a class="BotonesTeam4" href="usuarios_tabla.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
<a class="BotonesTeam4" href="usuarios_tabla.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
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
<a class="BotonesTeam4" href="usuarios_tabla.php?pag=2">Siguiente</a>
<?php
}
?>
</div>
</div>
</body>
</html>
