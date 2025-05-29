<?php

include ('database.php');

sleep(1);
if (isset($_POST)){
    $reparto = $_POST['reparto'];
    $pass1=substr($reparto,0,5);
    $pass2=substr($reparto,4,5);
    $pass2=str_pad($pass2, 5, "0", STR_PAD_LEFT);  
    $reparto=$pass1.$pass2;
    
    $query = "SELECT * FROM usuario  where reparto = '$reparto'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query Error'. mysqli_error($connection)); 
    }
    else if ($result->num_rows > 0) {
        echo '<div class="alert alert-success"><img src="imagenes/palomaverde.jpg"</div>';        
    } else {
        echo '<div class="alert alert-danger"><strong>Numero de reparto invalido</strong> </div>';
    }
}

?>