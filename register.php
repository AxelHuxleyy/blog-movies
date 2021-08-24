<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }

    
    $mujer=0;
    $hombre=0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$clave = $_POST['clave'];
		$clave2 = $_POST['clave2'];
		$nombre = $_POST['nombre'];
		$apellido= $_POST['apellido'];
		$genero= $_POST['genero'];
		$fecha = $_POST['nacimiento'];
		$direccion= $_POST['direccion'];
		$telefono= $_POST['telefono'];
        $correo= $_POST['correo'];
        
        
        $clave = hash('sha512', $clave);
        $clave2 = hash('sha512', $clave2);
        
        $error = '';
        $acep=0;
        $sexo=null;
        $errorr;
         
        
        
        if (empty($nombre) or empty($clave) or empty($clave2) or empty($apellido) or empty($genero) or empty($fecha)  or empty($direccion)
            or empty($telefono) or empty($correo)){
            
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }else{
            
            require "conexion.php";
            
            $statement = $conexion->prepare('SELECT * FROM usuario WHERE correo = :correo LIMIT 1');
            $statement->execute(array(':correo' => $correo));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<i>Este usuario ya existe</i>';
            }
            
            if ($clave != $clave2){
                $error .= '<i> Las contraseñas no coinciden</i>';
            }
            
            
        }
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO usuario (id, password, nombre, apellido, genero, nacimiento, 
            direccion, telefono, correo) VALUES (null, :clave, :nombre, :apellido, :genero, :nacimiento, 
            :direccion, :telefono, :correo)');
            $statement->execute(array(
                
                ':clave'=> $clave,
                ':nombre'=> $nombre,
                ':apellido' => $apellido,
                ':genero' => $genero,
                ':nacimiento'=> $fecha,
                ':direccion' => $direccion,
                ':telefono' => $telefono,
                ':correo' => $correo
                
            ));
            
            $error .= '<i style="color: white;">Usuario registrado exitosamente</i>';
            
           
        }
    
    }
    
    


    require 'frontend/register-vista.php';

?>