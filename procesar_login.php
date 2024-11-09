<?php
// procesar_login.php
session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if ($usuario === "usuario" && $contrasena === "contrasena123") {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['contrasena'] = $contrasena;
        header('location: http://127.0.0.1/ExamenMC/Principal.php');
        exit();

    } else {
        header('location: http://127.0.0.1/ExamenMC/clave_error.php');
        $_SESSION['usuario'] = $usuario;
        exit();
    }
    //Cargar nuevamente las variables al volver a pagina de inicio.
}


?>

