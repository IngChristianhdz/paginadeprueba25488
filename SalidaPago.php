<!DOCTYPE html>
<html lang="es">
    <head>
        <title>JUMAPAC</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      
        <link rel="shortcut icon" type="image/png" href="https://jumapac.gob.mx/imagenes/LJ.png">
        <link rel="stylesheet" href="https://jumapac.gob.mx/css/estilo_salidapago.css">
        
                
    </head>
    
<?php
   
   
include('conexion/database.php');  
 require 'phpmailer/PHPMailerAutoload.php'; // Si no funciona el comando arriba coloque la ruta DE PHPMAILER
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 use PHPMailer\PHPMailer\SMTP;

 require 'phpmailer/Exception.php';
 require 'phpmailer/PHPMailer.php';
 require 'phpmailer/SMTP.php';
$rsuccess    = htmlspecialchars($_GET["success"],ENT_QUOTES);
$rnuAut      = htmlspecialchars($_GET["nuAut"],ENT_QUOTES);
$roperacion  = htmlspecialchars($_GET["operacion"],ENT_QUOTES);
$rfecha  = htmlspecialchars($_GET["fecha"],ENT_QUOTES);
$rbanco  = htmlspecialchars($_GET["banco"],ENT_QUOTES);
$rmarca  = htmlspecialchars($_GET["marca"],ENT_QUOTES);
$rtpTdc  = htmlspecialchars($_GET["tpTdc"],ENT_QUOTES);
$rnb_merchant  = htmlspecialchars($_GET["nb_merchant"],ENT_QUOTES);
$rnbResponse  = htmlspecialchars($_GET["nbResponse"],ENT_QUOTES);
$rsucursal  = htmlspecialchars($_GET["sucursal"],ENT_QUOTES);
$respuesta= htmlspecialchars($_GET["nbResponse"],ENT_QUOTES);
$error=htmlspecialchars($_GET["nb_error"],ENT_QUOTES);
$cdrespuesta= htmlspecialchars($_GET["cdResponse"],ENT_QUOTES);
$rempresa  = htmlspecialchars($_GET["empresa"],ENT_QUOTES);
$rimporte  = htmlspecialchars($_GET["importe"],ENT_QUOTES);
$rreferencia  = htmlspecialchars($_GET["referencia"],ENT_QUOTES);
$rreferenciaPayment  = htmlspecialchars($_GET["referenciaPayment"],ENT_QUOTES);
$rnbMoneda  = htmlspecialchars($_GET["nbMoneda"],ENT_QUOTES);
$rcdEmpresa  = htmlspecialchars($_GET["cdEmpresa"],ENT_QUOTES);
$rurlTokenId  = htmlspecialchars($_GET["urlTokenId"],ENT_QUOTES);
$ridLiga  = htmlspecialchars($_GET["idLiga"],ENT_QUOTES);
$remail  = htmlspecialchars($_GET["email"],ENT_QUOTES);

$rReference= $rreferencia;
			$rResponse=$rnbResponse;
			$rFoliocpagos= $roperacion;
			$rAuth= $rnuAut ;
			$rCdresponse=$rnbResponse;
			$rNberror= $rfecha;
			$rNtime= "";
			$rNdate=$rfecha ;
			$rNbcompany=$rcdEmpresa;
			$rNbmerchant=$rnb_merchant;
			$rCctype=$rtpTdc;
			$rTpoperation=$ridLiga;
			$rCcnumber= $rurlTokenId;
			$rAmount= $rimporte;
			$rIdurl= $rurlTokenId;
		$rEmail=$remail ;
			$rCcmask= $rreferenciaPayment ;

$Respuestafiltro = 'Pago no aplicado... Todos Somos Agua Cuidala como a ti mismo';
?>
 <body>
     
<?php          
        
