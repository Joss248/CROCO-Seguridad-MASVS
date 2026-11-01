<?php
include("conexion.php");
include("locales_tabla.php");


$pagina = $_GET['pag'];
$id = $_GET['id'];


$querybuscar = mysqli_query($conn, "SELECT * FROM food_place WHERE id_fp = '$id'");
while($mostrar = mysqli_fetch_array($querybuscar))
{  
   $proid      = $mostrar['id_fp'];
   $pronom     = $mostrar['name'];
   $propre     = $mostrar['location'];
   $procat     = $mostrar['schedule'];
   $probg     = $mostrar['bg'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Modificar local</th></tr>   
<tr>
<td><b>Id: </b></td>
<td><input class="CajaTexto" type="number" name="txtid" value="<?php echo $proid;?>" readonly></td>
</tr>
<tr>
<td><b>Nombre: </b></td>
<td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $pronom;?>" required></td>
</tr>
<tr>
<td><b>Locacion: </b></td>
<td><input class="CajaTexto" type="text" name="txtpre" value="<?php echo $propre;?>" required ></td>
</tr>
<tr>
<td><b>Horario:</b></td>
<td><input class="CajaTexto" type="text" name="txtcat" value="<?php echo $procat;?>" required ></td>
</tr>
<tr>
<td><b>BG:</b></td>
<td><input class="CajaTexto" type="text" name="txtbg" value="<?php echo $probg;?>" required ></td>
</tr>
<tr>
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"locales_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este local');">
</td>
</tr>
</table>
</form>
</div>
</body>
</html>


<?php
  
if(isset($_POST['btnregistrar']))
{   
   $proid1     = $_POST['txtid'];
   $pronom1    = $_POST['txtnom'];
   $propre1    = $_POST['txtpre'];
   $procat1    = $_POST['txtcat'];
    
$querymodificar = mysqli_query($conn, "UPDATE food_place SET name='$pronom1', location='$propre1', schedule='$procat1' WHERE id_fp = '$proid1'");
echo "<script>window.location= 'locales_tabla.php?pag=$pagina' </script>";
  
}
?>
