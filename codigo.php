<?php
  include "database.php";
  include "conexion/funciones.php"

  $email='paudanamore@gmail.com';
  $mysqli = new mysqli($server['ip'], $username_usuario  , $password_usuario , $database_usuario );
  if ($mysqli->connect_errno) {
      echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }

  $resultado = $mysqli->query( "SELECT * FROM alta  where correo='$email' ");
  $num_fila1=mysqli_num_rows($resultado);
 
  if($num_fila1 >0 ){
  
   
    $errors = array[];
    if(!empty($email)){
      $email=mysqli_real_escape_string($email['email']);
      if(!isEmail($email)){
         $errors[]="Debe ingresar un correo electronico valido";
       }
       if(emailExiste($email))
       {
         $user_id=getValor('id', 'correo', '$email');
         $nombre=getValor('nombre','correo', '$email');
         $token=generaTokenPassword($user_id);
         $url='Location: '.'https://www.jumapac.gob.mx/conexion'.'/cambia_pass.php?user_id='.$user_id.'&token='.$token;
         $asunto='Recuperar password';
         $cuerpo='Hola $nombre: <br/><br/> Se ha solicitado un reinicio de password. <br/><br/> Para restablecer el password, da click en <a href='url'>Cambiar password</a>';
         if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
            echo "Hemos enviado un correo electronico a la direccion $email para restablecer tu password.<br/>";
            echo "<a href='cuenta_nuevo.php'> Iniciar sesion </a>";
            exit;
         }else{
            $errors[]="Error al enviar el email";
         }
       }else{
            $errors[]="No existe el correo electronico"
       }
    } 
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        
    <title>JUMAPAC</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
        <link rel="shortcut icon" type="image/png" href="imagenes/LJ.png">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilo_index.css">
        <link rel="stylesheet" href="css/estilo_menu.css">
        <link rel="stylesheet" href="css/estilo_piepag.css">

    </head>
    
    <body>
      <h3> Restablecer Contraseña</h3> 
       <h4> Introduce el correo registrado</h4>
       <form id="restablecer" method="post" >
             <input type="email" id="email" placeholder="Correo">
             <input type="submit" class="btn-submit" value="Enviar">
       </form>
       <?php echo resultBlock($errors);?>
    <!--menu-->
  <header>
      
          <img class="logo" src="imagenes/logo_transparente.png" alt="" width="50px" height="50px">
          <input type="checkbox" id="btn-menu">
          <label class="icon-menu" for="btn-menu"></label>
          <nav class="menu">
              <ul>
                
                  <li><a href="index.html">INICIO</a></li>
                  <li class="submenu"><a href="cuenta_nuevo.php">PAGO</a>
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
      
    </body>
    
    
</html>