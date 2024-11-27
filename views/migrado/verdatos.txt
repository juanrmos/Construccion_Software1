<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';

verificar_sesion();

$conexion = new conexion(DB_HOST, DB_NAME, DB_USER, DB_PASS);
$pdo = $conexion->obtenerConexion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Datos</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/verdatos.css'); ?>">
</head>
<body>
    <div class="table-container">
        <h2 class="table-title">Listado de Usuarios</h2>
        <?php
        if ($pdo) {
            $query = $pdo->query("SELECT id, username, password, perfil FROM usuarios");
            if ($query) {
                echo '<table class="custom-table">';
                echo '<thead><tr><th>ID</th><th>Usuario</th><th>Contraseña</th><th>Perfil</th></tr></thead>';
                echo '<tbody>';
                foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['perfil']) . "</td>";
                    echo "</tr>";
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<p class='error-message'>Error en la consulta SQL.</p>";
            }
        } else {
            echo "<p class='error-message'>Error al conectar con la base de datos.</p>";
        }
        ?>
    </div>
</body>
</html>
