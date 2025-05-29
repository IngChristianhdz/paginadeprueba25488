<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_usuario = "sql5c75c.carrierzone.com";
$database_usuario = "ahig8449_jumapac_com";
$username_usuario = "jumapaccom214910";
$password_usuario = "ilai2692";
$usuario = mysql_pconnect($hostname_usuario, $username_usuario, $password_usuario) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
