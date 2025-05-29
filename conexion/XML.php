<?php
CrearXML();
function CrearXML(){

	$doc =new DOMDocument('1.0');

	$doc ->formatOutput = true;

	$raiz = $doc->createElement("P");
	$raiz = $doc->appendChild($raiz);

	$usuario = $doc ->createElement("business");
	$usuario = $raiz ->aapendChild($usuario);

	$id_company = $doc->createElement("id_company");
	$id_company = $usuario->appendChild($id_company);
	$textCompany= $doc->createTextNode("SNBX");
	$textCompany= $id->appendChield(textCompany);
	echo 'escribo: '. $doc->save("usuarios.xml").'bytes <br><br>';
	}
?>