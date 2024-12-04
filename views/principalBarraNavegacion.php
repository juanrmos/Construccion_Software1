<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';
verificar_sesion();
?>
<link rel="stylesheet" href="<?php echo get_urlBase('css/estilos_general.css'); ?>">
<link rel="stylesheet" href="<?php echo get_urlBase('css/principal.css'); ?>">
<nav class="navbar">
    <div class="navbar-brand">
        <!-- Usa get_urlBase para generar el enlace al inicio -->
        <a href="<?php echo get_views('principal.php'); ?>">Kayay Eco</a>
    </div>
    <div class="navbar-links">
        <!-- Enlaces que usan parámetros de consulta para mantener consistencia -->
        <a href="<?php echo get_views('principal.php') . '?opcion=inicio'; ?>">Inicio</a>
        <a href="<?php echo get_views('principal.php') . '?opcion=usuarios'; ?>">Gestión de Usuarios</a>
        <a href="<?php echo get_views('principal.php') . '?logout=true'; ?>">Cerrar Sesión</a>
    </div>
</nav>