if(isset($respuesta))
{

             if($respuesta == "Aprobado")
             {
                $Respuestafiltro = 'Gracias por tu pago... Todos Somos Agua Cuidala como a ti mismo';
               ?> 
                    <h4 class="h4"> Numero de Autorización:  <a class="dato"><?php  echo $rnuAut; ?> </a> </h4>        
                    <h4 class="h4"> Numero de Operación:  <a class="dato"> <?php  echo $roperacion;?> </a></h4>
                    <h1 class="h1">Da Click en la imagen para regresar a tu cuenta_</h1>
                     <a class="a"   href="https://www.jumapac.gob.mx/ReciboPago.php" target="_blank"><img  class="img" src="imagenes/GRACIAS_POR_TU_PAGO.png"> </a> 
         <?php 

$query = "INSERT INTO Respuesta3S (`Reference`, `Response`, `Foliocpagos`, `Auth`, `Cdresponse`, `Nberror`, `Ntime`, `Ndate`, `Nbcompany`, `Nbmerchant`, `Cctype`, `Tpoperation`, `Ccnumber`, `Amount`, `Idurl`, `Email`, `Ccmask`) VALUES ( '$rReference', '$rResponse', '$rFoliocpagos', '$rAuth', '$rCdresponse', '$rNberror', '$rNtime', '$rNdate', '$rNbcompany', '$rNbmerchant', '$rCctype', '$rTpoperation', '$rCcnumber', '$rAmount', '$rIdurl', '$rEmail', '$rCcmask')";
$result = mysqli_query($connection, $query);

$query = "UPDATE usuario SET pagoL  ='$rAmount', pagolinea= '$rpagoenlinea', statusweb=25  WHERE  (correo = '$rEmail' and cuenta='$rReference')  ";

$rpagoenlinea= 'EL PAGO EN LINEA SE PROCESA POR $'.$rAmount.' AUTORIZACION NUM.'.$rAuth;
$result = mysqli_query($connection, $query);
					
}else if(substr($error,0,33) == "La transaccion ya fue aprobada el")
             { 
                 ?>
                 <h4 class="h4">  <?php  echo $error;?> </h4>
                 <h1 class="h1">Da Click en la imagen para regresar a tu cuenta_</h1>
                <a class="a"  href="https://www.jumapac.gob.mx/ReciboPago.php" target="_blank"><img  class="img" src="imagenes/DECLINADO.png"> </a>              
        <?php 
$query = "INSERT INTO Respuesta3S (`Reference`, `Response`, `Foliocpagos`, `Auth`, `Cdresponse`, `Nberror`, `Ntime`, `Ndate`, `Nbcompany`, `Nbmerchant`, `Cctype`, `Tpoperation`, `Ccnumber`, `Amount`, `Idurl`, `Email`, `Ccmask`) VALUES ( '$rReference', '$rResponse', '$rFoliocpagos', '$rAuth', '$rCdresponse', '$rNberror', '$rNtime', '$rNdate', '$rNbcompany', '$rNbmerchant', '$rCctype', '$rTpoperation', '$rCcnumber', '$rAmount', '$rIdurl', '$rEmail', '$rCcmask')";
$result = mysqli_query($connection, $query);



}else if ($error == "La tarjeta no pudo ser autenticada en 3DS._"){  ?>
            <h4 class="h4">  <?php  echo $error;?> </h4>
                  <h1 class="h1">Da Click en la imagen para regresar a tu cuenta</h1>
                  <a  class="a" href="https://www.jumapac.gob.mx/ReciboPago.php" target="_blank"><img class="img" src="imagenes/ERROR.png"> </a> 
                 
         <?php

$query = "INSERT INTO Respuesta3S (`Reference`, `Response`, `Foliocpagos`, `Auth`, `Cdresponse`, `Nberror`, `Ntime`, `Ndate`, `Nbcompany`, `Nbmerchant`, `Cctype`, `Tpoperation`, `Ccnumber`, `Amount`, `Idurl`, `Email`, `Ccmask`) VALUES ( '$rReference', '$rResponse', '$rFoliocpagos', '$rAuth', '$rCdresponse', '$rNberror', '$rNtime', '$rNdate', '$rNbcompany', '$rNbmerchant', '$rCctype', '$rTpoperation', '$rCcnumber', '$rAmount', '$rIdurl', '$rEmail', '$rCcmask')";
$result = mysqli_query($connection, $query);
$query = "UPDATE usuario SET statusweb=21  WHERE  (correo = '$rEmail' and cuenta='$rReference')  ";
$result = mysqli_query($connection, $query);

 }else if($error == "FONDOS INSUFICIENTES")
                { ?>
                  <h4 class="h4">  <?php  echo $error;?> </h4>
                  <h1 class="h1">Da Click en la imagen para regresar a tu cuenta_</h1>
                  <a  class="a"  href="https://www.jumapac.gob.mx/ReciboPago.php" target="_blank"><img class="img" src="imagenes/DENEGADO POR EL EMISOR.png"> </a> 
         <?php   
$query = "INSERT INTO Respuesta3S (`Reference`, `Response`, `Foliocpagos`, `Auth`, `Cdresponse`, `Nberror`, `Ntime`, `Ndate`, `Nbcompany`, `Nbmerchant`, `Cctype`, `Tpoperation`, `Ccnumber`, `Amount`, `Idurl`, `Email`, `Ccmask`) VALUES ( '$rReference', '$rResponse', '$rFoliocpagos', '$rAuth', '$rCdresponse', '$rNberror', '$rNtime', '$rNdate', '$rNbcompany', '$rNbmerchant', '$rCctype', '$rTpoperation', '$rCcnumber', '$rAmount', '$rIdurl', '$rEmail', '$rCcmask')";
$result = mysqli_query($connection, $query);
$query = "UPDATE usuario SET statusweb=22  WHERE  (correo = '$rEmail' and cuenta='$rReference')  ";
$result = mysqli_query($connection, $query);

}else{ 

$query = "INSERT INTO Respuesta3S (`Reference`, `Response`, `Foliocpagos`, `Auth`, `Cdresponse`, `Nberror`, `Ntime`, `Ndate`, `Nbcompany`, `Nbmerchant`, `Cctype`, `Tpoperation`, `Ccnumber`, `Amount`, `Idurl`, `Email`, `Ccmask`) VALUES ( '$rReference', '$rResponse', '$rFoliocpagos', '$rAuth', '$rCdresponse', '$rNberror', '$rNtime', '$rNdate', '$rNbcompany', '$rNbmerchant', '$rCctype', '$rTpoperation', '$rCcnumber', '$rAmount', '$rIdurl', '$rEmail', '$rCcmask')";
$result = mysqli_query($connection, $query);
$query = "UPDATE usuario SET statusweb=23  WHERE  (correo = '$rEmail' and cuenta='$rReference')  ";
$result = mysqli_query($connection, $query);

?>   
             <h4 class="h4">  <?php  echo $cdrespuesta.$error;?> </h4>
             <h1 class="h1">Da Click en la imagen para regresar a tu cuenta</h1>
            <a class="a"  href="https://www.jumapac.gob.mx/ReciboPago.php" target="_blank"><img class="img" src="imagenes/DECLINADO.png"> </a>          
         <?php    

         }    
         }   
         
        
            
         
           
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
            $mail->FromName = 'JUMAPAC CortazarJTA';
            $mail->AddAddress($remail); // Agregue un receptor
            $mail->AddAddress('atencion_usuarios@jumapac.gob.mx'); // Este nombre es opcional.
    
            $mail->IsHTML(true); // Colocar formato de correo a HTML

            $mail->Subject = 'Pago En Linea '.$respuesta.' '.$roperacion ;
            $mail->Body    = '<strong>Pago en Linea: </strong>'.$rnbResponse.'<br>'.'<strong>Numero de Operacion: </strong>'.$roperacion.'<br>'.'<strong>Respuesta: </strong>'.$respuesta.' '.$cdrespuesta.' '.$error .'<br>'.'<strong>Banco: </strong>'.$rbanco.'<br>'.'<strong>Tipo de tarjeta: </strong>'. $rmarca.'<br>'.'<strong>'.$Respuestafiltro.'</strong> <br>';
            $mail->AltBody = 'Este es el cuerpo del mensaje para Clientes no-HTML';

            $mail->send();




      ?>
      
    </body>
    
    
</html>    