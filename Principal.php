
<?php
    session_start();
    if (!isset($_SESSION['contrasena'])) {
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
    <title>Bienvenido</title>
</head>
<body>
    <h1> Puede ir a inicio <h1>
    <a href = "Principal.php?logout=true"> Ir a inicio <a>
        
</body>
</html>

