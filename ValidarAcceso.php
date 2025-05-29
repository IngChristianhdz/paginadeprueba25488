<!DOCTYPE html>
<html lang="es">
    <head>
        <title>JUMAPAC</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	</head>
        <body>
     <?php    
        include('conexion/database.php');
        $correo = $_POST['txtcorreo'];
        $contra = $_POST['txtpass'];

        $usuario = new mysqli($hostname_usuario, $username_usuario, $password_usuario, $database_usuario);
        $conector=0;
        if ($usuario->connect_error) {
            die("Connection fallida: " . $conn->connect_error);

        }else{
              

        $result =  mysqli_query($usuario,"SELECT Correo, Contrasena, Nombre, Perfil FROM registro  where Correo = '$correo' AND Contrasena='$contra'" );

        $perfil=$row['Perfil'];       


         if (mysqli_num_rows($result) > 0|| $perfil == 'User') {
            $row= $result->fetch_assoc();  
            $nombre=$row['Nombre'];        
            $result =  mysqli_query($usuario,"SELECT * FROM usuario  where correo = '$correo' ");
            if (mysqli_num_rows($result) > 0) {   
                if(!isset( $_SESSION['Correo1S'])){
                    $result11="INSERT INTO `AccesoWeb` (`idAccesoWeb`, `correo`, `fecha`, `observacion`) VALUES (NULL, '$correo', CURRENT_TIMESTAMP, 'Acceso_Valido')";
                    $result =  mysqli_query($connection ,$result11);
                  }            
                session_start();
                $_SESSION["Correo1S"]=$correo;



                header("location:ReciboPago.php") ;
             }


             }else if ($correo== 'admin@admin.com') {
                
                 $row= $result->fetch_assoc();  
                //  $idUser = $_POST['name'];
                //  echo $idUser;
                //  echo("<script>console.log('PHP: " . $idUser . "');</script>");
                    
                 $result =  mysqli_query($usuario,"SELECT * FROM usuario  where id = '$id' ");
                // if (mysqli_num_rows($result) > 0) {   
                //     if(!isset( $_SESSION['Correo1S'])){
                //         $result11="INSERT INTO `AccesoWeb` (`idAccesoWeb`, `correo`, `fecha`, `observacion`) VALUES (NULL, '$correo', CURRENT_TIMESTAMP, 'Acceso_Valido')";
                //         $result =  mysqli_query($connection ,$result11);
                //       }            
                     session_start();
                //   $_SESSION["Correo1S"]=$correo;    
                     header("location:ReciboPago1.php") ;
                //  }
    
    
                 }else {     
                    if(!isset( $_SESSION['Correo1S'])){
                    $result11="INSERT INTO `AccesoWeb` (`idAccesoWeb`, `correo`, `fecha`, `observacion`) VALUES (NULL, '$correo', CURRENT_TIMESTAMP, 'Error_Invalido')";
                    $result =  mysqli_query($connection ,$result11);
                  }
                  header("location:cuenta.php") ; } 
        } 



        mysqli_close($usuario);
    ?>

	

	    
  
	
	</body>
</html>	