<?php
 $mysqli=new mysqli($connection);
 if (mysqli_connect_errno()){
 	echo 'conexion Fallida:', mysqli_connect_error();
 	exit;
 }
?>