<?php

$server['ip']= "69.162.80.186";

$database_usuario = "jumapacg_pkkvmhzyzr";
$username_usuario = "jumapacg_pkkvmhzyzr";
$password_usuario = "wJbYZTCA8c";


$correo = $_POST['txtcorreo'];
$contra=$_POST['txtpass'];

$usuario = new mysqli($hostname_usuario, $username_usuario, $password_usuario, $database_usuario);
if ($usuario->connect_error) {
    die("Connection fallida: " . $conn->connect_error);

}else{


$result =  mysqli_query($usuario,"SELECT Correo, Contrasena FROM registro  where Correo = '$correo' AND Contrasena='$contra'" );
$sql="SELECT * FROM registro  where (Correo = '$correo' and Contrasena='$contra')" ;
echo $sql;
if (mysqli_num_rows($result) > 0) {
        
       $result =  mysqli_query($usuario,"SELECT * FROM usuario  where correo = '$correo' ");
    if (mysqli_num_rows($result) > 0) {

                echo "Si tiene Privilegios";
     }
    

     }else {
        

               echo "Error en usuario o Contraseña";     

     } 
} 
    
        

mysqli_close($usuario);




?>