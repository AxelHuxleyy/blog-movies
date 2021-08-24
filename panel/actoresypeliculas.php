<?php
            require "conexion.php";

            
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
            $pelicula = $_POST['pelicula'];
            $actor = $_POST['actor'];
            $error="";
            

            $sql = $conexion->prepare('SELECT * FROM peliculas WHERE nombre = :nombre limit 1');
            $sql->execute(array(
                ':nombre' => $pelicula                
            ));
            $resul = $sql->fetchAll();
            foreach($resul as $row)
                    {

                        $id_pelicula = $row['id'];
                        
                    }

            $sql = $conexion->prepare('SELECT * FROM actores WHERE nombre = :nombre limit 1');
            $sql->execute(array(
                ':nombre' => $actor                
            ));
            $result = $sql->fetchAll();
            foreach($result as $row)
                    {

                        $id_actor = $row['id'];
                        
                    }

            require "conexion.php";

            $statement = $conexion->prepare('SELECT * FROM participa WHERE id_pelicula = :id_pelicula AND id_actor = :id_actor LIMIT 1');
            $statement->execute(array(':id_pelicula' => $id_pelicula,
            ':id_actor'=> $id_actor));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<i>Esta relacion ya existe</i>';
            }

            if($error == ""){
            $statement = $conexion->prepare("INSERT INTO participa (id, id_pelicula, id_actor) VALUES (null, :id_pelicula, :id_actor)");
            $statement->execute(array(
                
                ':id_pelicula' => $id_pelicula,
                ':id_actor'=> $id_actor
                
            ));
            $error .= '<i>Actor  relacionado correctamente </i>';
        }
    }
            $statement = $conexion->prepare("SELECT * FROM actores ");
            $statement->execute();

            $sql = $conexion->prepare('SELECT * FROM peliculas ');
            $sql->execute();
            $resultado = $sql->fetchAll();
    
require 'frontend/rennovacion-vista.php';

?>