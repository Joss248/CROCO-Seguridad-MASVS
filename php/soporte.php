<?php
include('conexion.php');
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Crocomidat</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="../estilos/style.css">
        <link rel="stylesheet" href="../php/estilo.css">
        <link rel="icon" href="./img/logo.png" type="image/x-icon">
    </head>

    <body class="bg-black">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-black fixed-top">

                <div class="container">
                  <a href="#" class="navbar-brand fw-bold fs-4 text-light"><span class="fw-bold fs-4" style="color: yellowgreen;">Croco</span>midat</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbar-start" aria-controls="navbar-start" aria-expanded="false"
                  aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
                  <div class="collapse navbar-collapse" id="navbar-start">
                
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a href="./index2.php" class="nav-link text-light">Inicio</a>
                </li>
            
                  <a href="#" class="nav-link text-light">Soporte</a>
                  </li>
                  
                <li class="nav-item">
                <a href="./php/perfil" class="nav-link text-light">Perfil</a>
                </li>
                            
                </ul>

                  </div>
                </div>
                </nav>
        </header>

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


$sqlusu = mysqli_query($conn, "SELECT c.id_comment, c.creationdatecm, loc.textcomment 
from comments c where c.id_comment like '".$buscar."%'");


}
else
{
$sqlusu = mysqli_query($conn, "SELECT c.id_comment, c.creationdatecm, c.textcomment 
from comments c ORDER BY c.id_comment ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
   $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_comments FROM comments");    
   $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_comments'];
  
   ?>



<div class="ContenedorTabla">
   <form method="POST" style="padding:20px; margin-top: 30px;">
   <h1 style="color:white;">Lista de comentarios</h1>
   <div style="float:right;">
   <?php echo "<a class='BotonesTeam5' href=\"comentarios_registrar.php?pag=$pagina\">Agregar comentario</a>";?>
   </div>
   </div>
           </form>
   <table>
           <tr>
           <th>Id</th>
           <th>Fecha</th>
           <th>Comentario</th>
           <th>Acciones</th>
           </tr>
       <?php
       while ($mostrar = mysqli_fetch_assoc($sqlusu))
       {
          
           echo "<tr style='background:#101010; color:white;'>";
           echo "<td>".$mostrar['id_comment']."</td>";
           echo "<td>".$mostrar['creationdatecm']."</td>";
           echo "<td>".$mostrar['textcomment']."</td>";
           echo "<td style='width:24%'>
           <a class='BotonesTeam1' href=\"comentarios_ver.php?id=$mostrar[id_comment]&pag=$pagina\">&#x1F50D;</a>
           <a class='BotonesTeam2' href=\"comentarios_modificar.php?id=$mostrar[id_comment]&pag=$pagina\">&#128397;</a>
           <a class='BotonesTeam3' href=\"comentarios_eliminar.php?id=$mostrar[id_comment]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar el comentario $mostrar[id_comment]?')\">&#10006;</a>
           </td>"; 
          
       }
       ?>
   </table>
   

   


   <div style='text-align:right'>
   <br>
   <?php echo "Total de comentarios: ".$maxusutabla;?>
   </div>
   </div>
<div style='text-align:right'>
<br>
</div>
<div style="text-align:center; font-weight:bold;">
<?php
if (isset($_GET['pag'])) {
if ($_GET['pag'] > 1) {
?>
<a class="BotonesTeam4" href="comentarios_tabla.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
<a class="BotonesTeam4" href="locales_tabla.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
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
<a class="BotonesTeam4" href="locales_tabla.php?pag=2">Siguiente</a>
<?php
}
?>
    </body>
</html>