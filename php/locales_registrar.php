<?php
include("conexion.php");
include("locales_tabla.php");
$pagina = $_GET['pag'];
?>
<html>
    <body>
        <div class="caja_popup2">
            <form class="contenedor_popup" method="POST">
                <table>
                    <tr><th colspan="2">Agregar local</th></tr>
                    <tr>
                        <td><b>Nombre:</b></td>
                        <td><input type="text" name="txtnom" autocomplete="off" class="CajaTexto"></td>
                    </tr>
                    <tr>
                        <td><b>Ubicación:</b></td>
                        <td><input type="text" name="txtloc" autocomplete="off" class="CajaTexto" step="any"></td>
                    </tr>
                    <tr>
                        <td><b>Horario:</b></td>
                        <td><input type="text" name ="txthor" autocomplete="off" class="CajaTexto"></td>
                    </tr>
                    <tr>
                        <td><b>BG:</b></td>
                        <td><input type="text" name ="txtbg" autocomplete="off" class="CajaTexto"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php echo "<a class='BotonesTeam' href=\"locales_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
                            <input type="submit" class="BotonesTeam" name="btnregistrar" value="Registrar" onClick="javascript: 
                            return confirm('¿Deseas registrar el local?');">
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
    $procat=$_POST['txthor'];
    mysqli_query($conn,"INSERT INTO food_place (name,location,schedule)VALUES('$pronom','$propre','$procat')");
    echo "<script>window.location= 'locales_tabla.php'</script>";

}
?>

