<?php

session_start();
        if(!isset($_SESSION["Correo1S"])){
            header("Location:ReciboPago.php");
        }
$correo1 = $_SESSION[Correo1S];
$cuenta1  = htmlspecialchars($_GET["cuenta2"],ENT_QUOTES);
$web="conexion/Lineadepago.php?web3=".$cuenta1;
include "database.php";
$mysqli = new mysqli($server['ip'], $username_usuario  , $password_usuario , $database_usuario );
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$resultado = $mysqli->query( "SELECT * FROM usuario  where cuenta='$cuenta1' and correo='$correo1' ");
$num_fila1=mysqli_num_rows($resultado);


    if($num_fila1 >0 ){
      
 $num_fila1=0;
for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
    $resultado->data_seek($num_fila);
    $row= $resultado->fetch_assoc();
    $num_fila1=1;
    $suma=(($row['adeudo']+$row['adeudopagv']+$row['adeudopsus'])*1)-($row['pagoL']*1);
  
}}else {header("Location: ReciboPago.php"); 
    }


?>    