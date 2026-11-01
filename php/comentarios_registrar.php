<?php
include("conexion.php");
include("comentarios_tabla.php");
$pagina = $_GET['pag'];
?>
<html>
    <body>
        <div class="caja_popup2">
            <form class="contenedor_popup" method="POST">
                <table>
                    <tr><th colspan="2">Agregar comentario</th></tr>
                    <tr>
                        <td><b>Fecha:</b></td>
                        <td><input type="date" name="txtnom" autocomplete="off" class="CajaTexto"></td>
                    </tr>
                    <tr>
                        <td><b>Comentario:</b></td>
                        <td><input type="text" name="txtloc" autocomplete="off" class="CajaTexto"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php echo "<a class='BotonesTeam' href=\"comentarios_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
                            <input type="submit" class="BotonesTeam" name="btnregistrar" value="Registrar" onClick="javascript: 
                            return confirm('¿Deseas registrar el comentario?');">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

<?php
if(isset($_POST['btnregistrar'])){
    $pronom=$_POST['txtnom'];
    $propre=$_POST['txtloc'];
    mysqli_query($conn,"INSERT INTO comments (creationdatecm, textcomment)VALUES('$pronom','$propre')");
    echo "<script>window.location= 'comentarios_tabla.php'</script>";

}
?>

