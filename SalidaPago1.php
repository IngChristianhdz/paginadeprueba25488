<!DOCTYPE html>
<html lang="es">
    <head>
        <title>JUMAPAC</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      
        <link rel="shortcut icon" type="image/png" href="https://jumapac.gob.mx/imagenes/LJ.png">
        <link rel="stylesheet" href="https://jumapac.gob.mx/css/fontello.css">
        <link rel="stylesheet" href="https://jumapac.gob.mx/css/estilo_menu.css">
        <link rel="stylesheet" href="https://jumapac.gob.mx/css/estilo_piepag.css">
        
                
    </head>
    
<?php
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

$rempresa  = htmlspecialchars($_GET["empresa"],ENT_QUOTES);
$rimporte  = htmlspecialchars($_GET["importe"],ENT_QUOTES);
$rreferencia  = htmlspecialchars($_GET["referencia"],ENT_QUOTES);
$rreferenciaPayment  = htmlspecialchars($_GET["referenciaPayment"],ENT_QUOTES);
$rnbMoneda  = htmlspecialchars($_GET["nbMoneda"],ENT_QUOTES);

$rcdEmpresa  = htmlspecialchars($_GET["cdEmpresa"],ENT_QUOTES);
$rurlTokenId  = htmlspecialchars($_GET["urlTokenId"],ENT_QUOTES);
$ridLiga  = htmlspecialchars($_GET["idLiga"],ENT_QUOTES);
$remail  = htmlspecialchars($_GET["email"],ENT_QUOTES);

?>

 <body>
        <?php
    
     
     ?>
         <div class="frame">
        <?php
           echo  substr($error,0,33); 
         if(isset($respuesta))  
         {
             if($respuesta == "Aprobado")
             {
               ?> 
         
                <a  href="" target=""><img src="imagenes/GRACIAS_POR_TU_PAGO.png"> </a> 
             
       <?php }else if(substr($error,0,33) == "La transaccion ya fue aprobada el")
             { ?>
                 
                <a  href="" target=""><img src="imagenes/DECLINADO.png"> </a> 
             
        <?php }else if ($error == "La tarjeta no pudo ser autenticada en 3DS."){  ?>
                 
                  <a  href="" target=""><img src="imagenes/ERROR.png"> </a> 
                 
         <?php }else if($error == "FONDOS INSUFICIENTES")
                { ?>
                 
                  <a  href="" target=""><img src="imagenes/DENEGADO POR EL EMISOR.png"> </a> 
         <?php   }
             
             
         }else{
              die('Query Error');  
         }
        
          ?>    
         </div>
    
	         
         
      
      
     <!-- direccion-->
      
      <section>
          <div class="direccion">
                  <p> Calzada Ing. Antonio Madrazo #600, Zona Centro, C.P. 38300 Cortazar Gto. </p>
                  <p>Tel: (411) 155-0050</p>
              </div>
      </section>
      
      <!-- pie de pagina-->
      
      <footer>
          <div>
              <div class="nombre">
                  <p>JUMAPAC CORTAZAR     
                  <a class="icon-facebook-squared" href="https://www.facebook.com/JuntaMunicipaldeAguaPotableyAlcantarillado/" target="_blank"></a>
                  <a class="icon-twitter-squared" href="https://twitter.com/jumapac" target="_blank"></a>
                  <a class="icon-instagram" href="https://www.instagram.com/jumapac_cortazar_/" target="_blank"></a>   
                  www.jumapac.gob.mx
                  </p>
              </div>
           </div>
     </footer>
      
    </body>
    
    
</html>    