<?php session_start();

    if(!isset($_SESSION['usuario'])) {
        header('location: ../register.php');
    }

    
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        
        $con=mysqli_connect("localhost","root","","rincones");
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $director = $_POST['director'];
        $productor= $_POST['productor'];
        $resumen = $_POST['resumen'];
        
        $error = '';
        
        
        
        
        if (empty($nombre) or empty($categoria) or empty($director)){
            
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }else{
            
            
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
    
                $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
                
            }
            
            

        }
            
        
   
    }

    require 'frontend/peliculas-vista.php';

?>