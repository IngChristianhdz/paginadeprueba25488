<!DOCTYPE html>
<html lang="es">
    <head>
        <title>JUMAPAC</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      
        <link rel="shortcut icon" type="image/png" href="imagenes/LJ.png">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilo_menu.css">
        <link rel="stylesheet" href="css/estilo_piepag.css">
        <link rel="stylesheet" href="css/estilo_banner.css">
        <!--<link rel="stylesheet" href="css/estilo_contacto.css">
        <link rel="stylesheet" href="css/estilo_botones.css">
        <link rel="stylesheet" href="css/estilo_iconos.css">-->
        <link rel="stylesheet" href="css/cuenta.css">
       
     
        
        
    </head>
    
    <body>
    
    <!--contenido-->
    <main>
      
    
       <!--menu-->
    <header>
      
          <img class="logo" src="imagenes/logo_vedaelectoral.jpg" alt="" width="50px" height="50px">
          <input type="checkbox" id="btn-menu">
          <label class="icon-menu" for="btn-menu"></label>
          <nav class="menu">
              <ul>
                
                  <li><a href="index.html">INICIO</a></li>
                  <li class="submenu"><a href="cuenta.php">PAGO</a>
                  </li>
                  <li class="submenu"><a href="institucionalidad.html">¿QUIENES SOMOS?</a>
                  </li>
                  <li class="submenu"><a href="tramites_servicios.html">TRAMITES Y SERVICIOS</a>
                  </li>
                  <li class="submenu"><a href="cultura.html">CULTURA DEL AGUA</a>
                  </li>
                  <li class="submenu"><a href="saneamiento.html">SANEAMIENTO</a>
                  </li>
                  <li class="submenu"><a href="transparencia.html">TRANSPARENCIA</a>
                  </li>
              </ul>
          </nav>
    </header>       
    <!--banner-->        
        <section id="banner">
               <div class="contenedor">
                   <img id="logo" src="imagenes/encabezados/banner_pagoenlinea.png" alt="">
               </div>
           
        
            <h2>Ingrese el correo electrónico de su cuenta para restablecer la nueva contraseña</h2>
         
            <div class="container">
                <div class="regisFrm">
                    <form method="POST" >
                        <input type="email" name="email" id="email" placeholder="EMAIL" >
                        <div class="send-button">
                            <input type="submit" name="forgotSubmit" id="enviar" value="CONTINUAR">
                            <br>
                            <br>
                            <div id="resultado"></div>
                        </div>
                    </form>
                    <?php require ("conexion/correo.php"); ?>
                </div>
            </div>
 </section>     
   <script
              src="https://code.jquery.com/jquery-3.5.1.js"
              integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
              crossorigin="anonymous"></script>
    <script src="js/formcuenta.js"></script>        
         
<!--     botones-->
     <section id="botones">
          
        
      </section>
      
    </main>
    
  
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
        
    <script src="js/menu.js"></script>  
    </body>
</html> 