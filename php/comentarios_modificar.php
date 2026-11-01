<?php
include("conexion.php");
include("comentarios_tabla.php");


$pagina = $_GET['pag'];
$id = $_GET['id'];


$querybuscar = mysqli_query($conn, "SELECT * FROM comments WHERE id_comment = '$id'");
while($mostrar = mysqli_fetch_array($querybuscar))
{  
   $proid      = $mostrar['id_comment'];
   $pronom     = $mostrar[' creationdatecm'];
   $propre     = $mostrar['txtcomment'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Modificar comentario</th></tr>   
<tr>
<td><b>Id: </b></td>
<td><input class="CajaTexto" type="number" name="txtid" value="<?php echo $proid;?>" readonly></td>
</tr>
<tr>
<td><b>Fecha: </b></td>
<td><input class="CajaTexto" type="date" name="txtnom" value="<?php echo $pronom;?>" required></td>
</tr>
<tr>
<td><b>Comentario: </b></td>
<td><input class="CajaTexto" type="text" name="txtpre" value="<?php echo $propre;?>" required ></td>
</tr>
<tr>
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"comentarios_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este comentario');">
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
    
$querymodificar = mysqli_query($conn, "UPDATE comments SET creationdatecm='$pronom1', textcomment='$propre1' WHERE id_comment = '$proid1'");
echo "<script>window.location= 'comentarios_tabla.php?pag=$pagina' </script>";
  
}
?>
