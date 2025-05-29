<script src="js/sweetalert2.min.js"></script> <link rel="stylesheet" type="text/css" href="css/sweetalert2.css">
<?php

date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set('display_errors', '1');


date_default_timezone_set('Etc/UTC');



$verN= $_POST['Bn'];

$nombre= $_POST['name'];
  $telefono= $_POST['phone'];
  $cuenta= $_POST['count'];
  $correo= $_POST['email'];
  $asunto= $_POST['subject'];
  $msj= $_POST['msj'];

  $archivos = $_FILES['archivo'];
  $nombre_archivo = $archivos['name'];
  $ruta_archivos = $archivos['tmp_name'];
  

//require 'phpmailer/PHPMailerAutoload.php'; // Si no funciona el comando arriba coloque la ruta DE PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
date_default_timezone_set('Etc/UTC');


require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
$mail = new PHPMailer;
$mail->SMTPDebug = 0; // Habilitar salida de Debug

$mail->IsSMTP(); // Colocar el mailer para usar SMTP
$mail->Host = 'secure.emailsrvr.com'; // Especificar servidor principal de backup
$mail->Port = 465; // Configurar puerto SMTP
$mail->SMTPAuth = true; // Habilitar SMTP
$mail->Username = 'atencion_usuarios@jumapac.gob.mx'; // Usuario SMTP
$mail->Password = 'ATusu2020'; // Contraseña SMTP
$mail->SMTPSecure = 'ssl'; // Habilitar encrypcion, 'ssl' también se acepta.

$mail->From = 'atencion_usuarios@jumapac.gob.mx';
$mail->FromName = 'Atencion a Usuarios JUMAPAC';
//$mail->AddAddress('informatica.jumapac@gmail.com'); // Agregue un receptor
$mail->AddAddress('atencion_usuarios@jumapac.gob.mx'); // Este nombre es opcional.
$mail->AddAddress($_POST['email']); // Este nombre es opcional.

$mail->AddAttachment($ruta_archivos,$nombre_archivo);



$mail->IsHTML(true); // Colocar formato de correo a HTML

$mail->Subject =  $asunto;
$mail->Body    = '<strong>Nombre</strong>:'.$nombre.'<br>'.'<strong>Correo:</strong>'.$correo.'<br>'.'<strong>Telefono:</strong>'.$telefono.'<br>'.'<strong>Numero de cuenta:</strong>'.$cuenta.'<br>'.'<strong>Asunto:</strong>'. $asunto.'<br>'.'<strong>Comentario:</strong>'.$msj.'<br>';
$mail->AltBody = 'Este es el cuerpo del mensaje para Clientes no-HTML';

if($verN=="1"){

if(!$mail->send()){
  
   echo "error";
   
  
  
} else {
  ?>
   <script language="javascript">
swal({   title: 'Gracias', 
  text: 'Tu Mensaje fue enviado exitosamente, te responderemos en breve.',  

   type: 'success',
   confirmButtonText:'OK'},

   
   function(isConfirm) {   
   if (isConfirm) {
  
  window.location="contacto.html";
  
  
   }
   }
   );

 </script>
 
 <?php
} 
 }
?>