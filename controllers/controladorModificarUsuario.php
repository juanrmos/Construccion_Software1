<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaModificarUsuario.php';
verificar_sesion();
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';

$mensaje = '';
$modeloUsuario = new modelousuario();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['custId'])) {
        $tmpcustID = $_POST["custId"];
        $tmpdatusuario = $_POST["datusuario"];
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];
        $modeloUsuario->modificarUsuario($tmpcustID, $tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
        echo "Usuario modificado con éxito.";
    }
} elseif (isset($_GET['username'])) {
    $tmpdatusuario = $_GET["username"];
    $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);
    if ($usuario) {
        mostrarFormularioModificacion($usuario);
    } else {
        mostrarFormularioBusqueda('Usuario no encontrado');
    }
} else {
    mostrarFormularioBusqueda('');
}
?>
