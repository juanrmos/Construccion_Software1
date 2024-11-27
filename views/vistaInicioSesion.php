<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estilos.css'); ?>">
</head>
<body>
    <div class="contenedor-login">
        <div class="ventana-controles">
            <span class="circulo rojo"></span>
            <span class="circulo amarillo"></span>
            <span class="circulo verde"></span>
        </div>
        <h2>Login</h2>
        <form action="<?php echo get_controllers('procesar_login.php'); ?>" method="POST" autocomplete="off">
            <div class="campo">
                <label for="usuario">Nombre de usuario</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="campo">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>

<!-- Usuario: admin
    .Contraseña: 12345 -->
