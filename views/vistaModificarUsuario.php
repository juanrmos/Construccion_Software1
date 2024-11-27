<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/modificar_usuarios.css'); ?>">
</head>
<body>
    <h2 class="title"></h2>
    <?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';


function mostrarFormularioBusqueda($mensaje = '')
{

    if(!empty($mensaje)) {
        echo $mensaje;
        echo "<br>";
    }  

?>

    <link rel="stylesheet" href="<?php echo get_urlBase('css/gestion_usuarios.css'); ?>">
    <form action="/controllers/controladorModificarUsuario.php" method="POST">
        <label for="datusuario"> Ubique el usuario a modificar </label>
        <input type="text" name="datusuario" id="datusuario">
        <br>
        <button type="submit">Modificar Usuario</button>
    </form>

<?php
}

function mostrarFormularioModificacion($usuario, $mensaje = '')
{
?>

    <link rel="stylesheet" href="<?php echo get_urlBase('css/gestion_usuarios.css'); ?>">
    <form action="" method="POST" class="form-container">
        <input type="hidden" id="custId" name="custId" value="<?php echo $usuario['id']; ?>">
        
        <label for="datusuario"> Usuario </label>
        <input type="text" name="datusuario" id="datusuario" value="<?php echo $usuario['username']; ?>">
        <br>
        
        <label for="datpassword"> Contraseña </label>
        <input type="text" name="datpassword" id="datpassword" value="<?php echo $usuario['password']; ?>" required>
        <br>
        
        <label for="datperfil"> Perfil </label>
        <input type="text" name="datperfil" id="datperfil" value="<?php echo $usuario['perfil']; ?>" required>
        <br>
        
        <button type="submit">Modificar</button>
    </form>

<?php
}

?>
</body>
</html>





