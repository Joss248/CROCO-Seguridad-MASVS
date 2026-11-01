<?php
include("conexion.php");
include("comentarios_tabla.php");
$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT c.id_comment, c.creationdatecm, c.textcomment 
from comments c WHERE c.id_comment = '$id'");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $proid = $mostrar['id_comment'];
    $pronom = $mostrar['creationdatecm'];
    $propre = $mostrar['textcomment'];    
}
?>


<html>
<body>
    <div class="caja_popup2">
        <form class="contenedor_popup" method="POSt">
            <table>
                <tr><th colspan="2">Ver comentario</th></tr>
                <tr>
                    <td><b>Id:</b></td>
                    <td><?php echo $proid;?></td>
                </tr>
                <tr>
                    <td><b>Fecha:</b></td>
                    <td><?php echo $pronom;?></td>
                </tr>
                <tr>
                    <td><b>Comentario:</b></td>
                    <td><?php echo $propre;?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo "<a class='BotonesTeam' href=\"comentarios_tabla.php?pag=$pagina\">Regresar</a>";?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>