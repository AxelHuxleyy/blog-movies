<?php session_start();

    if(!isset($_SESSION['usuario'])) {
        header('location: ../register.php');
    }

    
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        
        $con=mysqli_connect("localhost","root","","rincones");
        $nombre = utf8_decode( $_POST['nombre']);
        $categoria = utf8_decode( $_POST['categoria']);
        $director = utf8_decode ($_POST['director']);
        $productor= utf8_decode( $_POST['productor']);
        $resumen = utf8_decode( $_POST['resumen']);
        $id_usuario= utf8_decode( $_SESSION['usuario']);
        
        $error = '';
        
        
        
        
        if (empty($nombre) or empty($categoria) or empty($director)){
            
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }else{
            
            
            if ($error == ''){
                require "conexion.php";
                $id_pelicula=$_SESSION['editpelicula'];
                $statement = $conexion->prepare('UPDATE peliculas SET nombre = :nombre, categoria = :categoria, 
                director= :director, productor = :productor, resumen= :resumen WHERE id = :id_pelicula');
                $statement->execute(array(
                    ':nombre'=> $nombre,
                    ':categoria' => $categoria,
                    ':director'=> $director,
                    ':productor' => $productor,
                    ':resumen' =>$resumen,
                    ':id_pelicula' =>$id_pelicula
      
                    
                ));
                $accion= "modifico pelicula:".$nombre;
                $statement = $conexion->prepare('INSERT INTO cambio (id, id_usuario, accion, descripcion) VALUES (null, :usuario, 
                "agrego", :accion)');
                    $statement->execute(array(
                        
                        ':usuario' => $id_usuario,
                        ':accion' => $accion
                        
                    ));
                $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
                
            }
            
            

        }
            
        
   
    }



    $id= $_GET['id'];
    $_SESSION['editpelicula']=$id;
	include 'conexion.php';

	$sql = $conexion->prepare('SELECT * FROM peliculas WHERE  id = :id LIMIT 1');
    $sql->execute(array(':id' => $id));
	$resultado = $sql->fetchAll();

	foreach ($resultado as $row) {
		$id=$row["id"];
		$nombre=$row["nombre"];
		$categoria= $row['categoria'];
        $director= $row['director'];
        $productor= $row['productor'];
		$resumen= $row['resumen'];

	}
	
    require 'frontend/editpeliculas-vista.php';

?>