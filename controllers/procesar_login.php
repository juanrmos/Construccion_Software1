<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('Location: '.get_views('vistaInicioSesion.php'));
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if ($usuario === "admin" && $contrasena === "12345") {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['contrasena'] = $contrasena;
        header('Location:' .get_views('pagina_carga.php').'?status=success');
    } else {
        $_SESSION['usuario'] = $usuario;
        header('Location:' .get_views('pagina_carga.php').'?status=error');
        
    }
    exit();
}
?>


