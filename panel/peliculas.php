<?php session_start();

    if(!isset($_SESSION['usuario'])) {
        header('location: ../register.php');
    }

    
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        
        $con=mysqli_connect("localhost","root","","rincones");
        $nombre = utf8_decode($_POST['nombre']);
        $categoria = utf8_decode($_POST['categoria']);
        $director = utf8_decode($_POST['director']);
        $productor= utf8_decode($_POST['productor']);
        $resumen = utf8_decode($_POST['resumen']);
        $id_usuario= utf8_decode($_SESSION['usuario']);
        
        $error = '';
        
        
        
        
        if (empty($nombre) or empty($categoria) or empty($director)){
            
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }else{

            require "conexion.php";

            $statement = $conexion->prepare('SELECT * FROM peliculas WHERE nombre = :nombre LIMIT 1');
            $statement->execute(array(':nombre' => $nombre));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<i>Esta pelicula ya ha sido registrada previamente</i>';
            }
            if ($error == ''){
                require "conexion.php";
                $statement = $conexion->prepare('INSERT INTO peliculas (id, nombre, categoria, director, productor, resumen) VALUES 
                (null, :nombre, :categoria, :director, :productor, :resumen)');
                $statement->execute(array(
                    ':nombre'=> $nombre,
                    ':categoria' => $categoria,
                    ':director'=> $director,
                    ':productor' => $productor,
                    ':resumen' =>$resumen
      
                    
                ));
    
                $ss=mysqli_query($con,"SELECT MAX(id) as id_maximo FROM peliculas");
                if($rr=mysqli_fetch_array($ss))
                {
                    $id_maximo= $rr['id_maximo'];
                }
                
                $nameimagen=$_FILES['imagen'] ['name'];
                $tmpimagen=$_FILES['imagen'] ['tmp_name'];
                $urlnueva= '../img/peliculas/peli'.$id_maximo.'.jpg';
    
                if(is_uploaded_file($tmpimagen))
                {
                    copy($tmpimagen, $urlnueva);
                    
                }  
                else
                {
                    $error .= 'error al cargar';
                }

                $accion= "agrego pelicula:".$nombre;
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

    require 'frontend/peliculas-vista.php';

?>