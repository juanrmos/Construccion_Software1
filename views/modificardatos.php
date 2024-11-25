<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/verificar_sesion.php';
verificar_sesion();
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['retry'])) {
?>
        <form action="" method="POST" class="form-container">
            <label for="datusuario" class="form-label"> Indique el usuario a modificar </label>
            <input type="text" name="datusuario" id="datusuario" class="form-input" required>
            <br>
            <button type="submit" class="form-button">Modificar usuario</button>
        </form>
        <?php
    } else {
        $tmpdatusuario = isset($_POST["datusuario"]) ? $_POST["datusuario"] : '';
        $conexion = new  conexion(DB_HOST,DB_NAME,DB_USER,DB_PASS);
        $pdo = $conexion->obtenerConexion();

        if (isset($_POST["custId"])) {
            try {
                $stmt = $pdo->prepare("UPDATE usuarios SET username = ?, password = ?, perfil = ? WHERE id = ?;"); //!ERROR AQUI
                $stmt->execute([$_POST["datusuario"], $_POST["datpassword"], $_POST["datperfil"], $_POST["custId"]]);
                echo "<div class='success-message'>Usuario modificado correctamente.</div>";
            } catch (PDOException $e) {
                echo "<div class='error-message'>Error al modificar" . htmlspecialchars($e->getMessage()) . "</div>";
            }
        } else {
            $stmt = $pdo->prepare("SELECT id, username, password, perfil FROM usuarios WHERE username = ?");
            $stmt->execute([$tmpdatusuario]);
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($fila) {
                ?>
                <form action="" method="POST" class = "form-container">
                    <input type="hidden" id="custId" name="custId" value="<?php echo htmlspecialchars($fila['id']); ?>">
                    <label for="datusuario"> Usuario </label>
                    <input type="text" name="datusuario" id="datusuario"value="<?php echo htmlspecialchars($fila['id']); ?>">
                    <br>
                    <label for="datpassword"> Contraseña </label>
                    <input type="text" name="datpassword" id="datpassword" value="<?php echo htmlspecialchars($fila['password']); ?>" required>
                    <br>
                    <label for="datperfil"> Pefil </label>
                    <input type="text" name="datperfil" id="datperfil" value="<?php echo htmlspecialchars($fila['perfil']); ?>" required>
                    <br>
                    <button type="submit">Modificar</button>
                </form>
                <?php
            } else {
                echo "<div class='error-message'>Usuario no hallado :v</div>";
                ?>
                <form action = "" method="POST" class="form-container">
                    <button type="submit" name = "retry" class = "form-button"> Pa' atras</button>
                </form>
                <?php
            }
        }
    }
} else {
    ?>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/gestion_usuarios.css'); ?>">
    <form action = "" method="POST" class="form-container">
        <label for="datusuario" class ="form-label"> Que usuario quiere modificar? </label>
        <input type="text" name="datusuario" id="datusuario" class ="form-input"required>
        <br>
        <button type="submit" class = "form-button"> Buscar usuario</button>
    </form>
    <?php
}

?>