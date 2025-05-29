<!DOCTYPE html>
<html>
<head>
    <title>buscar</title>
</head>
<?php

include ('database.php');
$correo1  = htmlspecialchars($_GET["correo"],ENT_QUOTES);
$valor = '0';
    
    $query = "SELECT * FROM alta  where correo = '$correo1'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query Error'. mysqli_error($connection)); 
    }
    else if ($result->num_rows > 0) {
       $valor = '1';

    } else{
         echo '<div class="alert alert-danger"><strong>El correo no esta registrado</strong> </div>';
    }
}

?>
<body>
       <div class="alert alert-danger"></div>

</body>
</html>



