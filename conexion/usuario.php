<?php
$server['ip']= "127.0.0.1";
$database_usuario = "pkkvmhzyzr";
$username_usuario = "pkkvmhzyzr";
$password_usuario = "wJbYZTCA8c";


$pass = $_POST['txtreparto'];

$cuenta = $_POST['txtcuenta'];
$correo = $_POST['txtcorreo'];

$cuenta =str_pad($cuenta, 6, "0", STR_PAD_LEFT);
$pass1=substr($pass,0,5);
$pass2=substr($pass,4,5);
$pass2=str_pad($pass2, 5, "0", STR_PAD_LEFT);  
$pass=$pass1.$pass2;
$contra=$_POST['txtpass'];
$sexo=$_POST['cmbsexo'];
$nombre=$_POST['txtnombre'];
$domicilio=$_POST['txtdom'];
$ciudad=$_POST['txtciudad'];
$estado=$_POST['cmbedo'];
$telefono=$_POST['txttel'];
$pregunta=$_POST['txtpregunta'];
$respuesta=$_POST['txtrespuesta'];
$terminos="SI";
$celular=$_POST['txtcel'];
$usuario = new mysqli($hostname_usuario, $username_usuario, $password_usuario, $database_usuario);
if ($usuario->connect_error) {
    die("Connection fallida: " . $conn->connect_error);

}else{

$result =  mysqli_query($usuario,"SELECT * FROM registro  where Correo = '$correo'");
if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
           echo $row . "<br>";
        }
       echo "Correo ya registrado";
     }else {
        
echo $pass;
            $result =  mysqli_query($usuario,"SELECT * FROM usuario  where (cuenta = $cuenta and reparto=$pass)");
    if (mysqli_num_rows($result) > 0) {

        $sql = "UPDATE  usuario set correo='$correo' where cuenta='$cuenta'";
        mysqli_query($usuario, $sql);
        
        $sql = "INSERT INTO registro (Correo, Contrasena, Sexo, Nombre, Domicilio, Ciudad, Estado, Telefono, Pregunta, Respuesta, Terminos,Celular) VALUES ('$correo', '$contra', '$sexo', '$nombre', '$domicilio', '$ciudad', '$estado', '$telefono', '$pregunta', '$respuesta', '$terminos','$celular')";
        mysqli_query($usuario, $sql);

        echo $celular . "<br>";
                echo "Correo se Registro Satisfactoriamente";
                
     }else {            echo "cuenta no existe o reparto invalido";     } 

     } 
} 
    
        

mysqli_close($usuario);




?>