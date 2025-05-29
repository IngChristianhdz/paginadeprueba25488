<!DOCTYPE html>
<html lang="es">
    <head>
        <title>JUMAPAC</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilo_principal.css">
        <link rel="stylesheet" href="css/estilo_menu.css">
       
        		
		<script type="text/javascript" src="js/modernizr.custom.46884.js"/></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.slicebox.js"></script>
        <script src="js/menu.js"></script>
		
	</head>

	
<?php require_once('conexion/usuario.php'); ?>
<?php
$pass=$_POST['pass1'];
$cuenta =$_POST['cuenta1'];
$cuenta =str_pad($cuenta, 6, "0", STR_PAD_LEFT);
$pass1=substr($pass,0,5);
$pass2=substr($pass,4,5);
$pass2=str_pad($pass2, 5, "0", STR_PAD_LEFT);  
$pass=$pass1.$pass2;

$mysqli = new mysqli($server['ip'], $username_usuario  , $password_usuario , $database_usuario );
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$resultado = $mysqli->query( "SELECT * FROM usuario  where cuenta=$cuenta and reparto=$pass");

 $num_fila1=0;
for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
    $resultado->data_seek($num_fila);
    $row= $resultado->fetch_assoc();
    $num_fila1=1;
  
}


?>
	
	<body>
	
	<!--menu-->
	<header>
         <h1>JUMAPAC</h1>
          <input type="checkbox" id="btn-menu">
                <label class="icon-menu-outline" for="btn-menu"></label>
          <nav class="menu">
              <ul>
                  <li><a href="index.html">Inicio<span class="icon-home"></span></a></li>
                  <li class="submenu"><a href="#">¿Quiénes somos?<span class="icon-down-open"></span></a>
                  <ul>
                      <li><a href="21_consejo.html">Consejo Directivo</a></li>
                      <li><a href="22_mvv.html">Misión, Visión y Valores</a></li>
                      <li><a href="23_historia.html">Historia</a></li>
