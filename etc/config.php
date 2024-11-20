<?php 
// URL base completa para referenciar desde cualquier parte del proyectoas
$_urlBase = "http://ExamenMC.test/"; // Ajusta según tu entorno


$host = '127.0.0.1';       // Dirección del host de la base de datos
$namedb = 'dbsistema';     // Nombre de la base de datos
$userdb = 'root';     // Usuario de la base de datos
$passworddb = '';   // Contraseña de la base de datos

$pdo = null;      // Inicialización de conexión PDO





// Función para obtener URL base con el archivo especificado
function get_urlBase($arg1) {
    return $GLOBALS['_urlBase'].$arg1;
}

// Funciones para obtener rutas de vistas, modelos y controladores
function get_views($arg1) {
    return $GLOBALS['_urlBase'].'views/'.$arg1;
}

function get_models($arg1) {
    return $GLOBALS['_urlBase'].'models/'.$arg1;
}

function get_controllers($arg1) {
    return $GLOBALS['_urlBase'].'controllers/'.$arg1;
}
function get_img($arg1){
    return $GLOBALS['_urlBase'].'images/'.$arg1;
}
?>
