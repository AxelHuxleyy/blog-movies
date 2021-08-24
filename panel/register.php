<?php session_start();

    if(!isset($_SESSION['usuario']))
    {
        header('location: ../index.php');
    }

    
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        
        $con=mysqli_connect("localhost","root","","rincones");
        $nombre = utf8_decode($_POST['nombre']);
       
        $nacimiento=utf8_decode($_POST['nacimiento']);
        $biografia=utf8_decode($_POST['biografia']);
        
        
        
        $error = '';
        $acep=0;
        $sexo=null;
        $errorr;
        
        
        
        if (empty($nombre) or empty($nacimiento) or empty($biografia)){
            
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }else{

            require "conexion.php";

            $statement = $conexion->prepare('SELECT * FROM actores WHERE nombre = :nombre LIMIT 1');
            $statement->execute(array(':nombre' => $nombre));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<i>Esta pelicula ya ha sido registrada previamente</i>';
            }
            
            
            if ($error == ''){
                require "conexion.php";
                $statement = $conexion->prepare('INSERT INTO actores (id, nombre, nacimiento, biografia) VALUES 
                (null, :nombre, :nacimiento, :biografia)');
                $statement->execute(array(
                    ':nombre'=> $nombre,
                    ':nacimiento' => $nacimiento,
                    ':biografia'=> $biografia
      
                    
                ));
    
                $ss=mysqli_query($con,"SELECT MAX(id) as id_maximo FROM actores");
                if($rr=mysqli_fetch_array($ss))
                {
                    $id_maximo= $rr['id_maximo'];
                }
                
                $nameimagen=$_FILES['imagen'] ['name'];
                $tmpimagen=$_FILES['imagen'] ['tmp_name'];
                $urlnueva= '../img/posters/posert'.$id_maximo.'.jpg';
    
                if(is_uploaded_file($tmpimagen))
                {
                    copy($tmpimagen, $urlnueva);
                    
                }
                else
                {
                    $error .= 'error al cargar';
                }

                $id_usuario =$_SESSION['usuario'];
                $accion= "agrego actor:".$nombre;
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

    require 'frontend/register-vista.php';

?>