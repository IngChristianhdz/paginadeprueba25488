<?php
//error_reporting(E_ALL); //Habilitar para ver errores php
//ini_set('display_errors', 1); // Habilitar para ver errores php
//require('phpmailer/PHPMailerAutoload.php');
require 'phpmailer/PHPMailerAutoload.php'; // Si no funciona el comando arriba coloque la ruta DE PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
date_default_timezone_set('Etc/UTC');


require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
$mail = new PHPMailer;
$mail->SMTPDebug = 1; // Habilitar salida de Debug

$mail->IsSMTP(); // Colocar el mailer para usar SMTP
$mail->Host = 'secure.emailsrvr.com'; // Especificar servidor principal de backup
$mail->Port = 465; // Configurar puerto SMTP
$mail->SMTPAuth = true; // Habilitar SMTP
$mail->Username = 'atencion_usuarios@jumapac.gob.mx'; // Usuario SMTP
$mail->Password = 'ATusu2020'; // Contraseña SMTP
$mail->SMTPSecure = 'ssl'; // Habilitar encrypcion, 'ssl' también se acepta.

$mail->From = 'atencion_usuarios@jumapac.gob.mx';
$mail->FromName = 'Your From name';
$mail->AddAddress('informatica.jumapac@gmail.com'); // Agregue un receptor
$mail->AddAddress('atencion_usuarios@jumapac.gob.mx'); // Este nombre es opcional.

$mail->IsHTML(true); // Colocar formato de correo a HTML

$mail->Subject = 'Aquí colocas el Asunto';
$mail->Body = 'Este es el cuerpo del mensaje <strong>en Retenido!</strong>';
$mail->AltBody = 'Este es el cuerpo del mensaje para Clientes no-HTML';

if(!$mail->Send()) {
echo 'El Mensaje no pudo ser enviado.';
echo 'Error del Mailer: ' . $mail->ErrorInfo;
exit;
}

echo 'El Mensaje ha sido enviado';
?>