<?php
session_start();



$status = $_GET['status'] ?? 'error';

if ($status === 'success') {
    $redirectURL = 'Principal.php';
} else {
    $redirectURL = 'Pagina_error.php';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargando...</title>
    <link rel="stylesheet" href="CSS/Pagina_carga.css">
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
