
<?php
$servidor="127.0.0.1:3306";
$usuario='pkkvmhzyzr';
$contraseña='wJbYZTCA8c';
$basededatos='pkkvmhzyzr';

$conectar= mysqli_connect($servidor,$usuario,$contraseña,$basededatos,3306);
mysqli_set_charset($conector, "utf8");

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        
        <title>JUMAPAC</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
        <link rel="shortcut icon" type="image/png" href="https://www.jumapac.gob.mx/imagenes/LJ.png">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilo_iconos.css">
        <link rel="stylesheet" href="css/estilo_menu.css">
        <link rel="stylesheet" href="css/estilo_banner.css">
        <link rel="stylesheet" href="css/estilo_piepag.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

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
       
   <main>
       
        <!--banner-->        
        <section id="banner">
               <div class="contenedor" >
                <h1 style="margin: 0 auto;">"Lecturas"</H1>
                   <!-- <img id="logo" src="imagenes/encabezados/banner_transparencia.png" alt=""> -->
               </div>
        </section>
        
        <!-- iconos enlaces-->

    
        <div class="container">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin: 0 auto;">
  	
      <thead>
      <tr>
      <td><h2>Cuenta</H2></td>      
      <td><h2>Lectura Anterior</H2></td>
      <td><h2>Lectura Actual</H2></td>
      <td><h2>Fecha de Lectura</H2></td>            
      </tr>
      </thead>
      <tbody>
      <?php
      $sql="SELECT *  FROM lecturasweb";
      $result=mysqli_query($conectar,$sql);
      while($mostrar=mysqli_fetch_array($result)){
      ?>

      <tr>
        <td><?php echo $mostrar['Cuenta']?> </td>        
        <td><?php echo $mostrar['LecturaAnterior']?></td>
 	<td><?php echo $mostrar['LecturaActual']?></td>
 	<td><?php echo $mostrar['FechLecNueva']?></td>        
           
      <?php
      }
      ?>  
      </tr>
    </tbody>


</table>
 
    </div>
   </main>
      

<!--      
    //direccion  
      <section>
          <div class="direccion">
                  <p> Calzada Ing. Antonio Madrazo #600, Zona Centro, C.P. 38300 Cortazar Gto. </p>
                  <p>Tel: (411) 155-0050</p>
              </div>
      </section>
      
    // footer
      
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
     </footer> -->

     
      
    </body>
    
</html>