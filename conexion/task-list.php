<?php

    include('database.php');
    session_start();
      if(!isset($_SESSION["Correo1S"])){
             header("Location:cuenta.php");
      }
      $correo1=$_SESSION["Correo1S"]; 
    $query = "SELECT * FROM usuario WHERE correo = '$correo1' ";
    $result = mysqli_query($connection, $query);

    $json = array();    
    while($row = mysqli_fetch_array($result)){
          $suma=(($row['adeudo']+$row['adeudopagv']+$row['adeudopsus'])*1)-($row['pagoL']*1);
         $json[]=array(
         'vence' => $row['vence'].'',
         'total' => $suma,
         'estatus' => $row['pagolinea'].$row['pagol'],
         'id' => $row['cuenta'],
         'consumo' => $row['consumoh']
         );          
    } 
    $jsonstring = json_encode($json);
     echo $jsonstring; 

?>