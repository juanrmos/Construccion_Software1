<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaModificarUsuario.php';
verificar_sesion();
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';

$modeloUsuario = new modeloUsuario();
$mensaje = '';

// Manejar búsqueda de usuario
if (!isset($_POST['custId'])){
if (isset($_POST['datusuario']) || isset($_GET['username'])) {
    $username = $_POST['datusuario'] ?? $_GET['username'];
    $usuario = $modeloUsuario->obtenerUsuarioPorNombre($username);

    if ($usuario) {
        mostrarFormularioModificacion($usuario, $mensaje);
    } else {
        $mensaje = "<p style='color: red;'>Usuario no encontrado.</p>";
        mostrarFormularioBusqueda($mensaje);
    }
}
}

// Manejar actualización de usuario
if (isset($_POST['custId'])) {
    $tmpcustID = $_POST['custId'];
    $tmpdatusuario = $_POST['datusuario'];
    $tmpdatpassword = $_POST['datpassword'];
    $tmpdatperfil = $_POST['datperfil'];

    $resultado = $modeloUsuario->modificarUsuario($tmpcustID, $tmpdatusuario, $tmpdatpassword, $tmpdatperfil);

    if ($resultado) {
        $mensaje = "<p style='color: green;'>Usuario actualizado con éxito.</p>";
    } else {
        $mensaje = "<p style='color: red;'>Usuario no actualizado.</p>";
    }
    mostrarFormularioBusqueda($mensaje);
}


// Mostrar formulario de búsqueda por defecto si no hay POST
if (($_SERVER['REQUEST_METHOD'] !== 'POST') && !isset($_POST['datusuario']) && !isset($_GET['username'])) {
    mostrarFormularioBusqueda($mensaje);
}

?>


