<?php session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(!isset($_SESSION['usuario']))
    {
        ?> <script>alert("Se necesita tener inicada sesion para comentar")</script> <?php
        header('location: login.php');
    }
    $usuario=$_SESSION['usuario'];

    $comentario = $_POST['comentario'];

    $peli= $_SESSION['pelicula'];
    $error= "";
    
    
             
    
    
    if (empty($comentario) ){
        
        $error .= '<i>Favor de rellenar todos los campos</i>';
    }else{
        

        require "conexion.php";
        
            $statement = $conexion->prepare('INSERT INTO comentarios (id, id_pelicula, id_usuario, comentario) VALUES 
            (null, :id_pelicula, :usuario, :comentario )');
            $statement->execute(array(
                
                ':usuario' => $usuario,
                ':comentario' => $comentario,
                ':id_pelicula'=> $peli
                
                
            ));
            


            $error .= $comentario;
            header('location: pelicula.php?id='.$peli);
           
        
        
    }
    

}

$id_pelicula= $_GET['id'];
include 'conexion.php';

$sql = $conexion->prepare('SELECT * FROM peliculas WHERE  id = :id_pelicula LIMIT 1');
$sql->execute(array(':id_pelicula' => $id_pelicula));
$resultado = $sql->fetchAll();
foreach ($resultado as $row) {
    $id=$row["id"];
    $nombre=$row["nombre"];
    $director= $row['director'];
    $productor= $row['productor'];
    $categora =$row['categoria'];
    $resumen= $row['resumen'];
    }

$_SESSION['pelicula'] = $id;
$sql = $conexion->prepare('SELECT AVG(calificacion) AS promedio FROM calificacion WHERE id_pelicula= :id_pelicula LIMIT 1');
$sql->execute(array(':id_pelicula' => $id_pelicula));
$resu = $sql->fetchAll();




foreach($resu as $row)
{
	$promedio=$row['promedio'];
}
    
    
    
$sql = $conexion->prepare('SELECT peliculas.id AS idpelicula, comentarios.comentario, usuario.nombre AS username from peliculas INNER JOIN comentarios ON peliculas.id = comentarios.id_pelicula 
INNER JOIN usuario ON comentarios.id_usuario = usuario.id WHERE peliculas.id = :id_pelicula');
$sql->execute(array(':id_pelicula' => $id_pelicula));
$resul = $sql->fetchAll();

$sql = $conexion->prepare('SELECT actores.id, peliculas.nombre AS nombrepelicula, actores.nombre AS nombreactor FROM peliculas INNER JOIN participa ON 
	peliculas.id = participa.id_pelicula INNER JOIN actores ON participa.id_actor = actores.id WHERE peliculas.id = :id_pelicula');
    $sql->execute(array(':id_pelicula' => $id_pelicula));
	$res = $sql->fetchAll();




    require 'frontend/pelicula-vista.php';

?>