<?php
function mostrarUsuario($usuarios)
{
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Usuarios del Sistema</title>
        <link rel="stylesheet" href="<?php echo get_urlBase('css/verdatos.css'); ?>">
    </head>
    <body>
        <div class="user-table-container">
            <h2 class="title">Lista de usuarios del sistema V2</h2>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Perfil</th>
                        <th>Eliminar</th>
                        <th>Modificar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['username']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['password']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['perfil']); ?></td>
                            <td> <a href="/controllers/controladorEliminarUsuario.php?username=<?php echo urlencode($usuario['username']); ?>" class="delete-link">Eliminar</a></td>
                            <td> <a href="/controllers/controladorModificarUsuario.php?username=<?php echo urlencode($usuario['username']); ?>" class="btn-modificar">Modificar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
    </body>
    </html>
<?php
}
?>
