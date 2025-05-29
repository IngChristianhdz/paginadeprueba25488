<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Atencion Usuarios</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
         <link rel="shortcut icon" type="image/png" href="https://www.jumapac.gob.mx/imagenes/LJ.png">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilo_menu.css">
        <link rel="stylesheet" href="css/estilo_banner.css">
        <link rel="stylesheet" href="css/estilo_piepag.css">
        <link rel="stylesheet" href="css/estilo_contactonuevo.css">   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    
       <script type="text/javascript" src="js/modernizr.custom.46884.js"/></script>
       <script src="https://use.fontawesome.com/e0d1a70838.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
       
        <script src="js/menu.js"></script>
    
  </head>

<body>
  
   <!--menu-->
  <header>
      
          <img class="logo" src="imagenes/logo_transparente.png" alt="" width="50px" height="50px">
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
    
    <!--contenido-->
    <main>
    
    <!--banner-->        
        <section id="banner">
               <div class="contenedor">
                    <img id="logo" src="imagenes/encabezados/sistemadeatencionbanner.png" alt="">
               </div>
        </section>
  
         
    <section id="label_sup">
           <div class="formulario__titulo1">
             <h2> ATENCIÓN A USUARIOS</h2>
           </div>
        
    </section>
    
    <!--contenido-->
     <section id="contenido">
         <div class="contenedor">
       
             <form class="formulario" id="formulario" enctype="multipart/form-data"  method="post" >
             
                <div id="alert"> </div>
                <br>
                      
                <input type="text" class="formulario__input" id="name" name="nombre"  placeholder="NOMBRE" >
                
                <input type="text" class="formulario__input"  id="email" name="correo"  placeholder="CORREO" >

                <input type="tel" class="formulario__input" id="phone" name="telefono"  title="Introduce un numero de 10 digitos, ejem: ###-#######" placeholder="TELEFONO" >

                <input type="text" class="formulario__input" id="count" name="cuenta" title="Se encuentra en la parte superior izquierda de tu recibo" placeholder="NUMERO DE CUENTA" > <div id="result-cuenta"> </div>

                <div id="sex" >
                  ASUNTO: 
                  <select id="select2" name="select2" >
                      <option value="" disabled selected> Selecciona una opcion </option>
                      <option  id="sexo" value="femenino"> Reporte de Fuga </option>
                      <option  id="sexo" value="masculino"> Solicitud de informacion </option>
                      <option  id="sexo" value="masculino"> Agendar cita </option>
                      <option  id="sexo" value="masculino"> Denuncia ciudadana </option>
                   </select>
                 </div> 
                <label class="formulario__label">Comentario</label>
                <br>
                <textarea id="msj" name="msj" ></textarea>
                <br>
                <input class="adjuntos" type="file" name="archivo">
                <br>
                <div class="g-recaptcha" data-sitekey="6LfWJtAZAAAAAMSU8gSvrksga6DtTUeVW9zRLl9F"></div>
                <div id="result"></div>
                <input  class="formulario__submit" name="enviar" type="submit" id="enviar" >
                
                <?php include (conexion/captcha.php); ?>
                             
           </form>
            
             <script
              src="https://code.jquery.com/jquery-3.5.1.js"
              integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
              crossorigin="anonymous"></script>
            

         </div>
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