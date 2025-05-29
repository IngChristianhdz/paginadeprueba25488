<script src="js/sweetalert2.min.js"></script> <link rel="stylesheet" type="text/css" href="css/sweetalert2.css">
<?php
include ('database.php');


$correo=$_POST['email'];

date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set('display_errors', '1');


date_default_timezone_set('Etc/UTC');

 
  $query = "UPDATE registro set password_request=1 where Correo = '$correo'";
  $result = mysqli_query($connection, $query); 
  $result11="INSERT INTO `AccesoWeb` (`idAccesoWeb`, `correo`, `fecha`, `observacion`) VALUES (NULL, '$correo', CURRENT_TIMESTAMP, 'Solicita_cambio')";
  $result =  mysqli_query($connection ,$result11); 
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
$mail->AddAddress('atencion_usuarios@jumapac.gob.mx'); // Agregue un receptor
$mail->AddAddress($_POST['email']); // Este nombre es opcional.

$mail->IsHTML(true); // Colocar formato de correo a HTML

$mail->Subject = 'Reestablecimiento de password';
$mail->Body    = 'Hola se ha solicitado un reinicio de password.<br/><br/> Para restablecer el password, da click aqui: <a href="www.jumapac.gob.mx/nuevoPassword.php?correo='.$correo.'"> NUEVO PASSWORD <br/><br/> <strong>NOTA:</strong> Si por alguna razon no se activa el link por favor copia lo que se muestra dentro de los corchetes y pegalo en la barra de busqueda de tu navegador. Gracias.</a>';
$mail->AltBody = 'Este es el cuerpo del mensaje para Clientes no-HTML';



if(!$mail->send()){
	
   echo "error";
   
  
  
} else {
	?>
   <script language="javascript">
swal({   title: 'Gracias', 
  text: 'Hemos enviado un link de reestablecimiento a tu correo',  

   type: 'success',
   confirmButtonText:'OK'},

   
   function(isConfirm) {   
   if (isConfirm) {
	
	window.location="cuenta_nuevo.php";
	
	
	 }
   }
   );

 </script>
  <?php
 
}		
?>