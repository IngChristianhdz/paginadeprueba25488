<?php

include ('database.php');

sleep(1);
if (isset($_POST)){
    $correo=$_POST['email'];
    $valor = '0';
   
    if(empty($correo)){
       echo '<div id="resultado"><strong>Introduce un correo</strong> </div>'; 
    }else if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
          echo '<div id="resultado"><strong>Introduce un correo valido</strong> </div>';
         }else{ 
                $query = "SELECT * FROM registro  where Correo = '$correo'";
                $result = mysqli_query($connection, $query);
                if(!$result){
                    die('Query Error'. mysqli_error($connection)); 
                }
                 else if ($result->num_rows > 0) {
                   $valor = '1';
                   require ("conexion/enviar.php");
                    
                } else if($valor == 0){
                    echo '<div id="resultado"><strong>No esta registrado el correo</strong> </div>'; 
                }
          }

}
?>