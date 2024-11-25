<?php 

define('URL_BASE' ,"http://ExamenMC.test/"); 
define('DB_HOST' ,"127.0.0.1"); 
define('DB_NAME' ,"dbexamenmc"); 
define('DB_USER' ,"root"); 
define('DB_PASS' ,""); 


function get_path($type,$arg1) {
    $basePaths = ['base'=>URL_BASE,
    'views'=>URL_BASE.'views/',
    'models'=>URL_BASE.'models/',
    'controllers'=>URL_BASE.'controllers/'];
    return $basePaths[$type].$arg1;
}


// Función para obtener URL base con el archivo especificado
function get_urlBase($arg1) {
    return get_path('base',$arg1);
}

// Funciones para obtener rutas de vistas, modelos y controladores
function get_views($arg1) {
    return get_path('views',$arg1);
}

function get_models($arg1) {
    return get_path('models',$arg1);
}

function get_controllers($arg1) {
    return get_path('controllers',$arg1);
}



?>
