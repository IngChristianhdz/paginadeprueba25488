<?php
$server['ip']= "127.0.0.1";

$database_usuario = "pkkvmhzyzr";
$username_usuario = "pkkvmhzyzr";
$password_usuario = "wJbYZTCA8c";
$connection = mysqli_connect(
    $server['ip'],
    $username_usuario,
    $password_usuario,
    $database_usuario 
);
//if ($connection){
//    echo "Database is connected";
//}
?>