<?php
include('AESCrypto.php');
include('database.php');    
    if(isset($id))
    	{   
			$query = "SELECT * FROM PagoL3S";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_array($result);
			$key = $row['key'];
			$instanceENCRYPT = new AESCrypto();
			$responseData=utf8_encode($id);			
			#para ver la respuesta del servidor(desencriptar respuesta)
			$stringdesencriptar = $instanceENCRYPT->desencriptar($responseData,$key);
			$Generapago= $stringdesencriptar." ";		
			$Respuesta=strstr($Generapago, 'approved');
			$id=strstr($Generapago, 'https:');
			$xml = simplexml_load_string($Generapago);

			$rReference= $xml->reference[0];
			$rResponse= $xml->response[0];
			$rFoliocpagos= $xml->foliocpagos[0];
			$rAuth= $xml->auth[0];
			$rCdresponse= $xml->cd_response[0];
			$rNberror= $xml->nb_error[0];
			$rNtime= $xml->time[0];
			$rNdate= $xml->date[0];
			$rNbcompany= $xml->nb_company[0];
			$rNbmerchant= $xml->nb_merchant[0];
			$rCctype= $xml->cc_type[0];
			$rTpoperation= $xml->tp_operation[0];
			$rCcnumber= $xml->cc_number[0];
			$rAmount= $xml->amount[0];
			$rIdurl= $xml->id_url[0];
			$rEmail= $xml->email[0];
			$rCcmask= $xml->cc_mask[0];
			if(isset($Respuesta)){	
				$query = "INSERT INTO Respuesta3S (`Reference`, `Response`, `Foliocpagos, Auth`, `Cdresponse`, `Nberror`, `Ntime`, `Ndate`, `Nbcompany`, `Nbmerchant`, `Cctype`, `Tpoperation`, `Ccnumber`, `Amount`, `Idurl`, `Email`, `Ccmask`) VALUES ( '$rReference', '$rResponse', '$rFoliocpagos', '$rAuth', '$rCdresponse', '$rNberror', '$rNtime', '$rNdate', '$rNbcompany', '$rNbmerchant', '$rCctype', '$rTpoperation', '$rCcnumber', '$rAmount', '$rIdurl', '$rEmail', '$rCcmask')";
				$result = mysqli_query($connection, $query);
				if(!$result){
					die('Query Error');     
				}
				if($rResponse=="approved" ||  $rResponse==  "Aprobado")){
					$rpagoenlinea= 'EL PAGO EN LINEA SE PROCESA POR $'.$rAmount.' AUTORIZACION NUM.'.$rAuth;
					$query = "UPDATE usuario SET pagoL  ='$rAmount', pagolinea= '$rpagoenlinea', statusweb=25  WHERE  (correo = '$rEmail' and cuenta='$rReference')  ";
                    $result = mysqli_query($connection, $query);
                   if(!$result){
                              die('Query Error');     
                            }  
				}else {
					$rpagoenlinea= 'EL PAGO FUE RECHAZADO';
					$query = "UPDATE usuario SET  pagolinea=0 '$rpagoenlinea', statusweb=24  WHERE  (correo = '$rEmail' and cuenta='$rReference')  ";
                    $result = mysqli_query($connection, $query);
                   if(!$result){
                              die('Query Error');     
                            }  

				}			
			}

    	}  
   		else
   		{
			$query = "INSERT INTO Respuesta3S (`Reference`, `Response`, `Foliocpagos`, `Auth`, `Cdresponse`, `Nberror`, `Ntime`, `Ndate`, `Nbcompany`, `Nbmerchant`, `Cctype`, `Tpoperation`, `Ccnumber`, `Amount`, `Idurl`, `Email`, `Ccmask`) VALUES ( '$rReference', '$rResponse', '$rFoliocpagos', '$rAuth', '$rCdresponse', '$rNberror', '$rNtime', '$rNdate', '$rNbcompany', '$rNbmerchant', '$rCctype', '$rTpoperation', '$rCcnumber', '$rAmount', '$rIdurl', '$rEmail', '$rCcmask')";
			$result = mysqli_query($connection, $query);
			if(!$result){
					die('Query Error');     
			}
		
		
		}

			 



?>