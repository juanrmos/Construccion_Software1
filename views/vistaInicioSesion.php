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
    <script>
    const controladorLoginUrl = "<?php echo get_controllers('controladorLogin.php'); ?>";
    const principalUrl = "<?php echo get_views('principal.php'); ?>";
    console.log("controladorLoginUrl:", controladorLoginUrl);
    console.log("principalUrl:", principalUrl);
    </script>
    <script src="<?php echo get_java('controladorLogin.js'); ?>" defer></script>
</head>
<body>
    <div class="contenedor-login">
        <div class="ventana-controles">
            <span class="circulo rojo"></span>
            <span class="circulo amarillo"></span>
            <span class="circulo verde"></span>
        </div>
        <h2>Login</h2>
        <form id="login-form" autocomplete>
            <div class="campo">
                <label for="usuario">Nombre de usuario</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="campo">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required autocomplete="current-password">
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <div id="output" style="color: red; margin-top: 10px;"></div>
    </div>
</body>
</html>

