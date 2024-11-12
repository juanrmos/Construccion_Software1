
<?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header('location: index.php');
        exit();
    }
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Error</title>
    <link rel="stylesheet" href="CSS/Pagina_error.css">
</head>
<body>
    <div class="contenedor-error">
        <h1>Al parecer algo salió mal...</h1>
        <a href="Pagina_error.php?logout=true">Volver a inicio</a>
    </div>
</body>
</html>