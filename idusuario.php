<?php 




function _idusuario()
{
    require 'conexion.php';
    $correo= $_SESSION['usuario'];
    $statement = $conexion->prepare('SELECT * FROM usuario WHERE correo = :correo limit 1');
        //se ejecuta sentencia
        $statement->execute(array(
            ':correo' => $correo
        ));
        $usuario = $statement->fetch();
        if ($usuario !== false){ 
            foreach ($usuario as $row) {
                return $row["id"];
                }
          }
        else{
            return -1;
		}
}


?>