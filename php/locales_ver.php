<?php
include("conexion.php");
include("locales_tabla.php");
$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT loc.id_fp, loc.name, loc.location, loc.schedule, loc.bg
from food_place loc WHERE loc.id_fp = '$id'");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $proid = $mostrar['id_fp'];
    $pronom = $mostrar['name'];
    $propre = $mostrar['location'];
    $procat = $mostrar['schedule'];
    $probg = $mostrar['bg'];
}
?>


<html>
<body>
    <div class="caja_popup2">
        <form class="contenedor_popup" method="POSt">
            <table>
                <tr><th colspan="2">Ver producto</th></tr>
                <tr>
                    <td><b>Id:</b></td>
                    <td><?php echo $proid;?></td>
                </tr>
                <tr>
                    <td><b>Nombre:</b></td>
                    <td><?php echo $pronom;?></td>
                </tr>
                <tr>
                    <td><b>Ubicación:</b></td>
                    <td><?php echo $propre;?></td>
                </tr>
                <tr>
                    <td><b>Horario:</b></td>
                    <td><?php echo $procat;?></td>
                </tr>
                <tr>
                    <td><b>BG:</b></td>
                    <td><?php echo $probg;?></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <?php echo "<a class='BotonesTeam' href=\"locales_tabla.php?pag=$pagina\">Regresar</a>";?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>