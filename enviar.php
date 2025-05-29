<?php
  $destino= "atencion_usuarios@jumapac.gob.mx";
  $nombre = $_POST["name"];
  $correo = $_POST["email"];
  $telefono = $_POST["phone"];
  $cuenta = $_POST["count"];
  $asunto = $_POST["subject"];
  $mensaje = $_POST["msj"];
  $contenido = "Nombre: ".$nombre. "/nCorreo: ".$correo. "/nTelefono: ". $telefono. "/nCuenta: ". $cuenta. "/nAsunto: ".$asunto. "/nMensaje: ".$mensaje;
  mail($destino,$asunto,$contenido);
  header("Location:gracias.html");
?>  