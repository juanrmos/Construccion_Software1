<?php
// procesar_login.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if ($usuario === "usuario" && $contrasena === "contrasena123") {
        echo "Bienvenido, $usuario!";
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
