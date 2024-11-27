<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';

if (isset($_SESSION["contrasena"])) {
    
    header('Location: '.get_views('principal.php'));
} else {
    
    header('Location: '.get_views('vistaInicioSesion.php'));
    
}
exit();
?>

