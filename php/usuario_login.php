
<?php
session_start();
require_once __DIR__ . '/conexion.php';

// Solo permitir solicitudes POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

// Obtener los datos del formulario
$correo = trim($_POST['email'] ?? '');
$pass = $_POST['contraseña'] ?? '';

// Validar campos
if ($correo === '' || $pass === '') {
    header('Location: ../index.php');
    exit;
}

// Buscar al usuario mediante una consulta preparada
$stmt = mysqli_prepare(
    $conn,
    "SELECT * FROM users WHERE email = ? LIMIT 1"
);

mysqli_stmt_bind_param($stmt, "s", $correo);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$usuario = mysqli_fetch_assoc($resultado);

mysqli_stmt_close($stmt);

// Verificar las credenciales
if ($usuario && password_verify($pass, $usuario['psswd'])) {

    // Renovar el identificador de sesión
    session_regenerate_id(true);

    // Guardar la identidad y el rol del usuario
    $_SESSION['usuario_email'] = $usuario['email'];
    $_SESSION['usuario_rol'] = (int) ($usuario['rol'] ?? 0);
    $_SESSION['autenticado'] = true;

    // Redirigir según el rol
    if ($_SESSION['usuario_rol'] === 1) {
        header('Location: ./locales_tabla.php');
    } else {
        header('Location: ./index2.php');
    }

    exit;
}

// Credenciales incorrectas
header('Location: ../index.php');
exit;
?>
