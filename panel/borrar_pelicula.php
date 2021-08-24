<?php session_start();


$id=$_GET['id'];
$id_usuario= $_SESSION['usuario'];

include('conexion.php');


$statement = $conexion->prepare('DELETE FROM peliculas
WHERE id = :id_pelicula');
        //se ejecuta sentencia
        $statement->execute(array(
            ':id_pelicula' => $id
        ));
        
        $accion= "borro pelicula:".$id;
        $statement = $conexion->prepare('INSERT INTO cambio (id, id_usuario, accion, descripcion) VALUES (null, :usuario, 
        "borro", :accion)');
            $statement->execute(array(
                
                ':usuario' => $id_usuario,
                ':accion' => $accion
                
            ));

            header('location: buscar_peliculas.php');

?>