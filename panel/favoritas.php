<?php session_start();
            require "conexion.php";

            
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario=$_SESSION['usuario'];
        $error="";
        
        $pelicula = $_POST['pelicula'];
            

            $sql = $conexion->prepare('SELECT * FROM peliculas WHERE nombre = :nombre limit 1');
            $sql->execute(array(
                ':nombre' => $pelicula                
            ));
            $resul = $sql->fetchAll();
            foreach($resul as $row)
                    {

                        $id_pelicula = $row['id'];
                        
                    }

            require "conexion.php";

            $statement = $conexion->prepare('SELECT * FROM favoritas WHERE id_pelicula = :id_pelicula AND id_usuario = :id_usuario LIMIT 1');
            $statement->execute(array(':id_pelicula' => $id_pelicula, ':id_usuario'=> $usuario));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<i>Ya se ha hecho esta relacion previamente</i>';
            }

            if($error == ""){
               
            $statement = $conexion->prepare("INSERT INTO favoritas (id, id_pelicula, id_usuario) VALUES (null, :id_pelicula, :id_usuario)");
            $statement->execute(array(
                
                ':id_pelicula' => $id_pelicula,
                ':id_usuario'=> $usuario
                
            ));
            $error .='<i style="color: black;   ">Agregado el titulo '.$pelicula.' correctamente a tu lista</i>';
        }
    }


            $sql = $conexion->prepare('SELECT * FROM peliculas ');
            $sql->execute();
            $resultado = $sql->fetchAll();
    
require 'frontend/favoritas-vista.php';

?>