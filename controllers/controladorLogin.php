<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('Location: '.get_views('vistaInicioSesion.php'));
    exit();
}

// Validar el usuario y la contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    file_put_contents('log.txt', json_encode($_POST), FILE_APPEND);
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Llamar al modelo para obtener el usuario
    $modelo = new modelousuario();
    $usuarioEncontrado = $modelo->obtenerUsuarioPorNombre($usuario);
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/test/logfunction.txt', "Usuario encontrado: " . json_encode($usuarioEncontrado) . "\n", FILE_APPEND);

    //?Momentario
    if ($usuarioEncontrado && $usuarioEncontrado['password'] === $contrasena) {
        $_SESSION['usuario'] = $usuario;
        $respuesta = ['status' => 'success'];
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/test/log.txt', "Respuesta exitosa: " . json_encode($respuesta) . "\n", FILE_APPEND);
        echo json_encode($respuesta);
    } else {
        $respuesta = ['status' => 'error', 'message' => 'Usuario o contraseña incorrectos.'];
        file_put_contents('log.txt', "Respuesta de error: " . json_encode($respuesta) . "\n", FILE_APPEND);
        echo json_encode($respuesta);
    }

    exit();
}
?>

