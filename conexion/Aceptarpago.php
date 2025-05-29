<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Aceptar Pago</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      
        <link rel="shortcut icon" type="image/png" href="https://jumapac.gob.mx/imagenes/LJ.png">
        <link rel="stylesheet" href="https://jumapac.gob.mx/css/estilo_piepag.css">
        
                
    </head>
    
    <?php        
      $mostrar=$_GET["mostrar"];   
     ?>
     
    
    <body>        
         <div class="frame">                           
        <iframe  
          src= "<?php echo $mostrar ?>"
          width="320px" 
          height="700px" 
          frameborder="0" 
          scrolling="no"
          seamless="seamless">  
        </iframe>   
              
         </div>
    
	         
         
      
     
      
    </body>
    
    
</html>