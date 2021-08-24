<?php 



session_start();


        if(isset($_SESSION['usuario'])) {

        
                $usernameSesion = $_SESSION['usuario'];

                if (isset($_GET['peli']) && isset($_GET['calificacion']))
                {
                        $peli=$_GET['peli'];
                        $calificacion=$_GET['calificacion'];
                        require "conexion.php";

                        $statement = $conexion->prepare('SELECT * FROM calificacion WHERE id_pelicula = :pelicula AND id_usuario = :usuario LIMIT 1');
                        $statement->execute(array(':pelicula' => $peli, ':usuario' => $usernameSesion));
                        $resultado = $statement->fetch();
                        
                        if ($resultado != false){

                                $statement = $conexion->prepare('UPDATE calificacion SET calificacion =:calificacion WHERE 
                                id_pelicula = :pelicula AND id_usuario = :usuario');
                                $statement->execute(array(
                                ':pelicula'=> $peli,
                                ':usuario' => $usernameSesion,
                                ':calificacion'=> $calificacion,
                                ));

                                header('location: review.php');
                               
                        }
                        else
                        {
                                $statement = $conexion->prepare('INSERT INTO calificacion (id, id_pelicula, id_usuario, calificacion) 
                                VALUES (null, :pelicula, :usuario, :calificacion)');
                                $statement->execute(array(
                                ':pelicula'=> $peli,
                                ':usuario' => $usernameSesion,
                                ':calificacion'=> $calificacion,
        
                                ));

                                header('location: review.php');
                        }

                }
                else
                {
                        header('location: games.php');
                }
        }
        else
        {
                header('location: register.php');
        }

        
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

