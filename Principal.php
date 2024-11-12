
<?php
    session_start();
    if (!isset($_SESSION['usuario']) || !isset($_SESSION['contrasena'])) {
        header('location: index.php');
        exit();
    }

    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal - Kayay eco</title>
    <link rel="stylesheet" href="CSS/Estilos_general.css">
</head>
<body>
    
    <nav class="navbar">
        <div class="navbar-brand">
            <a href="Principal.php">Kayay eco</a>
        </div>
        <div class="navbar-links">
            <a href="Principal.php?logout=true">Cerrar Sesión</a>
        </div>
    </nav>

    
    <main class="contenido">
        <h1>Bienvenido a Kayay eco</h1>
        <p>
            Kayay eco, es un sitio web enfocada en promover la conciencia sobre el cuidado del medio ambiente. 
            A través de un diseño amigable y elementos visuales atractivos, busca educar a los usuarios sobre prácticas sostenibles y ecológicas, 
            inspirando pequeñas acciones que puedan tener un impacto positivo en el planeta.
        </p>
        
    </main>
</body>
</html>

