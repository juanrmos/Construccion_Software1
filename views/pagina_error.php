
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
session_start();

if (!isset($_SESSION["usuario"])) {
    header('Location: '.get_urlBase('index.php'));
    exit();
}

cerrar_sesion();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Error</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/pagina_error.css'); ?>">
</head>
<body>
    <div class="contenedor-error">
        <h1>Al parecer algo salió mal...</h1>
        <a href="pagina_error.php?logout=true">Volver a inicio</a>
    </div>
</body>
</html>