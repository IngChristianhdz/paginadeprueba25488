<!DOCTYPE html>
<html lang="es">
    <head>
        <title>JUMAPAC</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilo_menu.css">
        <link rel="stylesheet" href="css/estilo_piepag.css">
        <link rel="stylesheet" href="css/estilo_banner.css">
        <link rel="stylesheet" href="css/estilo_contacto.css">
        <link rel="stylesheet" href="css/estilo_botones.css">
        <link rel="stylesheet" href="css/estilo_iconos.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		
		
	</head>
     <?php  
    
        session_start();
        if(!isset($_SESSION["Correo1S"])){
           header("Location:cuenta.php");
        }
        
        $server['ip']= "127.0.0.1";
        $database_usuario = "pkkvmhzyzr";
        $username_usuario = "pkkvmhzyzr";
        $password_usuario = "wJbYZTCA8c";
    
        $correo1 = $_SESSION[Correo1S];
        $mysqli = new mysqli($server['ip'], $username_usuario  , $password_usuario , $database_usuario );

        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }  
    
    
    
    
        $conector=0;
        
              
        $resultado =  mysqli_query($mysqli,"SELECT Correo, Contrasena, Nombre FROM registro  where Correo = '$correo1'" );
       
         if (mysqli_num_rows($resultado) > 0) {
            $row= $resultado->fetch_assoc();  
            $nombre=$row['Nombre'];        
            $resultado =  mysqli_query($mysqli,"SELECT * FROM usuario  where correo = '$correo1'");
            if (mysqli_num_rows($resultado) > 0) {               
                $conector=1;     
             }


             }else {


                    require_once('ConfirmarPago.php'); 
                    
                   
             } 
         



    ?>

	
    <body>
	
	<!--contenido-->
    <main>
    
 	   <!--menu-->
	<header>
      
          <img class="logo" src="imagenes/logo_transparente.png" alt="" width="50px" height="50px">
          <input type="checkbox" id="btn-menu">
          <label class="icon-menu" for="btn-menu"></label>
          <nav class="menu">
              <ul>
                
                  <li><a href="index.html">INICIO</a></li>
                  <li class="submenu"><a href="cuenta.html">PAGO</a>
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
                   <img id="logo" src="imagenes/encabezados/13costosytarifas.png" alt="">
               </div>
            </section>
   
        
       <section id="label_sup">
           <div class="contenedor">
             <h2> PAGO EN LINEA</h2>
           </div>
        
    </section>
   
    <!--contenido-->
     <section id="label_sup">
         <div class="contenedor">
     
     <!--contenido-->
    <!-- <section id="contenido">-->
         <!-- <div class="contenedor">-->
             <h1>Servicios registrados a este correo</h1>
             <br>
             <br> 
             
              <link rel="stylesheet" href="css/tabla.css"> 
              <div class="centrartabla">
                <table>
                <colgroup>
                  <col span="5" style="width: 10%;">              
                </colgroup>
                <thead>
                  <tr>
                    <th ALIGN=left colspan="5">NOMBRE:    <?php echo $nombre?></th>
                  </tr>
                  <tr>
                    <th ALIGN=left colspan="5">CORREO:     <?php echo $correo1?></th>
                  </tr>  
                </thead>
                <tbody>
                  <tr>
                    <th scope="col"> CUENTA </th>
                    <th scope="col"> VENCIMIENTO </th>
                    <th scope="col"> TOTAL A PAGAR </th>
                    <th scope="col"> ESTATUS </th>
                    <th scope="col"> PAGAR </th>
                  </tr>
                  <?php 
                  if($conector=1){
                  	  $num_fila1=0;
                     
                for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
                    
                    $resultado->data_seek($num_fila);
                    $row= $resultado->fetch_assoc();
                    if($num_fila ==0){
                       $cuenta2=$row['cuenta'];
                        }  



                    $num_fila1=1;
  
                ?>
                  <tr>
                    <td ALIGN=center><?php echo $row['cuenta'];$cuenta3=$row['cuenta']; ?>
                    
                      </td>
                    <td ALIGN=center><?php echo $row['vence'];?></td>
                    <td ALIGN=right><?php echo $row['adeudo']+$row['adeudopagv']+$row['adeudopsus'];?></td>
                    <td ALIGN=right><?php echo $row['pagolinea'];
                       
                        ?></td>
                    <td ALIGN=center>
                    <?php
                    echo "<a href='ConfirmarPago.php?cuenta2=".$cuenta3." '>Realizar Pago  </a>";
                   echo "<a href='GeneraXML.php?cuenta2=".$cuenta3." '>  XML  </a>";
                    ?>                  
                    
                    </td>
                  </tr>
                 <?php }  } 
                    
                    
                    mysqli_free_result($resultado);
                    
                    ?> 
                </tbody>

               </table>
           </div>
       
     </div>
     </section>
     <section id="enlaces_int">
       <div class= "enlaces">              
           <a href="TérminosyCondiciones.pdf" target="_blank"&nbsp;&nbsp;&nbsp;&nbsp;><img src="imagenes/ICONO_TERMINOSYCONDICIONES.png"> </a>  <a href="" target="_blank"><img src="imagenes/ICONOAVISODEPRIVACIDAD.png"> </a> 
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