<!DOCTYPE html>
<html lang="es">
    <head>
        <title>JUMAPAC</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilo_menu.css">
        <link rel="stylesheet" href="css/estilo_banner.css">
        <link rel="stylesheet" href="css/estilo_piepag.css">
        <link rel="stylesheet" href="css/estilo_alta_usuario.css">		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		
       <script type="text/javascript" src="js/modernizr.custom.46884.js"/></script>
       
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
    
    <!--contenido-->
    <main>
    
    <!--banner-->        
        <section id="banner">
               <div class="contenedor">
                   <img id="logo" src="imagenes/encabezados/sistemadeatencionbanner.png" alt="">
               </div>
        </section>
  
         
    <section id="label_sup">
           <div class="contenedor">
             <h2> ALTA DE USUARIOS</h2>
           </div>
        
    </section>
    
    <!--contenido-->
     <section id="contenido">
         <div class="contenedor">
             <form id="mensaje" action="conexion/alta1.php" method="post" onsubmit="return aviso();">
                
                <span>Por favor introduce los datos solicitados</span>
                <div class="contenido">
                   <table>
                    <tr>
                        <td style="text-align: left"><label>Sexo</label></td>
                        <td>
                            <select id="cmbsexo"  name="cmbsexo" >
                              <option>Masculino</option>
                              <option>Femenino</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left"><label>Nombre</label></td><td><input type="text" id="txtnombre" name="txtnombre"  required></td>
                    </tr>
                    <tr>
                        <td style="text-align: left"><label>Domicilio</label></td><td><input type="text" id="txtdom" name="txtdom"  required></td>
                    </tr>
                    <tr>
                        <td style="text-align: left"><label>Ciudad</label></td><td><input type="text" id="txtciudad" name="txtciudad"  required></td>
                    </tr>
                    <tr>
                        <td style="text-align: left"><label>Estado</label></td>
                        <td>
                            <select id="cmbedo"  name="cmbedo" >
                              <option>AGUASCALIENTES</option>
                              <option>BAJA CALIFORNIA NORTE</option>
                              <option>BAJA CALIFORNIA SUR</option>
                              <option>CAMPECHE</option>
                              <option>CHIAPAS</option>
                              <option>CHIHUAHUA</option>
                              <option>COAHUILA</option>
                              <option>COLIMA</option>
                              <option>DISTRITO FEDERAL</option>
                              <option>DURANGO</option>    
                              <option>ESTADO DE MÉXICO</option>
                              <option>GUANAJUATO</option>
                              <option>GUERRERO</option>
                              <option>HIDALGO</option>
                              <option>JALISCO</option>
                              <option>MICHOACÁN</option>
                              <option>MORELOS</option>
                              <option>NAYARIT</option>
                              <option>NUEVO LEÓN</option>
                              <option>OAXACA</option>
                              <option>PUEBLA</option>
                              <option>QUERÉTARO</option>
                              <option>QUINTANA ROO</option>
                              <option>SAN LUIS POTOSÍ</option>
                              <option>SINALOA</option>
                              <option>SONORA</option>
                              <option>TABASCO</option>
                              <option>TAMAULIPAS</option>
                              <option>TLAXCALA</option>
                              <option>VERACRUZ</option>
                              <option>YUCATÁN</option>
                              <option>ZACATECAS</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="background: #2A1DC6"><label style="color: #fff">Su información de contacto</label></td>
                    </tr>
                    <tr>
                        <td style="text-align: left"><label>Celular</label></td><td><input type="text" id="txtcel" name="txtcel" required ></td>
                    </tr>
                    <tr>
                        <td style="text-align: left"><label>Teléfono</label></td><td><input type="text" id="txttel" name="txttel" required ></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="background: #2A1DC6"><label style="color: #fff">Datos para consultar recibo electrónico</label></td>
                    </tr>
                    
                    <tr>
                        <td style="text-align: left"><label>Numero de cuenta </label></td><td><input type="text" id="txtcuenta" name="txtcuenta" required></td>
                    </tr>

                    <tr>
                        <td style="text-align: left"><label>Reparto  </label></td><td><input type="text" id="txtreparto" name="txtreparto" required ></td>  <td>  <a class="icon-question" href="imagenes/Guia recibo.jpg" target="_blank"></a> </td>
                    </tr>

                       <tr>
                        <td style="text-align: left"><label>Email</label></td><td><input type="text" id="txtcorreo" name="txtcorreo" required></td>
                    </tr>
                    
                    <tr>
                        <td style="text-align: left"><label>Contraseña</label></td><td><input type="text" id="txtpass" name="txtpass" required ></td>
                    </tr>
                    <tr>
                        <td style="text-align: left"><label>Confirmar contraseña</label></td><td><input type="text" id="txtpass_conf" name="txtpass_conf" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="background: #2A1DC6"><label style="color: #fff">Información para recuperar contraseña</label></td>
                    </tr>
                    <tr>
                        <td style="text-align: left"><label>Pregunta secreta</label></td><td><input type="text" id="txtpregunta" name="txtpregunta" required></td>
                    </tr>
                    <tr>
                        <td style="text-align: left"><label>Respuesta</label></td><td><input type="text" id="txtrespuesta" name="txtrespuesta" required ></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" style="background: #2A1DC6"><label style="color: #fff">Terminos y condiciones </label></td>
                    </tr>

                    <tr>
                       <td style="text-align: right"><input type="checkbox" id="txtterminos" value="SI" required ></td> <td> <a  href="TérminosyCondiciones.pdf" target="_blank">Acepto Terminos </a> </td>
                    </tr>


                </table>    
                </div>
                <input name="enviar" type="submit" class="btn btn-primary" value="ENVIAR" id="enviar" >
	         </form>
	          <script>src="js/aviso.js"</script>
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