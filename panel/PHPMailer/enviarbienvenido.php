<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
function enviarcorreo($corre, $nombr, $op, $fecha){

$mensaje;
$asunto;
    
    if($op==1){
        $mensaje="Animals GYM te da la bienvenida a nuestro increible gimnasio";
        $asunto="bienvenido a AnimalsGym";
    }
    if($op==2){
        $mensaje="Animals gym te notifica que tu nueva fecha de vencimiento es el ".$fecha;
        $asunto="actualizacion de fecha AnimalsGym";
    }


$mail  = new PHPMailer();

$erro;


$fecha=date('Y-m-d');
$newvalor=1;

    
//asigna a $body el contenido del correo electrónico
$body = $mensaje; 

// Indica que se usará SMTP para enviar el correo
$mail->IsSMTP(); 

//$mail->SMTPDebug  = 2;                     
// Activar los mensajes de depuración, 
// muy útil para saber el motivo si algo sale mal
// 1 = errores y mensajes
// 2 = solo mensajes entre el servidor u la clase PHPMailer

$mail->SMTPAuth = true;
// Activar autenticación segura a traves de SMTP, necesario para gmail

$mail->SMTPSecure = "tls";
// Indica que la conexión segura se realizará mediante TLS

$mail->Host = "smtp.gmail.com";
// Asigna la dirección del servidor smtp de GMail

$mail->Port = 587;
// Asigna el puerto usado por GMail para conexion con su servidor SMTP

$mail->Username = "tackaships3@gmail.com";  
// Indica el usuario de gmail a traves del cual se enviará el correo

$mail->Password = "******";
// GMAIL password

$mail->SetFrom('tackaships3@gmail.com', 'Animals GYM'); 
//Asignar la dirección de correo y el nombre del contacto que aparecerá cuando llegue el correo


$mail->Subject = $asunto; 
//Asignar el asunto del correo

$mail->MsgHTML($body); 
//Si deseas enviar un correo con formato HTML debes descomentar la linea anterior

$mail->AddAddress($corre, $nombr); 
//Indica aquí la dirección que recibirá el correo que será enviado
        

if(!$mail->Send()) {
  $erro=1;
}
    else {
 $erro=0;
}
    
   return $erro;
}
?>