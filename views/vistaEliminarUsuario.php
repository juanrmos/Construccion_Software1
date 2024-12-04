<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/views/principalBarraNavegacion.php';
function mostrarFormularioEliminar($mensaje = '') {

if (!empty($mensaje)){
    echo $mensaje;

} else {
?>

<link rel="stylesheet" href="<?php echo get_urlBase('css/gestion_usuarios.css'); ?>">
<form action="/controllers/controladorEliminarUsuario.php" method="POST">
    <label for ="datusuario"> Ubique el usuario a eliminar </label>
    <input type="text" name="datusuario" id="datusuario"> 
    <br>
    <button type="submit">Eliminar usuario</button>
</form>

<?php
}

}
?>