<?php
function mostrarUsuario($usuarios)
{

?>
    <h2>Lista de usurios del sistema V2</h2>
    <br>
    <table border="1 ">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>perfil</th>
        </tr>
        <?php
        foreach ($usuarios as $usuario) {
        ?>
            <tr>
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['username'] ?></td>
                <td><?php echo $usuario['password'] ?></td>
                <td><?php echo $usuario['perfil'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}
?>