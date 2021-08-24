<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
	}
	
//declaracion de variables
   
    $error = '';
    //metodo post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario = $_POST['usuario'];
		$clave = $_POST['clave'];
		$clave = hash('sha512', $clave);

        //conexion
        require "conexion.php";

        //preparo sentencia
        $statement = $conexion->prepare('SELECT * FROM usuario WHERE correo = :usuario AND password = :clave limit 1');
        //se ejecuta sentencia
        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave
        ));
        $resultado = $statement->fetch();
        if ($resultado !== false){ 

          
             
            

            $sql = $conexion->prepare('SELECT * FROM usuario WHERE  correo = :correo LIMIT 1');
            $sql->execute(array(':correo' => $usuario));
            $resultado = $sql->fetchAll();

            foreach ($resultado as $row) {
                $id=$row["id"];
            }

            header('location: index.php');

            $_SESSION['usuario']=$id;


          }
        else{
            $error .= '<i>La contraseña o el usuario con incorrectos </i>';
		}
    }
    
require 'frontend/login-vista.php';


?>