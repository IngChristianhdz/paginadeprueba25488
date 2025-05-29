<?php
    include('database.php');
//     session_start();
//     header("Location:ReciboPago1.php");
     //  if(!isset($_SESSION["Correo1S"])){
     //         
     //  }
     //  $correo1=$_SESSION["Correo1S"]; 
     
    $query = "SELECT * FROM Respuesta3S WHERE EMAIL= 'admin@admin.com' ORDER BY RESPUESTA3SCOL Desc limit 10 ";
    $result = mysqli_query($connection, $query);
    $json = array();    
    while($row = mysqli_fetch_array($result)){          
         $json[]=array(
         'respuesta' => $row['Respuesta3Scol'],
         'autoriza' => $row['Auth'],
         'estatus' => $row['Response'],
         'mensaje' => $row['Nberror']
         );          
    } 
    $jsonstring = json_encode($json);
     echo $jsonstring;
?>