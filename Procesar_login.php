<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if ($usuario === "usuario" && $contrasena === "contrasena123") {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['contrasena'] = $contrasena;
        header('location: Pagina_carga.php?status=success');
    } else {
        header('location: Pagina_carga.php?status=error');
        $_SESSION['usuario'] = $usuario;
    }
    exit();
}
?>


