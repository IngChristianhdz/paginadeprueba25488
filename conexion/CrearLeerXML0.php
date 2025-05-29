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

$textoXML = '<?xml version="1.0" encoding="UTF-8"?>';
	$textoXML .= "\n";
	$textoXML .= '<obras>';
	$textoXML .= "\n";
	foreach ($matrizDeObras as $obra){
		$textoXML .= "\t";
		$textoXML .= '<obra inicio="'.$obra["fecha_de_inicio"].'" ';
		$textoXML .= 'final="'.$obra["fecha_de_finalizacion"].'" ';
		$textoXML .= 'contratista="'.$obra["contratista"].'" ';
		$textoXML .= 'presupuesto="'.$obra["presupuesto"].'">';
		$textoXML .= "\n";
		$textoXML .= "\t\t";
		$textoXML .= $obra["obra"];
		$textoXML .= "\n";
		$textoXML .= "\t\t";
		$textoXML .= '<personal_tecnico miembros="'.$obra["miembros_tecnicos"].'">';
		$textoXML .= "\n";
		foreach ($obra["personal_tecnico"] as $keyMiembro=>$miembro){
			$textoXML .= "\t\t\t";
			$textoXML .= '<miembro cargo="'.$keyMiembro.'">';
			$textoXML .= "\n";
			$textoXML .= "\t\t\t\t";
			$textoXML .= $miembro;
			$textoXML .= "\n";
			$textoXML .= "\t\t\t";
			$textoXML .= '</miembro>';
			$textoXML .= "\n";
		}
		$textoXML .= "\t\t";
		$textoXML .= '</personal_tecnico>';
		$textoXML .= "\n";
		$textoXML .= "\t";
		$textoXML .= '</obra>';
		$textoXML .= "\n";
	}
	$textoXML .= '</obras>';
 
	// Nos aseguramos de que la cadena que contiene el XML esté en UTF-8
//	$textoXML = mb_convert_encoding($textoXML, "UTF-8");
echo 'Original: ' . $textoXML;


	

}
?>
