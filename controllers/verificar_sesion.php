<?php  

function verificar_sesion() {
    if (!isset($_SESSION["contrasena"])) {
        header('Location: '.get_views('vistaInicioSesion.php'));
        exit();
    }
}

// function verificar_sesion2() {
//     if ($_SERVER["REQUEST_METHOD"] !== "POST") {
//         header('Location: '.get_urlBase('index.php'));
//         exit();
//     }
// }


function cerrar_sesion() {
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header('Location: '.get_views('vistaInicioSesion.php'));
        exit();
    }
}



?>