<?php
$server['ip']= "69.49.112.73";

$database_usuario = "ahig8449_jumapac_com";
$username_usuario = " jumapaccom214910";
$password_usuario = "ilai2692";
$connection = mysqli_connect(
   $server['ip'],
    $username_usuario,
    $password_usuario,
    $database_usuario 
);

if ($connection){
    echo "Database is connected";
}else{echo "Database is desconnected";}


echo $server['ip'];



?>