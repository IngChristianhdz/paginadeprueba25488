<!DOCTYPE html>
<html lang="es">
    <head>
        <title>JUMAPAC</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilo_menu.css">
        <link rel="stylesheet" href="css/estilo_piepag.css">
        <link rel="stylesheet" href="css/estilo_banner.css">
        <link rel="stylesheet" href="css/estilo_contacto.css">
        <link rel="stylesheet" href="css/estilo_botones.css">
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		
		
	</head>
    
	 <h1>Servicios relacionados a este correo</h1>
             <br>
             <br>               
               <center>
                <table border="2" cellpadding="0">
                <colgroup>
                  <col span="9" style="width: 10%;">              
                </colgroup>
                <thead ALIGN=left>
                  <tr>
                    <th colspan="9">NOMBRE: <p> r </p></th>
                  </tr>
                  <tr>
                    <th colspan="9">CORREO:  <p> l </p></th>
                  </tr>  
                </thead>
                <tbody>
                  <tr>
                    <th scope="col"> CUENTA </th>
                    <th scope="col"> VENCIMIENTO </th>
                    <th scope="col"> CONSUMO </th>
                    <th scope="col"> ADEUDO SERVICIO </th>
                    <th scope="col"> ADEUDO PAGO VARIO </th>
                    <th scope="col"> REINSTALACION </th>
                    <th scope="col"> CONVENIO </th>
                    <th scope="col"> TOTAL A PAGAR </th>
                    <th scope="col"> PAGAR </th>
                  </tr>
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

                      $sql="Select * from usuario";
                    $result=mysql_query($usuario,$sql);
                    while($mostrar=mysqli_fetch_array($result))
                    {  
        ?>
                  <tr>
                    <td> <?php echo $mostrar['cuenta'] ?></td>
                    <td> <?php echo $mostrar['vence'] ?> </td>
                    <td> <?php echo $mostrar['consumo'] ?></td>
                    <td> <?php echo $mostrar['adeudo'] ?></td>
                    <td> <?php echo $mostrar['adeudopagv'] ?></td>
                    <td> <?php echo $mostrar['adeudopsus'] ?></td>
                    <td> <?php echo $mostrar['adeudo'] ?></td>
                    <td> <?php echo $mostrar['adeudopags'] ?></td>
                    <td> boton </td>
                  </tr>
                </tbody>
                <?php
                    }
                ?>    
               </table>
            </center>
    </body>
               
    <body>
	