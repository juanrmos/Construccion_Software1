<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';

class modelousuario { 

private $conexion;
public function __construct(){
    $this->conexion = Conexion::obtenerConexion();

}


public function obtenerUsuarios() {
    $query = $this -> conexion -> query('SELECT id, username, password, perfil FROM usuarios');
    return $query->fetchAll(PDO::FETCH_ASSOC);
}


public function insertarUsuario ($username, $password, $perfil) {
    $query = $this -> conexion -> query('INSERT INTO usuarios (username, password, perfil ) values (:username, :password, :perfil)');
    $stmt =  $this -> conexion -> prepare($query);
    $stmt ->bindParam('username', $username);
    $stmt ->bindParam('password', $password);
    $stmt ->bindParam('perfil', $perfil);
    return $stmt -> execute();
}




}

?>