<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';
verificar_sesion();

require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tmpdatusuario  = $_POST["datusuario"];
    $tmpdatpassword  = $_POST["datpassword"];
    $tmpdatperfil  = $_POST["datperfil"];
    $conexion = new  conexion(DB_HOST,DB_NAME,DB_USER,DB_PASS);
    $pdo = $conexion->obtenerConexion();

    try {
        $sentencia =$pdo ->prepare ("INSERT INTO usuarios (username, password, perfil) values (?,?,?)");
        $sentencia -> execute ([$tmpdatusuario, $tmpdatpassword, $tmpdatperfil]);
        echo "Usuario registrado con exito <br>";
    } catch (PDOexception $e){
        echo "hubo un error <br>";
        echo $e -> getMessage();
    }
    exit ();
}

?>
<link rel="stylesheet" href="<?php echo get_urlBase('css/gestion_usuarios.css'); ?>">
<form action="" method="POST">
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