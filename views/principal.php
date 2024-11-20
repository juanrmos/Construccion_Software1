<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/verificar_sesion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';

verificar_sesion();
cerrar_sesion();

require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';

$opcion = isset($_GET['opcion']) ? $_GET['opcion'] : 'inicio';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal - Kayay eco</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estilos_general.css'); ?>">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <a href="principal.php">Kayay eco</a>
        </div>
        <div class="navbar-links">
            <a href="?opcion=inicio">Inicio</a>
            <a href="?opcion=usuarios">Gestión de Usuarios</a>
            <a href="principal.php?logout=true">Cerrar Sesión</a>
        </div>
    </nav>

    <main class="content">
        <?php 
        if ($opcion === 'inicio') {
            echo "<h1>Bienvenido a Kayay eco</h1>";
            echo "<p>
                Kayay eco es un sitio web enfocado en promover la conciencia sobre el cuidado del medio ambiente. 
                A través de un diseño amigable y elementos visuales atractivos, busca educar a los usuarios sobre prácticas sostenibles y ecológicas, 
                inspirando pequeñas acciones que puedan tener un impacto positivo en el planeta.
            </p>";
        } elseif ($opcion === 'usuarios') {
            echo "
            <div class='dropdown'>
                <button class='dropdown-button'>Gestión de Usuarios</button>
                <div class='dropdown-content'>
                    <a href='?opcion=ver'>Ver Datos</a>
                    <a href='?opcion=ingresar'>Ingresar Datos</a>
                    <a href='?opcion=modificar'>Modificar Datos</a>
                    <a href='?opcion=eliminar'>Eliminar Datos</a>
                </div>
            </div>
            ";
        }

        if (isset($_GET['opcion'])) {
            switch ($_GET['opcion']) {
                case 'ver':
                    echo "<iframe src='".get_views("verdatos.php")."' frameborder='0' style='width:100%; height:600px;'></iframe>";
                    break;

                case 'ingresar':
                    echo "<iframe src='".get_views("ingresardatos.php")."' frameborder='0' style='width:100%; height:600px;'></iframe>";
                    break;

                case 'modificar':
                    echo "<iframe src='".get_views("modificardatos.php")."' frameborder='0' style='width:100%; height:600px;'></iframe>";
                    break;

                case 'eliminar':
                    echo "<iframe src='".get_views("eliminardatos.php")."' frameborder='0' style='width:100%; height:600px;'></iframe>";
                    break;
            }
        }
        ?>
    </main>
</body>
</html>


