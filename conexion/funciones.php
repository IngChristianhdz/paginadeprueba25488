<?php
function emailExiste($email){
	global $mysqli;

	$stmt=$mysqli->prepare("Select id from alta where correo=?LIMIT 1");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt->store_result();
	$num= $stmt-> num_rows;
	$stmt->close();
	if($num > 0){
		return true;
	} else{
		return false;
	}
}

function isEmail($email){
	if (filter_var($email, FILTER_VALIDATE_EMAIL)){
		return true;
	}else{
		return false;
	}
}


function getValor($campo, $campoWhere, $valor){
    global $mysqli;

	$stmt=$mysqli->prepare("Select $campo from alta where $campoWhere ?LIMIT 1");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt->store_result();
	$num= $stmt-> num_rows;	
	if ($num > 0){
		$stmt->bind_param($_campo);
		$stmt->fetch();
		return $_campo;
	}else {
		return false;
	}
}

function generaTokenPass($user_id){
	global $mysqli;

	$token = generateToken();
	$stmt=$mysqli->prepare("Update alta set token_password=?, password_request=1 where id=?");
	$stmt->bind_param("ss", $token, $user_id);
	$stmt->execute();
    $stmt->close();
    return $token;
}

function resultBlock($errors){
	if(count ($errors) > 0){
		echo "<div id='error' class='alert alert danger' role='alert'> <a href='#' onclick=\"showHide('error');\">[X]</a></ul>";
		foreach($errors as $error){
			echo "<li>".$error."</li>";
		}
		echo "</ul>";
		echo "</div>";
	}
}

function cambiaPassword($password, $user_id, $token){
	global $mysqli;

	$stmt=$mysqli->prepare('UPDATE alta SET password=?, token_password=", password_request=0 WHERE id=? AND token_password=?');
	$stmt=bind_param('sis', $password, $user_id, $token);
	if($stmt->execute()){
		return true;
	}else{
		return false;
	}
}

function hashPassword($password){
	$hash=password_hash($password, PASSWORD_DEFAULT);
	return $hash;
}


function generateToken(){
	$gen=md5(uniqid(mt_rand(), false));
	return $gen;
}

function enviarEmail($email, $nombre, $asunto, $cuerpo){
	
	 require 'phpmailer/PHPMailerAutoload.php'; // Si no funciona el comando arriba coloque la ruta DE PHPMAILER
	 use PHPMailer\PHPMailer\PHPMailer;
	 use PHPMailer\PHPMailer\Exception;
	 use PHPMailer\PHPMailer\SMTP;

	 require 'phpmailer/Exception.php';
	 require 'phpmailer/PHPMailer.php';
	 require 'phpmailer/SMTP.php';

	$mail = new PHPMailer;
    $mail->SMTPDebug = 0; // Habilitar salida de Debug

    $mail->IsSMTP(); // Colocar el mailer para usar SMTP
    $mail->Host = 'secure.emailsrvr.com'; // Especificar servidor principal de backup
    $mail->Port = 465; // Configurar puerto SMTP
    $mail->SMTPAuth = true; // Habilitar SMTP
    $mail->Username = 'atencion_usuarios@jumapac.gob.mx'; // Usuario SMTP
    $mail->Password = 'ATusu2020'; // Contraseña SMTP
    $mail->SMTPSecure = 'ssl'; // Habilitar encrypcion, 'ssl' también se acepta.

    $mail->From = 'atencion_usuarios@jumapac.gob.mx';
    $mail->FromName = 'JUMAPAC Cortazar';
    $mail->AddAddress($email); // Agregue un receptor
    $mail->AddAddress('atencion_usuarios@jumapac.gob.mx'); // Este nombre es opcional.

    $mail->IsHTML(true); // Colocar formato de correo a HTML

    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;
    
    if($mail->send()){
    	return true;
    }else{
    	return false;
    }
}


?>