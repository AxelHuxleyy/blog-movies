<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';



$mail  = new PHPMailer();


$correo;
$nombre;

$fecha=date('Y-m-d');
$newvalor=1;

try{
    $conn = new PDO('mysql:host=localhost;dbname=login_tuto', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $sql = $conn->prepare('SELECT * FROM loginn WHERE  fecha < :fecha AND cor_sens != 1 AND acep_sendmail !=0');
    $sql->execute(array('fecha' => $fecha));
    $resultado = $sql->fetchAll();
 
    
        

    
//asigna a $body el contenido del correo electrónico
$body = "Escorpion GYM te informa que tu mensualidad ha sido vencida"; 

// Indica que se usará SMTP para enviar el correo
$mail->IsSMTP(); 

$mail->SMTPDebug  = 2;                     
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

$mail->Password = "*****";
// GMAIL password

$mail->SetFrom('tackaships3@gmail.com', 'Escorpion GYM'); 
//Asignar la dirección de correo y el nombre del contacto que aparecerá cuando llegue el correo
foreach ($resultado as $row) {
    $correo=$row["correo"];
    $nombre=$row["nombre"];

$mail->Subject = "Escorpion GYM"; 
//Asignar el asunto del correo

$mail->MsgHTML($body); 
//Si deseas enviar un correo con formato HTML debes descomentar la linea anterior

$mail->AddAddress($correo, $nombre); 
//Indica aquí la dirección que recibirá el correo que será enviado
        $valida=$mail->Send();
        
}
if(!$mail->Send()) {
  echo "Error enviando correo: " . $mail->ErrorInfo;
}

    else {
     $statement = $conn->prepare('
        UPDATE loginn SET cor_sens = :newvalor WHERE fecha < :fecha AND cor_sens != 1 AND acep_sendmail != 0'
        );
        
        $statement->execute(array(
            ':fecha' => $fecha,
            'newvalor'=> $newvalor
        ));
 echo '<p>correo mandado</p>';
}
    
    }catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
?>