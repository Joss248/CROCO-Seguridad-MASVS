<?php
include("conexion.php");
include("usuarios_tabla.php");


$pagina = $_GET['pag'];
$id = $_GET['id'];


$querybuscar = mysqli_query($conn, "SELECT * FROM users WHERE email = '$id'");
while($mostrar = mysqli_fetch_array($querybuscar))
{  
   $proid     = $mostrar['email'];
   $pronom      = $mostrar['name'];
   $propre     = $mostrar['psswd'];
   $procat     = $mostrar['rol'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Modificar usuario</th></tr>   
<tr>
<td><b>Email: </b></td>
<td><input class="CajaTexto" type="text" name="txtid" value="<?php echo $proid;?>" readonly></td>
</tr>
<tr>
<td><b>Nombre: </b></td>
<td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $pronom;?>" required></td>
</tr>
<tr>
<td><b>password: </b></td>
<td><input class="CajaTexto" type="password"  name="txtpre" value="<?php echo $propre;?>" required ></td>
</tr>
<tr>
<td><b>Rol: </b></td>
<td><input class="CajaTexto" type="text" name="txtcat" value="<?php echo $procat;?>" required></td>
</tr>
<tr>
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"usuarios_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este usuario');">
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
    
$querymodificar = mysqli_query($conn, "UPDATE users SET name='$pronom1',psswd='$propre1',rol='$procat1' WHERE email = '$proid1'");
echo "<script>window.location= 'usuarios_tabla.php?pag=$pagina' </script>";
  
}
?>