<!--                      <li><a href="#">Organigrama</a></li>-->
                  </ul>
                  </li>
                  <li class="submenu"><a href="#">Infraestructura <span class="icon-down-open"></span></a>
                   <ul>
                      <li><a href="31_aguapotable.html">Agua Potable</a></li>
                      <li><a href="32_alcantarillado.html">Alcantarillado</a></li>
                      <li><a href="33_pozos.html">Pozos</a></li>
                      <li><a href="34_tanq_almac.html">Tanques de Almacenamiento</a></li>
                      <li><a href="35_instrumentacion.html">Instrumentación</a></li>
                      <li><a href="36_taller_medidores.html">Área de medidores</a></li>
                  </ul>
                  </li>
                  <li class="submenu"><a href="#">Tramites y servicios <span class="icon-down-open"></span></a>
                   <ul>
                      <li><a href="41_servicios_op.html">Servicios Operativos</a></li>
                      <li><a href="42_servicios_admin.html">Servicios Administrativos</a></li>
                      <li><a href="43_costos.html">Costos y tarifas</a></li>
                      <li><a href="44_tarifa_pref.html">Tarifa Preferencial</a></li>
                      <li><a href="45_conozca_med.html">Conozca su Medidor y Lectura</a></li>
                  </ul>
                  </li>
                  <li class="submenu"><a href="#">Cultura del agua <span class="icon-down-open"></span></a>
                   <ul>
                      <li><a href="51_buenos_usos.html">Buenos Usos y Cuidados</a></li>
                      <li><a href="52_vigilantes_agua.html">Vigilantes del Agua</a></li>
                      <li><a href="53_importancia_agua.html">Importancia del Agua</a></li>
                      <li><a href="54_conoce_mas.html">Conoce más</a></li>
                      <li><a href="55_multimedia.html">Multimedia</a></li>
                  </ul>
                  </li>
                  <li class="submenu"><a href="#">Proyectos <span class="icon-down-open"></span></a>
                   <ul>
                      <li><a href="61_menu_proyectos.html">Proyectos</a></li>
                  </ul>
                  </li>
                  <li class="submenu"><a href="#">Saneamiento <span class="icon-down-open"></span></a>
                   <ul>
                      <li><a href="71_saneamiento.html">¿Qué es el Saneamiento?</a></li>
                      <li><a href="72_planta_dmerino.html">Planta Dren Merino</a></li>
                      <li><a href="73_planta_insurgentes.html">Planta Insurgentes</a></li>
                  </ul>
                  </li>
                  <li class="submenu"><a href="#">Transparencia <span class="icon-down-open"></span></a>
                   <ul>
                      <li><a href="81_Qjumapac.html">¿Qué es la JUMAPAC?</a></li>
                      <li><a href="82_cuenta_Publica.html">Cuenta Pública</a></li>
                      <li><a href="83_Transparencia_Publica.html">Ley de Transparencia</a></li>
                  </ul>
                  </li>
              </ul>
          </nav>
    </header>
    
    <!--contenido-->
    <main>
    
    <!--banner-->        
        <section id="banner">
               <div class="contenedor">
                <img id="logo" src="imagenes/logo_transparente.png" >
                <img id="texto" src="imagenes/texto_jumapac.png" >   
               </div>
            </section>
            
    <!--saludo-->
        <section id="bienvenidos">
               <div class="contenedor">
                
                <p>Todos somos agua, cuidala como a ti mismo</p>   
               </div>
            </section>
   
    <!--contenido-->
     <section id="contenido">
        
         <div class="contenedor">
             <h1>Consulta de Recibo</h1>
             <br>
             <br>
             <h3> Tu Recibo Vence el <?php echo $row['vence']; ?></h3>
             <br>
             <table border="0" cellspacing="0">
        <tr>
          <th height="38" colspan="2"  scope="col">Cuenta num   <?php echo $cuenta;  if($num_fila1 ==0){
        echo " Error en la contraseña";
    exit;
    }  ?>  
         
           <strong><?php echo $row['giro']; ?></strong></th>
        </tr>
        <tr>
          <td width="134" height="44" >Tarifa <strong><?php echo $row['tarifa']?></strong> </td>
          <td width="184"><strong><?php echo $row['detatar']; ?></strong></td>
          </tr>
        <tr>
          <td>Medidor <strong><?php echo $row['medidor']; ?></strong> </td>
          <td >Consumo <strong><?php echo $row['consumo']; ?></strong></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Servicio de Agua, Alcantarillado y Saneamiento</td>
          <td><strong><?php echo $row['adeudo']+$row['pago']; ?></strong></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td ></td>
          </tr>
         <tr>
           <td>Pago Vario</td>
          <td><strong><?php echo $row['adeudopagv']; ?></strong></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td >&nbsp;</td>
        </tr>
        <tr>
          <td>Reinstalación</td>
          <td><strong><?php echo $row['adeudopsus']; ?></strong></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td >&nbsp;</td>
        </tr>  
        <tr>
          <td>Adeudo Total</td>
          <td><strong><?php echo $row['adeudo']+$row['adeudopagv']+$row['adeudopsus']; ?></strong></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td >&nbsp;</td>
        </tr>         
        <tr>
          <td>Fecha de pago</td>
          <td><strong><?php echo $row['fechap']; ?></strong></td>
          </tr>
         <tr>
          <td>&nbsp;</td>
          <td >&nbsp;</td>
        </tr>         
        <tr>
          <td>Convenio de Servicios</td>
          <td><strong><?php echo $row['adeudopags']; ?></strong></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td >&nbsp;</td>
        </tr>
        <tr>
          <td>Incidente</td>
          <td><strong><?php echo $row['incidente']; ?></strong></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="52" colspan="2" align="center">Tu Servicio se Encuentra <strong><?php echo $row['status']; ?></strong></td>
          </tr>
        <tr>
          <td height="32" colspan="2" align="center" >Actualizado el <strong><?php echo $row['actual'];    



