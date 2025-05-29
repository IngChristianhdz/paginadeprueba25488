<?php


include('database.php');





if(isset($_POST['id'])) {
   session_start();
  if(!isset($_SESSION["Correo1S"])){
     header("Location:cuenta.php");
   }
   $correo1=$_SESSION["Correo1S"]; 
   $id = $_POST['id'];
   
    $query = "UPDATE usuario SET correo  = '' WHERE (cuenta = '$id' and correo = '$correo1') ";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query Error');     
     }  
              
}

?>