<?php 

function mostrarFormularioIngreso ($mensaje) {
    if (empty($mensaje)) {

?>



<link rel="stylesheet" href="<?php echo get_urlBase('css/gestion_usuarios.css'); ?>">
<form action="/controllers/controladorIngresarUsuario.php" method="POST">
    <label for ="datusuario"> Usuario </label>
    <input type="text" name="datusuario" id="datusuario" value=""> 
    <br>
    <label for ="datpassword"> Contraseña </label>
    <input type="text" name="datpassword" id="datpassword" value="">
    <br>
    <label for ="datperfil"> Pefil </label>
    <input type="text" name="datperfil" id="datperfil" value="">
    <br>
    <button type="submit">Registrar</button>
</form>
<body>

<?php 
    }else{
        echo $mensaje;
    }
}

?>