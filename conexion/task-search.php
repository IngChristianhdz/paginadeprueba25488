<?php

    include('database.php');
    $search = $_POST['search'];
    session_start();
      if(!isset($_SESSION["Correo1S"])){
             header("Location:cuenta.php");
      }
      $correo1=$_SESSION["Correo1S"]; 
    if(!empty($search)) {
        $query = "SELECT * FROM usuario WHERE cuenta  like '%$search' ";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die('Query Error'. mysqli_error($connection));
        }
        $json = array();   
        while($row = mysqli_fetch_array($result)){           
            if($correo1==$row['correo'])
            {
                $json[]=array(  
                    'name' => $row['cuenta'],
                    'description' => $row['vence'],
                    'pagolinea' => $row['pagolinea'],
                    'id' => $row['id']
                );
            }
         }  
        $jsonstring = json_encode($json);
        echo $jsonstring;        
    }
?>