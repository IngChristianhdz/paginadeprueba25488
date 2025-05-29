<?php
include('AESCrypto.php');
include('database.php');
session_start();
if(!isset($_SESSION["Correo1S"])){
    header("Location:cuenta.php");
   }
   $correo1=$_SESSION["Correo1S"]; 
   $cuenta1  = htmlspecialchars($_GET["web3"],ENT_QUOTES);
   if(isset($cuenta1 )) {  	
	$query = "SELECT * FROM usuario  where cuenta='$cuenta1' and correo='$correo1' ";
	$result = mysqli_query($connection, $query);
	if(!$result){
        die('Query Error');     
	 }  
	 if (mysqli_num_rows($result) > 0) {
		$row= $result->fetch_assoc();  
		$nombre=$row['Nombre']; 	$rtotal=$row['adeudo']+$row['adeudopagv']+$row['adeudopsus'];
		$rderechos=$row['adeudo'];
		$rvarios=$row['adeudopagv'];
		$rreinstalacion=$row['adeudopsus'];
$correo1=$_SESSION["Correo1S"]; 
$idcuenta=$cuenta1;
$total=$rtotal;
$rfecha=$row['venceL'];
$fecha=$rfecha;
$derechos=$rderechos;
$varios=$rvarios;
$reinstalacion=$rreinstalacion;
$query = "SELECT * FROM PagoL3S";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
$row['adeudo'];
$instanceENCRYPT = new AESCrypto();
$key = $row['key'];
$data0 = $row['data'];
$string ='<?xml version="1.0" encoding="UTF-8"?>
<P>
    <business>
        <id_company>'.$row['company'].'</id_company>
        <id_branch>'.$row['branch'].'</id_branch>
        <user>'.$row['user'].'</user>
        <pwd>'.$row['pwd'].'</pwd>
    </business>
    <url>
        <reference>'.$idcuenta.'</reference>
        <amount>'.$total.'</amount>
        <moneda>MXN</moneda>
        <canal>W</canal>
    	<omitir_notif_default>1</omitir_notif_default>
    	<promociones>C</promociones>
    	<st_correo>1</st_correo>
    	<fh_vigencia>'.$fecha.'</fh_vigencia>
    	<mail_cliente>'.$correo1.'</mail_cliente>
	    <datos_adicionales>
	      <data id="1" display="true">
	        <label>Derechos</label>
	        <value>'.$derechos.'</value>
	      </data>
	      <data id="2" display="true">
	        <label>Otros</label>
	        <value>'.$varios.'</value>
          </data>
          <data id="3" display="true">
	        <label>Reinstalacion_</label>
	        <value>'.$reinstalacion.'</value>
          </data>
	    </datos_adicionales>
    </url>
</P>';

$Generapago="";
$string1=$string;
$cadenaEncriptada = $instanceENCRYPT->encriptar($string,$key);
$cadenaEnviar='<pgs>';
$cadenaEnviar.='<data0>'.$data0.'</data0>';
$cadenaEnviar.='<data>'.$cadenaEncriptada.'</data>';
$cadenaEnviar.='</pgs>';
$data = array('xml'=>$cadenaEnviar);
$sendData= http_build_query($data) . "\n";
//$endpoints = "https://wppsandbox.mit.com.mx/gen";
$endpoints = "https://bc.mitec.com.mx/p/gen";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoints);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POST,true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$sendData);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$responseData = curl_exec($ch);
 if ( curl_errno($ch) ) {
        echo 'cURL ERROR -> ' . curl_errno($ch) . ': ' . curl_error($ch);
 }else {
		$returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
		switch($returnCode){
        case 200:
			$responseData=utf8_encode($responseData);	
			#para ver la respuesta del servidor(desencriptar respuesta)
			$stringdesencriptar = $instanceENCRYPT->desencriptar($responseData,$key);
			$Generapago= $stringdesencriptar." ";
			console.log($Generapago);
			print_r($stringdesencriptar);
			$Respuesta=strstr($Generapago, 'success');
			$id=strstr($Generapago, 'https:');
			$xml = simplexml_load_string($Generapago);			
			$Referencia= $xml->nb_url[0];			
			if(isset($Respuesta)){
		                $query = "INSERT INTO Movimiento3S (`Cuenta`, `Referencia`, `Total`, `Derechos`, `Varios`, `Reinstalacion`, `Vence`, `Correo`) VALUES ('$idcuenta','$Referencia', '$total', '$derechos', '$varios', '$reinstalacion','$fecha', '$correo1')";			
				$result = mysqli_query($connection, $query);
				if(!$result){
					die('Query Error');     
				}
		
			
			 $id1=$Referencia;
                        $id='Location: '.'https://www.jumapac.gob.mx/conexion/Aceptarpago.php?mostrar='.$id1;
        	       header( $id);
			}
			header($id1);
			die();
	        	$xmlDoc = new DOMDocument();
        	   	$xmlDoc->loadXML($responseData);
			echo $xmlDoc->SaveXML();
           		$xpath = new DOMXPath($xmlDoc);
			$MITresponse= $xpath->query("//P_RESPONSE/cd_response");
           		foreach($MITresponse as $xmlRes){
				   echo  $webpayResp=$xmlRes->textContent;
	
		   }	
            break;
            default:
	        echo 'ErrorHTTP';
	        echo $returnCode;
	        break;
			}
		}
		curl_close($ch);
     }
 }
?>