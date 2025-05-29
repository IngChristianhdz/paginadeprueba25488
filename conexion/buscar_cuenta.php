<?php

include ('database.php');

sleep(1);
if (isset($_POST)){
    $cuenta = $_POST['cuenta'];
    $cuenta =str_pad($cuenta, 6, "0", STR_PAD_LEFT);
    
    $query = "SELECT * FROM usuario  where cuenta = '$cuenta'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query Error'. mysqli_error($connection)); 
    }
    else if ($result->num_rows > 0) {
        echo '<div class="alert alert-success"><img src="imagenes/palomaverde.jpg"</div>';        
    } else {
        echo '<div class="alert alert-danger"><strong>Numero de cuenta invalido</strong> </div>';
    }
}

?>