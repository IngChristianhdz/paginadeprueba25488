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
       
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		
		
	</head>
    
   	<body>
	
	<!--contenido-->
    <main>
    <style>
:root{
 --Color-back: coral;
}
.formulario{
    width: 500px;
    max-width: 100%;
    margin: auto;
    margin-top: 30 px;
    padding: 40px;
    box-shadow: 0 0 20px 1px var(--Color-back);
    position: relative;
}

.formulario__titulo{
    text-align: center;
    margin-top: 0;
    color: var(--Color-back);
}
.formulario__submit{
    background:var(--Color-back);
    color: white;
    padding: 10px 20px;
    cursor: pointer;
    border: none;
}
/* #enlaces_int .enlaces img:hover{
    background: var(--Color-back);
    border: 2px solid rgba(32,106,199,0.7);
    border-radius: 10px 10px 10px 10px;
} */
.formulario__label{
    padding-left:15px;
    position: absolute;
    margin-top: -85px;
    z-index: -20;
    color: rgba(255,127,80,0.5);
    transition: all 0.2s;
}
.formulario__input:focus{
    outline: 1px solid rgba(255,127,80,0.7);
}
.formulario__input{
    padding: 20px;
    background:rgba(255,127,80,0.1);
    border: 1px solid rgba(255,127,80,0.3);
    margin-bottom: 40px;
}
.footer{
    background: var(--Color-back);
}
.password{
    color:var(--Color-back);

}

    </style>
      
    
 	   <!--menu-->
	<header>
      
    <img class="logo" src="imagenes/logo_transparente2.png" alt="" width="150px" height="150px">
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
                   <img id="logo" src="imagenes/encabezados/banner_pagoenlinea2.png" alt="">
               </div>
        
             <script src="js/validar.js" ></script>
         
             <form  class="formulario" action="ValidarAcceso.php" method="post" onsubmit="return validar()">
                <h1 style=" color: var(--Color-back); " class="formulario__titulo"> PAGO EN LÍNEA </h1>       <br>    
                <br>
                <input class="formulario__input" type="email" id="txtcorreo" name="txtcorreo" required>
                <label for="" class="formulario__label" > Correo </label>
                <input  class="formulario__input" type="password" id="txtpass" name="txtpass" required>
                <label for="" class="formulario__label">Contraseña</label>
                <input  class="formulario__submit" type="submit" value="ACCESAR">
                <br>
                 <a id="password" class="password"  href="forgotPassword.php"> ¿Olvidaste tu contraseña?</a> <br>
                 <a id="password" class="password"  href="pagolinea.html"> TUTORIAL para realizar tu pago en linea</a>
                 <p id="p"> Registrate &nbsp; <a id="link" class="password" href="form_alta_user_nuevo.html"> Aquí</a></p>
            </form>
       
   </section>
    <script src="js/formcuenta.js"></script>          
    <section id="enlaces_int">
       <div class= "enlaces">              
           <a href="TérminosyCondiciones.pdf" target="_blank"><img src="imagenes/ICONO_TERMINOSYCONDICIONES.png"> </a>  <a href="AVISO DE PRIVACIDAD PARA WEB.pdf" target="_blank"><img src="imagenes/ICONOAVISODEPRIVACIDAD.png"> </a> 
        </div> 
   
      </section>     
        
         
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
      
      <footer class="footer">
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