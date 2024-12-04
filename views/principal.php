<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/controladorPrincipal.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal - Kayay eco</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estilos_general.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_urlBase('css/principal.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_urlBase('css/gestion_usuarios.css'); ?>">
</head>
<body>

    <main class="content">
        <?php

        if(isset($contenido)) {
            echo $contenido;
        } else {
            echo "<h1>Bienvenido</h1>";
        }
        ?>

    </main>
</body>
</html>
