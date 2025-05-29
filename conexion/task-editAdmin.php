<?php


include('database.php');
session_start();
//   if(!isset($_SESSION["Correo1S"])){
//      header("Location:cuenta.php");
//    }


header("Location: ../ReciboPago1.php");

if(isset($_POST['name'])) {  
   $correo1=$_SESSION["Correo1S"]; 
   $id = $_POST['name'];
   $id =str_pad($id, 6, "0", STR_PAD_LEFT);
   $pass = $_POST['description'];
   $pass1=substr($pass,0,5);
   $pass2=substr($pass,4,5);
   $pass2=str_pad($pass2, 5, "0", STR_PAD_LEFT);  
   $pass=$pass1.$pass2;

   // UPDATE usuario SET correo  ='$correo1'  WHERE  (reparto = '$pass' and cuenta='$id') 
    $query = " ";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query Error');     
     }  
              
}

?>