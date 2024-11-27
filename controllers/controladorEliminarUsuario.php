<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaEliminarUsuario.php';
verificar_sesion();
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario  = $_POST["datusuario"];
    $mensaje = '';
    if($tmpdatusuario) {
        $modeloUsuario = new modelousuario();
        try {
            $modeloUsuario -> eliminarUsuario($tmpdatusuario);
            echo "usuario eliminado con exito";
        } catch (PDOexception $e){
            $mensaje = "hubo un error <br>".$e->getMessage();
            
        }
    }

} else {
    mostrarFormularioEliminar();
}

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['username'])) {
    $tmpdatusuario = $_GET['username'];
    $modeloUsuario = new modelousuario();

    try {
        $modeloUsuario->eliminarUsuario($tmpdatusuario);
        echo "<div class='success-message'>Usuario eliminado con éxito.</div>";
        echo "<a href='/views/vistaUsuario.php'>Volver a la lista de usuarios</a>";
    } catch (PDOException $e) {
        $mensaje = "hubo un error <br>".$e->getMessage();;
    }
}