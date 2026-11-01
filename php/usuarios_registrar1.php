<?php
include("conexion.php");
include("usuarios_tabla.php");
$pagina = $_GET['pag'];
?>
<html>
    <body>
        <div class="caja_popup2">
            <form class="contenedor_popup" method="POST">
                <table>
                    <tr><th colspan="2">Agregar usuario</th></tr>
                    <tr>
                        <td><b>Nombre:</b></td>
                        <td><input type="text" name="txtnom" autocomplete="off" class="CajaTexto"></td>
                    </tr>
                    <tr>
                        <td><b>Email:</b></td>
                        <td><input type="email" name="txtpre" autocomplete="off" class="CajaTexto"></td>
                    </tr>
                    <tr>
                        <td><b>password:</b></td>
                        <td><input type="password" name="txtcat" autocomplete="off" class="CajaTexto"></td>
                    </tr>
                    <tr>
                        <td><b>Rol:</b></td>
                        <td><input type="text" name="txtrol" autocomplete="off" class="CajaTexto"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php echo "<a class='BotonesTeam' href=\"usuarios_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
                            <input type="submit" class="BotonesTeam" name="btnregistrar" value="Registrar" onClick="javascript: 
                            return confirm('¿Deseas registrar el usuario?');">
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
    $propre=$_POST['txtpre'];
    $procat=$_POST['txtcat'];
    $prorol=$_POST['txtrol'];
    mysqli_query($conn,"INSERT INTO users(name,email,psswd,rol)VALUES('$pronom','$propre','$procat','$prorol')");
    echo "<script>window.location= 'usuarios_tabla.php'</script>";

}
?>

