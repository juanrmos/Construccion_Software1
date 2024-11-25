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
    $conexion = new  conexion(DB_HOST,DB_NAME,DB_USER,DB_PASS);
    $pdo = $conexion->obtenerConexion();
    try {
        $stmt = $pdo->prepare("Delete FROM usuarios WHERE username = ?");
        $stmt->execute([$tmpdatusuario]);
        echo "<p class='success-message'>Usuario eliminado correctamente.</p>";
    } catch (PDOexception $e){
        echo "hubo un error <br>";
        echo $e -> getMessage();
    }
}

?>

<link rel="stylesheet" href="<?php echo get_urlBase('css/gestion_usuarios.css'); ?>">
<form action="" method="POST">
    <label for ="datusuario"> Ubique el usuario a eliminar </label>
    <input type="text" name="datusuario" id="datusuario"> 
    <br>
    <button type="submit">Eliminar usuario</button>
</form>

