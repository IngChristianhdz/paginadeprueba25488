<?php

    include('database.php');
    // session_start();
    // header("Location:cuenta.php");
      
      // $correo1=$_SESSION["Correo1S"];       
      
      // $id = $_POST['id'];
      $id = '005533';
      // echo "Aqui nomas no cai nada"+ $id;
      $query = "SELECT * FROM usuario WHERE cuenta = $id";
    $result = mysqli_query($connection, $query);

    $json = array();

    while($row = mysqli_fetch_array($result)) {
     $suma=(($row['adeudo']+$row['adeudopagv']+$row['adeudopsus'])*1)-($row['pagoL']*1);
     $json[]=array(
     'vence' => $row['vence'].'',
     'total' => $suma,
     'estatus' => $row['pagolinea'].$row['pagol'],
     'id' => $row['cuenta'],
     'consumo' => $row['consumoh']
     );         
} 
$jsonstring = json_encode($json[0]);
 echo $jsonstring;      

?>