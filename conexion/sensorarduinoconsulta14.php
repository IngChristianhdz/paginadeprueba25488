<?php
include('database.php');
if ($connection->connect_error) {
    die("Connexion fallida: ". $conn->connect_error);
    } 
$query = "SELECT * FROM pozo10 order by fecha desc limit 1";
$result = $connection->query($query);
if (!$result) {
    echo "&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&". mysql_error();
    exit;
    }
$row = $result->fetch_array();
$horaab1 = trim($row[7]);
$horapb1 = trim($row[8]);
$horaab2 = trim($row[9]);
$horapb2 = trim($row[10]);
$horaab3 = trim($row[11]);
$horapb3 = trim($row[12]);
$lubrica = trim($row[15]);
$carcamo = trim($row[17]);
$tanque = trim($row[19]);
$dinamico = trim($row[21]);
$horaab11 = trim($row[24]);
$horapb11 = trim($row[25]);
$horaab21 = trim($row[26]);
$horapb21 = trim($row[27]);
$horaab31 = trim($row[28]);
$horapb31 = trim($row[29]);
$vEncNivel1 = trim($row[30]);
$vEncNivel2 = trim($row[31]);
$vEncNivel3 = trim($row[32]);
$vParNivel1 = trim($row[33]);
$vParNivel2 = trim($row[34]);
$vParNivel3 = trim($row[35]);
$vControlNivel1 = trim($row[36]);
$vControlNivel2 = trim($row[37]);
$vControlNivel3 = trim($row[38]);
$horaab1 =substr($horaab1,0,2)."_".substr($horaab1,3,2);
$horapb1 =substr($horapb1,0,2)."_".substr($horapb1,3,2);
$horaab2 =substr($horaab2,0,2)."_".substr($horaab2,3,2);
$horapb2 =substr($horapb2,0,2)."_".substr($horapb2,3,2);
$horaab3 =substr($horaab3,0,2)."_".substr($horaab3,3,2);
$horapb3 =substr($horapb3,0,2)."_".substr($horapb3,3,2);
$horaab11=substr($horaab11,0,2)."_".substr($horaab11,3,2);
$horapb11=substr($horapb11,0,2)."_".substr($horapb11,3,2);
$horaab21=substr($horaab21,0,2)."_".substr($horaab21,3,2);
$horapb21=substr($horapb21,0,2)."_".substr($horapb21,3,2);
$horaab31=substr($horaab31,0,2)."_".substr($horaab31,3,2);
$horapb31=substr($horapb31,0,2)."_".substr($horapb31,3,2);
echo "&&&".$horaab1."&".$horaab11."&".$horaab2."&".$horaab21."&".$horaab3."&".$horaab31."&".$horapb1."&".$horapb11."&".$horapb2."&".$horapb21."&".$horapb3."&".$horapb31."&".$lubrica."&".$carcamo."&".$tanque."&".$dinamico."&".$vEncNivel1."&".$vEncNivel2."&".$vEncNivel3."&".$vParNivel1."&".$vParNivel2."&".$vParNivel3."&".$vControlNivel1."&".$vControlNivel2."&".$vControlNivel3."&&&";
?>