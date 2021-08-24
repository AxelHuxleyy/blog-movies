<?php session_start();

    if(!isset($_SESSION['usuario']))
    {
        header('location: ../index.php');
    }

    
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        
        $con=mysqli_connect("localhost","root","","rincones");
        $nombre = utf8_decode( $_POST['nombre']);
       
        $nacimiento=utf8_decode( $_POST['nacimiento']);
        $biografia=utf8_decode($_POST['biografia']);
        
        
        
        $error = '';
        $acep=0;
        $sexo=null;
        $errorr;

        
        
        
        
        if (empty($nombre)  or empty($biografia)){
            
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }else{
            
            
            if ($error == ''){
                $idactor= $_SESSION['editactor'];
                require "conexion.php";
                $statement = $conexion->prepare('UPDATE actores SET nombre = :nombre, nacimiento = :nacimiento, 
                biografia= :biografia WHERE id = :id_actor');
                $statement->execute(array(
                    ':nombre'=> $nombre,
                    ':nacimiento' => $nacimiento,
                    ':biografia'=> $biografia,
                    'id_actor' => $idactor
                ));
    
                

                $id_usuario =$_SESSION['usuario'];
                $accion= "modifico actor:".$nombre;
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
    $_SESSION['editactor']=$id;
	include 'conexion.php';

	$sql = $conexion->prepare('SELECT * FROM actores WHERE  id = :id LIMIT 1');
    $sql->execute(array(':id' => $id));
	$resultado = $sql->fetchAll();

	foreach ($resultado as $row) {
		$id=$row["id"];
		$nombre=$row["nombre"];
		$biografia= $row['biografia'];
		$nacimiento= $row['nacimiento'];
	}
	

    require 'frontend/editactor-vista.php';

?>