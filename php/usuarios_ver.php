<?php
include("conexion.php");
include("usuarios_tabla.php");
$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT u.name, u.email, u.psswd, u.rol 
from users u WHERE u.email = '$id'");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $proid = $mostrar['name'];
    $pronom = $mostrar['email'];
    $propre = $mostrar['psswd'];
    $procat = $mostrar['rol'];
}
?>


<html>
<body>
    <div class="caja_popup2">
        <form class="contenedor_popup" method="POSt">
            <table>
                <tr><th colspan="2">Ver producto</th></tr>
                <tr>
                    <td><b>Nombre:</b></td>
                    <td><?php echo $proid;?></td>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <td><?php echo $pronom;?></td>
                </tr>
                <tr>
                    <td><b>password:</b></td>
                    <td><?php echo $propre;?></td>
                </tr>
                <tr>
                    <td><b>Rol:</b></td>
                    <td><?php echo $procat;?></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <?php echo "<a class='BotonesTeam' href=\"usuarios_tabla.php?pag=$pagina\">Regresar</a>";?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>