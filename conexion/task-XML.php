<?php

    include('database.php');
    include('conexion/AESCrypto.php');
    session_start();
        
    if(!isset($_SESSION["Correo1S"])){
            header("Location.cuenta.html");
        }
    $correo1 = $_SESSION["Correo1S"];            
    $id = $_POST['id'];



    $query = "SELECT * FROM usuario  where (cuenta='$id' and correo='$correo1')";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query Error');     
     } 
 
    $num_fila1=mysqli_num_rows($result);

    
    if($num_fila1 > 0 ){

    
    $num_fila=0;
        for ($num_fila = $num_fila1 - 1; $num_fila >= 0; $num_fila--) {
            $result->data_seek($num_fila);
            $row= $resultado->fetch_assoc();
            $num_fila1=1;
         }
  
        $cobrar=$row['adeudopsus']+$row['adeudopagv']+$row['adeudo'];

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
        $textreference = $doc->createTextNode($row['cuenta']);
        $textreference = $reference->appendChild($textreference);

        $V_amonunt = $doc->createElement("amount");
        $V_amonunt = $url->appendChild($V_amonunt);
        $textamount = $doc->createTextNode($cobrar);
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
        $textmail_cliente = $doc->createTextNode($row['correo']);
        $textmail_cliente = $mail_cliente->appendChild($textmail_cliente);
        
        $datos_adicionales = $doc->createElement("datos_adicionales");
        $datos_adicionales = $url-> appendChild($datos_adicionales);
 
 
 
        if ($row['adeudo']>0)   
        {     
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
        }
 
        if ($row['adeudopagv']>0)   
        {  
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
        }
        if ($row['adeudopsus']>0)   
        {
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
        }
 
        $originalString = $doc->saveXML();
        $originalString=htmlentities($originalString);        
        $key = '5dcc67393750523cd165f17e1efadd21'; 
        $encryptedString = AESCrypto::encriptar($originalString, $key); 
         $doc->save("business1.xml") ;        
        echo 'encryptada: ' . $encryptedString;  
    }


 

?>