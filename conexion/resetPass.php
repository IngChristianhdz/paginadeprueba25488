<?php

include ('database.php');
  

	$correo=$_POST['correo'];
    $contra=$_POST['contra'];
    

	$query = "SELECT * FROM registro  where Correo = '$correo'";
	$result = mysqli_query($connection, $query); 
	 if(!$result){
                    die('Query Error'. mysqli_error($connection)); 
                }
                 else if ($result->num_rows > 0) {
                    $row= $result->fetch_assoc(); 
			    	$Solicitud=$row['password_request'];
			    	if($Solicitud == '1'){
                        $query = "UPDATE registro set Contrasena='$contra', password_request=0 where correo = '$correo'";
			            $result = mysqli_query($connection, $query);  
			            $result11="INSERT INTO `AccesoWeb` (`idAccesoWeb`, `correo`, `fecha`, `observacion`) VALUES (NULL, '$correo', CURRENT_TIMESTAMP, 'Cambio_Password')";
                        $result =  mysqli_query($connection ,$result11);
			        	}
                     echo '<div id="respuesta">No se ha solicitado reinicio de password </div>';
		   	 	}	

  
?>