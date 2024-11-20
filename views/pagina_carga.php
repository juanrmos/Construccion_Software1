<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';

if (!isset($_SESSION["usuario"])) {
    header('Location: '.get_urlBase('index.php'));
    exit();
}

$status = $_GET['status'] ?? 'error';

if ($status === 'success') {
    $redirectURL = get_views('principal.php');
} else {
    $redirectURL = get_views('pagina_error.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargando...</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/pagina_carga.css'); ?>">
</head>
<body>
    <div class="animacion-carga">
        <div class="spinner"></div>
        <p>Verificando credenciales...</p>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "<?php echo $redirectURL; ?>";
        }, 3000); // Redirección después de 3 segundos
    </script>
</body>
</html>
