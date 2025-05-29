<?php
include('database.php');

$vid  = htmlspecialchars($_GET["id"],ENT_QUOTES);
$vnombre = htmlspecialchars($_GET["nombre"],ENT_QUOTES);
$vvalor = htmlspecialchars($_GET["valor"],ENT_QUOTES);
$vstatusb1 = htmlspecialchars($_GET["statusb1"],ENT_QUOTES);
$vstatusb2 = htmlspecialchars($_GET["statusb2"],ENT_QUOTES);
$vstatusb3 = htmlspecialchars($_GET["statusb3"],ENT_QUOTES);

$vhoraab10 =  htmlspecialchars($_GET["horaab10"],ENT_QUOTES);
$vhoraab11 = htmlspecialchars($_GET["horaab11"],ENT_QUOTES);

$vhoraab20 =  htmlspecialchars($_GET["horaab20"],ENT_QUOTES);
$vhoraab21 = htmlspecialchars($_GET["horaab21"],ENT_QUOTES);

$vhoraab30 =  htmlspecialchars($_GET["horaab30"],ENT_QUOTES);
$vhoraab31 = htmlspecialchars($_GET["horaab31"],ENT_QUOTES);


$vhorapb10 =  htmlspecialchars($_GET["horapb10"],ENT_QUOTES);
$vhorapb11 = htmlspecialchars($_GET["horapb11"],ENT_QUOTES);

$vhorapb20 =  htmlspecialchars($_GET["horapb20"],ENT_QUOTES);
$vhorapb21 = htmlspecialchars($_GET["horapb21"],ENT_QUOTES);

$vhorapb30 =  htmlspecialchars($_GET["horapb30"],ENT_QUOTES);
$vhorapb31 = htmlspecialchars($_GET["horapb31"],ENT_QUOTES);

$vvig = htmlspecialchars($_GET["vig"],ENT_QUOTES);
$vlubrica = htmlspecialchars($_GET["lubrica"],ENT_QUOTES);
$vlubricado = htmlspecialchars($_GET["lubricado"],ENT_QUOTES);
$vTanque = htmlspecialchars($_GET["Tanque"],ENT_QUOTES);
$vNivelTanque = htmlspecialchars($_GET["NivelTanque"],ENT_QUOTES);

$vCarcamo = htmlspecialchars($_GET["Carcamo"],ENT_QUOTES);
$vNivelCarcamo = htmlspecialchars($_GET["NivelCarcamo"],ENT_QUOTES);

$vDinamico = htmlspecialchars($_GET["Dinamico"],ENT_QUOTES);
$vNivelDinamico = htmlspecialchars($_GET["NivelDinamico"],ENT_QUOTES);

$vobservacion = htmlspecialchars($_GET["observacion"],ENT_QUOTES);

$vEncNivel1 = htmlspecialchars($_GET["EncNivel1"],ENT_QUOTES);
$vEncNivel2 = htmlspecialchars($_GET["EncNivel2"],ENT_QUOTES);
$vEncNivel3 = htmlspecialchars($_GET["EncNivel3"],ENT_QUOTES);

$vParNivel1 = htmlspecialchars($_GET["ParNivel1"],ENT_QUOTES);
$vParNivel2 = htmlspecialchars($_GET["ParNivel2"],ENT_QUOTES);
$vParNivel3 = htmlspecialchars($_GET["ParNivel3"],ENT_QUOTES);

$vControlNivel1 = htmlspecialchars($_GET["ControlNivel1"],ENT_QUOTES);
$vControlNivel2 = htmlspecialchars($_GET["ControlNivel2"],ENT_QUOTES);
$vControlNivel3 = htmlspecialchars($_GET["ControlNivel3"],ENT_QUOTES);

if ($vnombre!="")  {
           //INSERT INTO pozo10 (nombre, valor, statusb1, statusb2, statusb3, horaa1, horaa11, horaa2, horaa21, horaa3, horaa31, horap1, horap11, horap2, horap21, horap3, horap31, vig, lubrica, lubricado, Tanque, NivelTanque, Carcamo, NivelCarcamo, Dinamico, NivelDinamico, observacion, EncNivel1, EncNivel2, EncNivel3, ParNivel1, ParNivel2, ParNivel3, ControlNivel1, ControlNivel2, ControlNivel3) values ('1','2','3','4','5','7','8','9','0','1','2','3','4','5','1','6','7','8','9','0','1','2','3','4','5','6','7','8','9','0','1','2','3','4','5','6');
    $query = "INSERT INTO pozo10 (nombre, valor, statusb1, statusb2, statusb3, horaa1, horaa11, horaa2, horaa21, horaa3, horaa31, horap1, horap11, horap2, horap21, horap3, horap31, vig, lubrica, lubricado, Tanque, NivelTanque, Carcamo, NivelCarcamo, Dinamico, NivelDinamico, observacion, EncNivel1, EncNivel2, EncNivel3, ParNivel1, ParNivel2, ParNivel3, ControlNivel1, ControlNivel2, ControlNivel3) values ('1','2','3','4','5','7','8','9','0','1','2','3','4','5','1','6','7','8','9','0','1','2','3','4','5','6','7','8','9','0','1','2','3','4','5','6')";
    //"INSERT INTO pozo10 (nombre, valor, statusb1, statusb2, statusb3, horaa1, horaa11, horaa2, horaa21, horaa3, horaa31, horap1, horap11, horap2, horap21, horap3, horap31, vig, lubrica, lubricado, Tanque, NivelTanque, Carcamo, NivelCarcamo, Dinamico, NivelDinamico, observacion, EncNivel1, EncNivel2, EncNivel3, ParNivel1, ParNivel2, ParNivel3, ControlNivel1, ControlNivel2, ControlNivel3) values ('$vnombre','$vvalor','$vstatusb1','$vstatusb2','$vstatusb3','$vhoraab10','$vhoraab11','$vhoraab20','$vhoraab21','$vhoraab30','$vhoraab31','$vhorapb10','$vhorapb11','$vhorapb20','$vhorapb21','$vhorapb30','$vhorapb31','$vvig','$vlubrica','$vlubricado','$vTanque','$vNivelTanque','$vCarcamo','$vNivelCarcamo','$vDinamico','$vNivelDinamico','$vobservacion','$vEncNivel1','$vEncNivel2','$vEncNivel3','$vParNivel1','$vParNivel2','$vParNivel3','$vControlNivel1','$vControlNivel2','$vControlNivel3')";
echo $query;
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query Error');     
     }   	
    
    }
?>