<?php

CrearXML();

//LeerXML();

function LeerXML() {
	$businesss = simplexml_load_file("/Users/xcheko51x/Downloads/businesss.xml"); // Ruta del archivo XML

	foreach ($businesss as $business) {
		echo "ID: " . $business->id_company . "<br>";
		echo "Nombre: " . $business->id_company . "<br>";
		echo "Telefono: " . $business->TELEFONO . "<br>";
		echo "Email: " . $business->EMAIL . "<br>";
	}
}

function CrearXML() {
	$doc = new DOMDocument('1.0', 'UTF-8');

	$doc->formatOutput = true;

	$raiz = $doc->createElement("P");
	$raiz = $doc->appendChild($raiz);

	$business = $doc->createElement("business");
	$business = $raiz->appendChild($business);

	$id_company = $doc->createElement("id_company");
	$id_company = $business->appendChild($id_company);
	$textid_company = $doc->createTextNode("SNBX");
	$textid_company = $id_company->appendChild($textid_company);

	$id_branch = $doc->createElement("id_branch");
	$id_branch = $business->appendChild($id_branch);
	$textid_branch = $doc->createTextNode("01SNBXBRNCH");
	$textid_branch = $id_branch->appendChild($textid_branch);

	$user = $doc->createElement("user");
	$user = $business->appendChild($user);
	$textuser = $doc->createTextNode("SNBXUSR01");
	$textuser = $user->appendChild($textuser);

	$pwd = $doc->createElement("pwd");
	$pwd = $business->appendChild($pwd);
	$textpwd = $doc->createTextNode("SECRETO");
	$textpwd = $pwd->appendChild($textpwd);



	$url = $doc->createElement("url");
	$url = $raiz->appendChild($url);

	$reference = $doc->createElement("reference");
	$reference = $url->appendChild($reference);
	$textreference = $doc->createTextNode("C000001");
	$textreference = $reference->appendChild($textreference);

	$V_amonunt = $doc->createElement("amount");
	$V_amonunt = $url->appendChild($V_amonunt);
	$textamount = $doc->createTextNode("1.0");
	$textamount = $V_amonunt->appendChild($textamount);

	$moneda = $doc->createElement("moneda");
	$moneda = $url->appendChild($moneda);
	$textmoneda = $doc->createTextNode("MXN");
	$textmoneda = $moneda->appendChild($textmoneda);


	$canal = $doc->createElement("canal");
	$canal = $url->appendChild($canal);
	$textcanal = $doc->createTextNode("W");
	$textcanal = $canal->appendChild($textcanal);

	$omitir_notif_default = $doc->createElement("omitir_notif_default");
	$omitir_notif_default = $url->appendChild($omitir_notif_default);
	$textomitir_notif_default = $doc->createTextNode("1");
	$textomitir_notif_default = $omitir_notif_default->appendChild($textomitir_notif_default);

	$promociones = $doc->createElement("promociones");
	$promociones = $url->appendChild($promociones);
	$textpromociones = $doc->createTextNode("C");
	$textpromociones = $promociones->appendChild($textpromociones);

	$st_correo = $doc->createElement("st_correo");
	$st_correo = $url->appendChild($st_correo);
	$textst_correo = $doc->createTextNode("1");
	$textst_correo = $st_correo->appendChild($textst_correo);

	$fh_vigencia = $doc->createElement("fh_vigencia");
	$fh_vigencia = $url->appendChild($fh_vigencia);
	$textfh_vigencia = $doc->createTextNode("21/06/2020");
	$textfh_vigencia = $fh_vigencia->appendChild($textfh_vigencia);

	$mail_cliente = $doc->createElement("mail_cliente");
	$mail_cliente = $url->appendChild($mail_cliente);
	$textmail_cliente = $doc->createTextNode("informatica.jumapac@gmail.com");
	$textmail_cliente = $mail_cliente->appendChild($textmail_cliente);
	
	$datos_adicionales = $doc->createElement("datos_adicionales");
	$datos_adicionales = $url-> appendChild($datos_adicionales);
    
    
    
    
    $datos_adicionales1 = $doc->createElement("data");  
    $datos_adicionales1 = $datos_adicionales->appendChild($datos_adicionales1);
    $datos_adicionales1->appendChild($doc->createAttribute('display'));   $datos_adicionales1->setAttribute('display', 'true');
    $datos_adicionales1->appendChild($doc->createAttribute('id'));
    $datos_adicionales1->setAttribute('id', 1);

    $datos_adicionales2 = $doc->createElement("label");
	$datos_adicionales2 = $datos_adicionales1->appendChild($datos_adicionales2);
    $textlabel = $doc->createTextNode("Servicio");
	$textlabel = $datos_adicionales2->appendChild($textlabel);
  
    $datos_adicionales3 = $doc->createElement("value");
	$datos_adicionales3 = $datos_adicionales1->appendChild($datos_adicionales3);
    $textvalue = $doc->createTextNode("Recibo");
	$textvalue = $datos_adicionales3->appendChild($textvalue);
    
    
   
    $datos_adicionales4 = $doc->createElement("data");  
    $datos_adicionales4 = $datos_adicionales->appendChild($datos_adicionales4);
    $datos_adicionales4->appendChild($doc->createAttribute('display'));   $datos_adicionales4->setAttribute('display', 'true');
    $datos_adicionales4->appendChild($doc->createAttribute('id'));
    $datos_adicionales4->setAttribute('id', 2);

    
    $datos_adicionales5 = $doc->createElement("label");
	$datos_adicionales5 = $datos_adicionales4->appendChild($datos_adicionales5);
    $textlabel1 = $doc->createTextNode("Servicio");
	$textlabel1 = $datos_adicionales5->appendChild($textlabel1);
  
   
    $datos_adicionales6 = $doc->createElement("value");
	$datos_adicionales6 = $datos_adicionales4->appendChild($datos_adicionales6);
    $textvalue2 = $doc->createTextNode("Vario");
	$textvalue2 = $datos_adicionales6->appendChild($textvalue2);
    
        
   
    $datos_adicionales7 = $doc->createElement("data");  
    $datos_adicionales7 = $datos_adicionales->appendChild($datos_adicionales7);
    $datos_adicionales7->appendChild($doc->createAttribute('display'));   $datos_adicionales7->setAttribute('display', 'true');
    $datos_adicionales7->appendChild($doc->createAttribute('id'));
    $datos_adicionales7->setAttribute('id', 3);

    
    $datos_adicionales8 = $doc->createElement("label");
	$datos_adicionales8 = $datos_adicionales7->appendChild($datos_adicionales8);
    $textlabel3 = $doc->createTextNode("Servicio");
	$textlabel3 = $datos_adicionales8->appendChild($textlabel3);
  
   
    $datos_adicionales9 = $doc->createElement("value");
	$datos_adicionales9 = $datos_adicionales7->appendChild($datos_adicionales9);
    $textvalue4 = $doc->createTextNode("Reinstalacion");
	$textvalue4 = $datos_adicionales9->appendChild($textvalue4);
    
    







    
    include('AESCrypto.php'); 


$originalString = $doc->saveXML();

$originalString='<?xml version="1.0" encoding="UTF-8"?>
<P>
  <business>
    <id_company>SNBX</id_company>
    <id_branch>01SNBXBRNCH</id_branch>
    <user>SNBXUSR01</user>
    <pwd>SECRETO</pwd>
  </business>
  <url>
    <reference>C000001</reference>
    <amount>1.0</amount>
    <moneda>MXN</moneda>
    <canal>W</canal>
    <omitir_notif_default>1</omitir_notif_default>
    <promociones>C</promociones>
    <st_correo>1</st_correo>
    <fh_vigencia>21/06/2020</fh_vigencia>
    <mail_cliente>informatica.jumapac@gmail.com</mail_cliente>
    <datos_adicionales>
      <data display="true" id="1">
        <label>Servicio</label>
        <value>Recibo</value>
      </data>
      <data display="true" id="2">
        <label>Servicio</label>
        <value>Vario</value>
      </data>
      <data display="true" id="3">
        <label>Servicio</label>
        <value>Reinstalacion</value>
      </data>
    </datos_adicionales>
  </url>
</P>';

    
echo 'Original: ' . $originalString.'<br/>';
$key = '5dcc67393750523cd165f17e1efadd21'; //Llave de 128 bits
$encryptedString = AESCrypto::encriptar($originalString, $key); 
echo 'Escrito: ' . $doc->save("business1.xml") . 'bytes <br>';
echo 'encryptada: ' . $encryptedString.'<br/>';




$encodedString = urlencode('<pgs><data0>SNDBX123</data0><data>'.$encryptedString.'</data></pgs>');
 echo 'antes: ' . $encodedString.'<br/>';
$encodedString = urlencode('<pgs><data0>SNDBX123</data0><data>'.$encryptedString.'</data></pgs>');
$request = new HttpRequest();
$request->setUrl('https://wppsandbox.mit.com.mx/gen');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'cache-control' => 'no-cache',
  'content-type' => 'application/x-www-form-urlencoded'
));

$request->setContentType('application/x-www-form-urlencoded');
$request->setPostFields(array(
  'xml' => encodedString
));

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}



$originalString = $originalString;
$key = '5dcc67393750523cd165f17e1efadd21'; //Llave de 128 bits
$decryptedString = AESCrypto::desencriptar($originalString, $key);

echo 'desencriptar: ' . $decryptedString.'<br/>';
    
    
    




    



}
?>
