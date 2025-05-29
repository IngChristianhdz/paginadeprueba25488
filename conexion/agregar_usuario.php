<?php
include ("database.php");

if(isset($_POST["sexo"])){
    $pass = $_POST['reparto'];
    $cuenta =$_POST['cuenta']; 
    $cuenta =str_pad($cuenta, 6, "0", STR_PAD_LEFT);
    $pass1=substr($pass,0,5);
    $pass2=substr($pass,4,5);
    $pass2=str_pad($pass2, 5, "0", STR_PAD_LEFT);  
    $pass=$pass1.$pass2;
    $sexo=$_POST['sexo'];
    $nombre=$_POST['nombre'];
    $domicilio=$_POST['domicilio'];
    $ciudad=$_POST['ciudad'];
    $estado=$_POST['estado'];
    $telefono=$_POST['telefono'];
    $celular=$_POST['celular'];
    $correo = $_POST['correo'];
    $contra=$_POST['contra'];
    $conf_contra=$_POST['contra2'];
    $pregunta=$_POST['pregunta'];
    $respuesta=$_POST['respuesta'];
    $terminos=$_POST['terminos'];  
    
    $query="SELECT * FROM usuario where (cuenta = '$cuenta' and reparto= '$pass')";
    $result =  mysqli_query($connection,$query);
    if (mysqli_num_rows($result) > 0) {
        
        $sql = "UPDATE  usuario SET correo='$correo' where (reparto = '$pass' and cuenta='$cuenta')";
        $result =mysqli_query($connection, $sql);
        if(!result){
           die('Query Error'); 
        }
        else{
            
        $query="INSERT into registro (Correo,  Contrasena, Sexo, Nombre, Domicilio, Ciudad, Estado, Telefono, Pregunta, Respuesta, Terminos, Celular) VALUES ('$correo','$contra','$sexo', '$nombre', '$domicilio', '$ciudad', '$estado', '$telefono', '$pregunta', '$respuesta','$terminos', '$celular')";
        $result = mysqli_query($connection, $query);
        }    
 
           echo "Se agregaron los datos";
     } 
}
?>