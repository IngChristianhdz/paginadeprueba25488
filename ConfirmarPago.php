<!DOCTYPE html>
<html lang="es">
    <head>
        
        <title>Confirmar Pago</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
        <link rel="shortcut icon" type="image/png" href="imagenes/LJ.png">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilo_index.css">
        <link rel="stylesheet" href="css/estilo_piepag.css">
        <link rel="stylesheet" href="css/estilo_confirmarpago.css">
    </head>    

   <?php
    include "conexion/confirmar.php";   
    ?>            
            
    <body>
       
   <main>
       
      <header>
      
            </header>  


      </main>
      
      



     
     <section>
        
         <div class="div">
             <h1>Desglose de Servicios</h1>
           
       <table class="tabla">
        <tr>
          <th id="encabezado" height="48" colspan="2"  scope="col">Cuenta:&nbsp; &nbsp; <?php echo (1*$row['cuenta']);   ?> <br>          
           </th>
        </tr>
        
         <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="tabla" id="tr">Agua, Alcantarillado y Saneamiento</td>
          <td ><strong><?php echo $row['adeudo']; ?></strong></td>
        </tr>
         <tr>
          <td class="tabla" id="tr">Otros/Pago Vario</td>
          <td><strong><?php echo $row['adeudopagv']; ?></strong></td>
         </tr>
         <tr>   
          <td class="tabla" id="tr">Reinstalación</td>
          <td ><strong><?php echo $row['adeudopsus']; ?></strong></td>
         </tr>     
 		<tr>
          <td >&nbsp;</td>
          <td >&nbsp;</td>
        </tr>

         <tr >
          <td class="tabla" id="lineaT">Total a pagar:</td>
          <td class="tabla" id="lineaT2"><strong><?php echo  ($row['adeudo']+$row['adeudopagv']+$row['adeudopsus'])/1;
               mysqli_free_result($resultado);
      
              ?></strong></td>
          </tr>  
         <tr>
          <td ></td>
          <td></td>
        </tr>   
        <tr>
        <?php if ($suma>=1){ ?>
          <td class="boton" colspan="2"> 
             <a  id="a" href=<?php echo $web;?> target=""><img src="imagenes/CONFIRMARPAGO_NUEVO.png"> </a>
          </td>
<?php  }?>

        </tr>
     </table>
     </div>
     </section>

     <section id="enlaces_int">
       <div class= "enlaces">              
           <a href="TérminosyCondiciones.pdf" target="_blank"&nbsp;&nbsp;&nbsp;&nbsp;><img src="imagenes/ICONO_TERMINOSYCONDICIONES.png"> </a>  <a href="AVISO DE PRIVACIDAD PARA WEB.pdf" target="_blank"><img src="imagenes/ICONOAVISODEPRIVACIDAD.png"> </a> 
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