?></strong></td>
          </tr>
            
      </table>
         </div>
     </section>
     
    </main>
    
    <!--barra redes sociales-->      
    <div class="social">
		<ul>
		    <li><a href="https://www.facebook.com/Jumapac-Cortazar-1138339249539170/" target="_blank"><img src="imagenes/redes_soc/Facebook.png"  class="facebook" border="0"></a></li>
			<li><a href="https://www.youtube.com/channel/UCQXxeCskTbCkv8vNwsBJzAA" ><img src="imagenes/redes_soc/YouTube.png" class="youtube"></a></li>
			<li><a href="#"><img src="imagenes/redes_soc/Instagram.png" class="instagram"></a></li>
			<li><a href="contacto.html"><img src="imagenes/redes_soc/Correo.jpg" class="correo"></a></li>
		</ul>
	</div>
	
	<!--pie de pagina-->
    <footer>
          <div class="contenedor">
             <div class="sociales">
                  <a class="icon-facebook-squared" href="https://www.facebook.com/Jumapac-Cortazar-1138339249539170/" target="_blank"></a>
                  <a class="icon-youtube-squared" href="https://www.youtube.com/channel/UCQXxeCskTbCkv8vNwsBJzAA"></a>
                  <a class="icon-instagram" href="#"></a>
                  <a class="icon-mail" href="contacto.html"></a>
              </div>
              
              <br>
              
              <div class="direccion">
                  <BR>
                  <p>JUMAPAC &copy; 2016 <br> Calzada Ing. Antonio Madrazo #600, Zona Centro, C.P. 38300 <br>Cortazar Gto. <br>Tel: (411) 155-0050, 155-1075 y 155-2399</p>
              </div>
              
              <div class="container">
				    <div class="carta">
                        <div class="lado frente">                          <br>
                            <p>Pasa el mouse aqui para ver el mapa de ubicaci&Atilde;&sup3;n</p>
                            
                            <img src="imagenes/logo_transparente.png" width"50%" height="50%" alt="">
                        </div>
                        <div class="lado atras">
                            <iframe src="https://www.google.com/maps/d/embed?mid=1k6ccbCadAfDJWhBDyuedRGeY2gc"></iframe>
                        </div>
				    </div>
		        </div>
             
              <br>
              <!-- relog -->
               <div>
                  <script type="text/javascript" src="http://www.24webclock.com/clock24.js"></script>
                  <table border="0"  cellspacing=1 cellpadding=3 class="clock24st" style="line-height:14px; padding:2;">
                    <tr>
                        <td  class="clock24std" style="font-family:arial; font-size:1.5em;"><strong><span class="clock24s" id="clock24_91220" style="color:#000;">reloj html</span></strong> 
                        </td>
                    </tr>
                  </table>
                  <script type="text/javascript">
                    var clock24_91220 = new clock24('91220',-360,'%dd / %M / %yyyy %W %hh:%nn:%ss','es');
                    clock24_91220.daylight('MX'); clock24_91220.refresh();
                  </script>
               </div>
          </div>
          
          <!--enlaces-->  
            
         <section id="enlaces">
             
              <h3>Visita</h3>
               <div class="contenedor">
                  <div class="enlaces-externos">
                      <a href="http://agua.guanajuato.gob.mx"><img src="imagenes/enlaces/ceag.jpg"></a>
                      <h4>CEAG</h4>
                  </div>
                  <div class="enlaces-externos">
                      <a href="http://www.cna.gob.mx"><img src="imagenes/enlaces/conagua.jpg"></a>
                      <h4>CONAGUA</h4>
                  </div>
                  <div class="enlaces-externos">
                      <a href="http://www.guanajuato.gob.mx"><img src="imagenes/enlaces/gob_edo.png"></a>
                      <h4>GOBIERNO <br>DEL ESTADO</h4>
                  </div>
                  <div class="enlaces-externos">
                      <a href="http://www.cortazar.gob.mx"><img src="imagenes/enlaces/logocortazar.png"></a>
                      <h4>PRESIDENCIA <br>MUNICIPAL</h4>
                  </div>
                  <div class="enlaces-externos">
                      <a href="http://www.imta.gob.mx"><img src="imagenes/enlaces/imta.png"></a>
                      <h4>IMTA</h4>
                  </div>
                  <div class="enlaces-externos">
                      <a href="http://inicio.ifai.org.mx/SitePages/ifai.aspx"><img src="imagenes/enlaces/inai.png"></a>
                      <h4>INAI</h4>
                  </div>
                  <div class="enlaces-externos">
                      <a href="http://www.gob.mx/semarnat"><img src="imagenes/enlaces/semarnat.jpg"></a>
                      <h4>SEMARNAT</h4>
                  </div>
               </div>
                          
            </section>
        </footer>
	<script src="js/menu.js"></script>	
	</body>
</html>	