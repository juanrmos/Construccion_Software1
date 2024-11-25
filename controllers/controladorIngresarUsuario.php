<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaIngresarUsuario.php';
verificar_sesion();
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tmpdatusuario  = $_POST["datusuario"];
    $tmpdatpassword  = $_POST["datpassword"];
    $tmpdatperfil  = $_POST["datperfil"];
    $modeloUsuario = new modelousuario();

    try {
        $modeloUsuario -> insertarUsuario($tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
        echo "usuario registrado con exito";
    } catch (PDOexception $e){
        $mensaje = "hubo un error <br>";
        
    }
    exit ();
}



?>