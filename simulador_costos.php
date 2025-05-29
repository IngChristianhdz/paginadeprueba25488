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
        <link rel="stylesheet" href="css/estilo_contenido.css">
        <link rel="stylesheet" href="css/estilo_piepag.css">
       

		
	</head>
	
	<?php require_once('conexion/facturacion.php'); ?>
<?php
$tarifa1=substr($tarifad,0,3);
mysql_select_db($database_usuario, $usuario);
$query = "SELECT * FROM tarifa  where clave=$tarifa1";
$fila= mysql_query($query, $usuario) or die(mysql_error());
$row = mysql_fetch_assoc($fila);
$totalRows = mysql_num_rows($fila);
?>
	
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
	
    <!--banner-->        
        <section id="banner">
               <div class="contenedor">
                   <img id="logo" src="imagenes/encabezados/banner_costosytarifas.png" alt="">
               </div>
        </section>  
    
    <!--contenido-->
    <main>

   
    <!--contenido-->
     <section id="contenido">
         <div class="contenedor">
             <h1><span>Tarifa <?php echo $tarifad ?></span></h1>
             <br>
             <br>
             <table width="947" border="1">
    	  <tr>
	  <td><strong>Fila</strong></td>
        	  <td colspan="12"  align="center" ><strong>Importe  correspondiente al mes de: </strong></td>

       </tr>

    <tr>
      <td width="72"><div align="center"><span>Consumo</span></div></td>
      <td width="72"><div align="center"><span>Enero</span></div></td>
	  <td width="72"><div align="center"><span>Febrero</span></div></td>
      <td width="72"><div align="center"><span>Marzo</span></div></td>
      <td width="72"><div align="center"><span>Abril</span></div></td>
      <td width="72"><div align="center"><span>Mayo</span></div></td>
      <td width="72"><div align="center"><span>Junio</span></div></td>
      <td width="72"><div align="center"><span>Julio</span></div></td>
      <td width="72"><div align="center"><span>Agosto</span></div></td>
      <td width="72"><div align="center"><span>Septiembre</span></div></td>
      <td width="72"><div align="center"><span>Octubre</span></div></td>
      <td width="72"><div align="center"><span>Noviembre</span></div></td>
      <td width="72"><div align="center"><span>Diciembre</span></div></td>
    </tr>
    <?php do { ?>
       <?php
	   $consumofijo=$row['consumo'];
	   $Dato=$consumofijo;
       if ($consumofijo==0) 
	   {	
         $Dato="Cuota Base";
	   } 
	 	
      ?>
    

    <tr>     
      
    
      <td  align="center"><?php echo $Dato;?></td> 
      
      
      <td align="right"><?php echo $row['ene']; ?></td> 
      <td align="right"><?php echo $row['feb']; ?></td> 
      <td align="right"><?php echo $row['mar']; ?></td> 
      <td align="right"><?php echo $row['abr']; ?></td> 
      <td align="right"><?php echo $row['may']; ?></td> 
      <td align="right"><?php echo $row['jun']; ?></td> 
      <td align="right"><?php echo $row['jul']; ?></td> 
      <td align="right"><?php echo $row['ago']; ?></td> 
      <td align="right"><?php echo $row['sep']; ?></td> 
      <td align="right"><?php echo $row['oct']; ?></td> 
      <td align="right"><?php echo $row['nov']; ?></td> 
      <td align="right"><?php echo $row['dic']; ?></td> 
    </tr>
    <?php } while ($row = mysql_fetch_assoc($fila)); ?>
	  <tr>
	  <td height="80" colspan="13"  align="center"><p><strong>En consumos Mayores a  100m3 se calcula el importe, al </strong><strong> </strong><strong>multiplicar los metros consumidos por el importe especificado en la fila 101.</strong></p></td>
       </tr>
    </table>
         </div>
     </section>
     
    </main>
    
   
	</body>
</html>	