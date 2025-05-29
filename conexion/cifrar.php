<?php
include('AESCrypto.php');
include('database.php');

$password=$_POST['password'];


$query = "SELECT * FROM alta";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
$instanceENCRYPT = new AESCrypto();
$key = $row['token_password'];
$data0 = $row['token'];
$string = $password;
$cadenaEncriptada = $instanceENCRYPT->encriptar($string,$key);


//$sql = "UPDATE  alta SET password='$cadenaEncriptada'";
//$result =mysqli_query($connection, $sql);

?>