<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';

class modelousuario { 

private $conexion;
public function __construct(){
    $this->conexion = Conexion::obtenerConexion();

}

//VerUsuario

public function obtenerUsuarios() {
    $query = $this -> conexion -> query('SELECT id, username, password, perfil FROM usuarios');
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//IngresarUsuario

public function insertarUsuario ($username, $password, $perfil) {
    $query = "INSERT INTO usuarios (username, password, perfil ) values (:username, :password, :perfil)";
    $stmt =  $this -> conexion -> prepare($query);
    $stmt ->bindParam(':username', $username);
    $stmt ->bindParam(':password', $password);
    $stmt ->bindParam(':perfil', $perfil);
    return $stmt -> execute();
}

//EliminarUsuario

public function eliminarUsuario ($username) {
    $query = "DELETE FROM usuarios WHERE username = :username";
    $stmt =  $this -> conexion -> prepare($query);
    $stmt ->bindParam(':username', $username);
    return $stmt -> execute();
}


//modificarUsuario 
public  function modificarUsuario($id, $username, $password, $perfil)
    {
        $query = "UPDATE usuarios SET username = :username, password = :password, perfil = :perfil WHERE id = :id";
        $stmt =  $this -> conexion -> prepare($query);
        $stmt =  $this -> conexion -> prepare($query);
        $stmt ->bindParam(':id', $id);
        $stmt ->bindParam(':username', $username);
        $stmt ->bindParam(':password', $password);
        $stmt ->bindParam(':perfil', $perfil);
        return $stmt -> execute();
    }

//Obtiene un usuario 

public function obtenerUsuarioPorNombre ($username) {
    $query = "SELECT id, username, password, perfil FROM usuarios WHERE username = :username";
    $stmt =  $this -> conexion -> prepare($query);
    $stmt ->bindParam(':username', $username);
    $stmt -> execute();
    return $stmt -> fetch(PDO::FETCH_ASSOC);
}

}

?>