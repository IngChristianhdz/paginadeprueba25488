<?php

include ('database.php');

sleep(1);
if (isset($_POST)){
    $correo = $_POST['correo'];
    $valor = '0';
    
    $query = "SELECT * FROM registro  where Correo = '$correo'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query Error'. mysqli_error($connection)); 
    }
    else if ($result->num_rows > 0) {
       $valor = '1';
        echo '<div class="alert alert-danger"><strong>El correo ya esta registrado</strong> </div>';
        
    } else if($valor == 0){
        echo '<div class="alert alert-success"><img src="imagenes/palomaverde.jpg"</div>'; 
    }
}

?>