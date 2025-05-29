<?php 
include '../ws/ordenes/config/conector.php';
$conn = conectar();

$sql = "SELECT *  FROM archivoslecturas";
$query = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($query);
?>