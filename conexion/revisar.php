<?php  
    
        $server['ip']= "127.0.0.1";
        $database_usuario = "pkkvmhzyzr";
        $username_usuario = "pkkvmhzyzr";
        $password_usuario = "wJbYZTCA8c";


       $correo = $_POST['txtcorreo'];
        $contra=$_POST['txtpass'];

        $usuario = new mysqli($hostname_usuario, $username_usuario, $password_usuario, $database_usuario);
        if ($usuario->connect_error) {
            die("Connection fallida: " . $conn->connect_error);

        }else{


        $result =  mysqli_query($usuario,"SELECT Correo, Contrasena FROM registro  where Correo = '$correo' AND Contrasena='$contra'" );
        $sql="SELECT * FROM registro  where (Correo = '$correo' and Contrasena='$contra')" ;
      
        if (mysqli_num_rows($result) > 0) {

               $result =  mysqli_query($usuario,"SELECT * FROM usuario  where correo = '$correo' ");
            if (mysqli_num_rows($result) > 0) {

                $num_fila1=0;
                for ($num_fila = $result->num_rows - 1; $num_fila >= 0; $num_fila--) {
                    $result->data_seek($num_fila);
                    $row= $result->fetch_assoc();
                    $num_fila1=1;
  
                }

                     
             }


             }else {

                    require_once('cuenta.html');   
                   
             } 
        } 



        mysqli_close($usuario);
    ?>