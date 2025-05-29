<?php
$server['ip']= "69.162.80.186";

$database_usuario = "jumapacg_pkkvmhzyzr";
$username_usuario = "jumapacg_pkkvmhzyzr";
$password_usuario = "wJbYZTCA8c";
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