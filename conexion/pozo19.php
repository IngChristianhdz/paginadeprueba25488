<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_usuario = "sql5c75c.carrierzone.com";
$database_usuario = "ahig8449_jumapac_com";
$username_usuario = "jumapaccom214910";
$password_usuario = "ilai2692";
$usuario = mysql_pconnect($hostname_usuario, $username_usuario, $password_usuario) or trigger_error(mysql_error(),E_USER_ERROR); 

$id  = htmlspecialchars($_GET["id"],ENT_QUOTES);
$nombre = htmlspecialchars($_GET["nombre"],ENT_QUOTES);
$valor = htmlspecialchars($_GET["valor"],ENT_QUOTES);

// Valida que esten presente todos los parametros
if (($usuario <>"E_USER_ERROR") ) {
	mysql_select_db($database_usuario) or die("Imposible abrir Base de datos");
	$sql = "insert into variable (fecha, id, nombre, valor) values (NOW(),'$id','$nombre','$valor')";
	mysql_query($sql);
}
?>