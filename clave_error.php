
<?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header('location: http://127.0.0.1/ExamenMC/index.php');
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
</head>
<body>
    <h1> Vuelva a intentarlo <h1>
    <a href = "clave_error.php?logout=true"> Ir a inicio <a>

</body>
</html>