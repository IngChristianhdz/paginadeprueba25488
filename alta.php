<!DOCTYPE html>
<html lang="es">
    <head>
        <title>JUMAPAC</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
         <link rel="shortcut icon" type="image/png" href="https://www.jumapac.gob.mx/imagenes/LJ.png">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilo_menu.css">
        <link rel="stylesheet" href="css/estilo_piepag.css">
        <link rel="stylesheet" href="css/estilo_banner.css">
        <link rel="stylesheet" href="css/estilo_contacto.css">
        <link rel="stylesheet" href="css/estilo_botones.css">
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		
		
	</head>
    

    <body>
    	<?php
        
include ("conexion/database.php");


$pass = $_POST['txtreparto'];

$cuenta = $_POST['txtcuenta'];
$correo = $_POST['txtcorreo'];

$cuenta =str_pad($cuenta, 6, "0", STR_PAD_LEFT);
$pass1=substr($pass,0,5);
$pass2=substr($pass,4,5);
$pass2=str_pad($pass2, 5, "0", STR_PAD_LEFT);  
$pass=$pass1.$pass2;
$contra=$_POST['txtpass'];
$sexo=$_POST['cmbsexo'];
$nombre=$_POST['txtnombre'];
$domicilio=$_POST['txtdom'];
$ciudad=$_POST['txtciudad'];
$estado=$_POST['cmbedo'];
$telefono=$_POST['txttel'];
$pregunta=$_POST['txtpregunta'];
$respuesta=$_POST['txtrespuesta'];
$terminos="SI";
$celular=$_POST['txtcel'];

if ($connection->connect_error) {
    die("Connection fallida: " . $conn->connect_error);

}else {

    $result =  mysqli_query($connection,"SELECT * FROM registro  where Correo = $correo");
    if (mysqli_num_rows($result) > 0) {
    
         header("Location:https://www.jumapac.gob.mx/aviso.html"); 
    
     }else {
            $sql="SELECT * FROM usuario  where (cuenta = $cuenta and reparto=$pass)"; 
            $result =  mysqli_query($connection,$sql);
           // $sql="SELECT * FROM usuario  where (cuenta = $cuenta and reparto=$pass and (correo= '' OR correo IS NULL))";
            if (mysqli_num_rows($result) > 0) {
                $sql="SELECT * FROM usuario  where (cuenta = $cuenta and reparto=$pass and (correo= '' OR correo IS NULL))";
                $result= mysqli_query($connection,$sql);
                if (mysqli_num_rows($result) > 0){
               
                        $sql = "UPDATE  usuario set correo='$correo' where cuenta='$cuenta'";
                        mysqli_query($connection, $sql);

                        $sql = "INSERT INTO registro (Correo, Contrasena, Sexo, Nombre, Domicilio, Ciudad, Estado, Telefono, Pregunta, Respuesta, Terminos,Celular) VALUES ('$correo', '$contra', '$sexo', '$nombre', '$domicilio', '$ciudad', '$estado', '$telefono', '$pregunta', '$respuesta', '$terminos','$celular')";
                        mysqli_query($connection, $sql);
                        session_start();
                        $_SESSION["Correo1S"]=$correo;
                        header("Location:https://www.jumapac.gob.mx/ReciboPago.php");
                }else {
                    header("Location:https://www.jumapac.gob.mx/aviso2.html");  
                }

           }else { 
                
                header("Location:https://www.jumapac.gob.mx/aviso3.html");  
                          
                } 
            
     }
    
}    
      

mysqli_close($connection);
                                    
   
?>

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
                   <img id="logo" src="imagenes/encabezados/13costosytarifas.png" alt="">
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