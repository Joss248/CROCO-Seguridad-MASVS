
<?php
session_start();

// Verificar autenticación y permisos administrativos
if (
    empty($_SESSION['autenticado']) ||
    (int) ($_SESSION['usuario_rol'] ?? 0) !== 1
) {
    http_response_code(403);
    exit('Acceso denegado. No tienes permisos para modificar comentarios.');
}

require_once __DIR__ . '/conexion.php';

// Obtener y validar parámetros
$pagina = filter_input(INPUT_GET, 'pag', FILTER_VALIDATE_INT);
$pagina = ($pagina !== false && $pagina !== null && $pagina > 0)
    ? $pagina
    : 1;

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    http_response_code(400);
    exit('Identificador de comentario no válido.');
}

// Consultar comentario
$stmt = mysqli_prepare(
    $conn,
    "SELECT id_comment, creationdatecm, textcomment
     FROM comments
     WHERE id_comment = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$comentario = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($stmt);

if (!$comentario) {
    http_response_code(404);
    exit('Comentario no encontrado.');
}

// Generar token CSRF
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Procesar modificación
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $token = $_POST['csrf_token'] ?? '';

    if (
        !is_string($token) ||
        !hash_equals($_SESSION['csrf_token'], $token)
    ) {
        http_response_code(403);
        exit('Solicitud no autorizada.');
    }

    $fecha = trim($_POST['txtnom'] ?? '');
    $texto = trim($_POST['txtpre'] ?? '');

    $fechaValida = DateTimeImmutable::createFromFormat('!Y-m-d', $fecha);

    if (
        !$fechaValida ||
        $fechaValida->format('Y-m-d') !== $fecha ||
        $texto === ''
    ) {
        http_response_code(400);
        exit('Los datos del comentario no son válidos.');
    }

    // Actualizar únicamente el comentario consultado
    $stmt = mysqli_prepare(
        $conn,
        "UPDATE comments
         SET creationdatecm = ?, textcomment = ?
         WHERE id_comment = ?"
    );

    mysqli_stmt_bind_param($stmt, "ssi", $fecha, $texto, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: comentarios_tabla.php?pag=$pagina");
    exit;
}

function escapar($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar comentario</title>
</head>
<body>

<div class="caja_popup2">
    <form class="contenedor_popup" method="POST">

        <table>
            <tr>
                <th colspan="2">Modificar comentario</th>
            </tr>

            <tr>
                <td><b>Id:</b></td>
                <td>
                    <input class="CajaTexto" type="number"
                           value="<?= escapar($comentario['id_comment']) ?>"
                           readonly>
                </td>
            </tr>

            <tr>
                <td><b>Fecha:</b></td>
                <td>
                    <input class="CajaTexto" type="date"
                           name="txtnom"
                           value="<?= escapar($comentario['creationdatecm']) ?>"
                           required>
                </td>
            </tr>

            <tr>
                <td><b>Comentario:</b></td>
                <td>
                    <input class="CajaTexto" type="text"
                           name="txtpre"
                           value="<?= escapar($comentario['textcomment']) ?>"
                           required>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="csrf_token"
                           value="<?= escapar($_SESSION['csrf_token']) ?>">

                    <a class="BotonesTeam"
                       href="comentarios_tabla.php?pag=<?= $pagina ?>">
                        Cancelar
                    </a>

                    <input class="BotonesTeam"
                           type="submit"
                           name="btnregistrar"
                           value="Modificar"
                           onclick="return confirm('¿Deseas modificar este comentario?');">
                </td>
            </tr>
        </table>

    </form>
</div>

</body>
</html>
