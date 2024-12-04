<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/principalBarraNavegacion.php';
verificar_sesion();
cerrar_sesion();



$opcion = $_GET['opcion'] ?? 'inicio';
$contenido = '';


    switch ($opcion) {
        case 'inicio':
            $contenido = '<h1>Bienvenido</h1>';
            break;
        case 'usuarios':
            $contenido = 
            "<div class='dropdown'>
                <button class='dropdown-button'>Gestión de Usuarios</button>
            <div class='dropdown-content'>
                <a href='?opcion=ver'>Ver Datos</a>
                <a href='?opcion=ingresar'>Ingresar Datos</a>
                <a href='?opcion=modificar'>Modificar Datos</a>
                <a href='?opcion=eliminar'>Eliminar Datos</a>
            </div>
            </div>";
            break;
        case 'ver':
            ob_start();
            include get_controllers_disk("controladorUsuario.php");
            $contenido = ob_get_clean();
            break;

        case 'ingresar':
            ob_start();
            include get_controllers_disk("controladorIngresarUsuario.php");
            $contenido = ob_get_clean();
            break;

        case 'modificar':
            ob_start();
            include get_controllers_disk("controladorModificarUsuario.php");
            $contenido = ob_get_clean();
            break;

        case 'eliminar':
            ob_start();
            include get_controllers_disk("controladorEliminarUsuario.php");
            $contenido = ob_get_clean();
            break;
        default: 
            http_response_code(400);
            $contenido = "<h1> Error </h1>";
            break;
    }




?>
