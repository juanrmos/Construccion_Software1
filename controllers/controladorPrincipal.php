<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/principal.php';
verificar_sesion();
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';




if (isset($_GET['opcion'])) {
    switch ($_GET['opcion']) {
        case 'ver':
            echo "<iframe src='".get_controllers("controladorUsuario.php")."' frameborder='0' style='width:100%; height:600px;'></iframe>";
            break;

        case 'ingresar':
            echo "<iframe src='".get_controllers("controladorIngresarUsuario.php")."' frameborder='0' style='width:100%; height:600px;'></iframe>";
            break;

        case 'modificar':
            echo "<iframe src='".get_controllers("controladorModificarUsuario.php")."' frameborder='0' style='width:100%; height:600px;'></iframe>";
            break;

        case 'eliminar':
            echo "<iframe src='".get_controllers("controladorEliminarUsuario.php")."' frameborder='0' style='width:100%; height:600px;'></iframe>";
            break;
    }
}
?>
