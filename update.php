<?php session_start();

    if(!isset($_SESSION['usuario'])) {
        header('location: index.php');
    }
    
	
//declaracion de variables
   
    $error = '';
    //metodo post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $usuario= $_SESSION['usuario'];
        $campo = $_POST['campo'];
		$clave = $_POST['clave'];
        $clave = hash('sha512', $clave);
        
        //conexion
        require "conexion.php";

        //preparo sentencia
        $statement = $conexion->prepare('SELECT * FROM usuario WHERE usuario = :usuario AND password = :clave');
        //se ejecuta sentencia
        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave
        ));
        $resultado = $statement->fetch();
        if ($resultado !== false){
            $accion= $_SESSION['accion'];

            switch($accion)
            {
                case 'nombre':
                    $statement = $conexion->prepare('
                    UPDATE usuario SET nombre = :campo WHERE id = :usuario'
                    );
                    
                    $statement->execute(array(
                        ':usuario' => $usuario,
                        ':campo' => $campo
                    ));
                    $resultado = $statement->fetch();
                break;

                case 'apellido':
                    $statement = $conexion->prepare('
                    UPDATE usuario SET apellido = :campo WHERE id = :usuario'
                    );
                    
                    $statement->execute(array(
                        ':usuario' => $usuario,
                        ':campo' => $campo
                    ));
                    $resultado = $statement->fetch();
                break;
                case 'direccion':
                    $statement = $conexion->prepare('
                    UPDATE usuario SET direccion = :campo WHERE id = :usuario'
                    );
                    
                    $statement->execute(array(
                        ':usuario' => $usuario,
                        ':campo' => $campo
                    ));
                    $resultado = $statement->fetch();
                break;
                case 'genero':
                    $statement = $conexion->prepare('
                    UPDATE usuario SET genero = :campo WHERE id = :usuario'
                    );
                    
                    $statement->execute(array(
                        ':usuario' => $usuario,
                        ':campo' => $campo
                    ));
                    $resultado = $statement->fetch();
                break;
                case 'nacimiento':
                    $statement = $conexion->prepare('
                    UPDATE usuario SET nacimiento = :campo WHERE id = :usuario'
                    );
                    
                    $statement->execute(array(
                        ':usuario' => $usuario,
                        ':campo' => $campo
                    ));
                    $resultado = $statement->fetch();
                break;
                case 'telefono':
                    $statement = $conexion->prepare('
                    UPDATE usuario SET telefono = :campo WHERE id = :usuario'
                    );
                    
                    $statement->execute(array(
                        ':usuario' => $usuario,
                        ':campo' => $campo
                    ));
                    $resultado = $statement->fetch();
                break;
                case 'correo':
                    $statement = $conexion->prepare('
                    UPDATE usuario SET correo = :campo WHERE id = :usuario'
                    );
                    
                    $statement->execute(array(
                        ':usuario' => $usuario,
                        ':campo' => $campo
                    ));
                    $resultado = $statement->fetch();
                break;

                case 'password':

                    $campo = hash('sha512', $campo);
                    
                    $statement = $conexion->prepare('
                    UPDATE usuario SET password = :campo WHERE id = :usuario'
                    );
                    
                    $statement->execute(array(
                        ':usuario' => $usuario,
                        ':campo' => $campo
                    ));
                    $resultado = $statement->fetch();
                break;

                

            }
			$error .= "<h5>Campo actualizado</h5>";
          }
        else{
            $error .= '<i>La contraseña es incorrectos </i>';
		}
    }
    

    $accion= $_GET['accion'];
    $_SESSION['accion'] = $accion;
    
require 'frontend/update-vista.php';


?>