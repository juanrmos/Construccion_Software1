<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';

verificar_sesion();

$conexion = new conexion($host, $namedb, $userdb, $passworddb);
$pdo = $conexion->obtenerConexion();

if ($pdo) {
    $query = $pdo->query("SELECT id, username, password, perfil FROM usuarios");
    if ($query) {
        echo '<table class="custom-table">';
        echo '<tr><th>ID</th><th>Usuario</th><th>Contraseña</th><th>Perfil</th></tr>';
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['perfil'] . "</td>";
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo "Error en la consulta SQL.";
    }
} else {
    echo "Error al conectar con la base de datos.";
}
?>
<link rel="stylesheet" href="<?php echo get_urlBase('css/gestion_usuarios.css'); ?>">
