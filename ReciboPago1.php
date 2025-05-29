
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago en Linea</title>
    
    <link rel="shortcut icon" type="image/png" href="imagenes/LJ.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo_iconos.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilo_recibopago.css">
    <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
    <?php
    session_start();
    //   if(!isset($_SESSION["Correo1S"])){
    //          header("Location:ReciboPago.php");
    //   }
    //   $correo1=$_SESSION["Correo1S"];  
    // $idUser = $_POST['name'];
     $_SESSION["Cuenta"]=('#name');  
     echo "Hola mundo";
  ?>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a href="#" class="navbar-brand">Bienvenido Super admin </a>
    <ul class="navbar-nav ml -auto">
    <form action="" method="GET">
            <!-- <input class="form-control me-2" type="search" placeholder="buscar cuenta en linea"
            name="busqueda"><br>
            <button class="btn btn-outline-info" type="submit" name="enviar"> <b>Buscar</b> </button>         -->
            <button type="button" id="cerrar" class="btn btn-danger">Cerrar Sesion</button>
        </form>
         
    </ul>
    
</nav>
<div class="container-fluid" style="margin-top: 10px; margin-right: 150px;">
    <form class="d-flex">
        <form action="" method="GET">
            <input class="form-control me-2" style="width: 500px; margin: auto; margin-right: -1px; border: 3px solid #73AD21;" type="search" placeholder="buscar cuenta en linea"
            name="busqueda"><br>
            <button class="btn btn-outline-info" style="margin-right: 500px;" type="submit" name="enviar"> <b>Buscar</b> </button>
        </form>
    </form>
</div>
<br>
<?php

// include('database.php'); 
$where="";

if(isset($_GET['enviar'])){
    $busqueda = $_GET['busqueda'];
if(isset($_GET['busqueda']))
{
    $where="WHERE usr.correo LIKE'%".$busqueda."%' OR usr.cuenta LIKE '%".$busqueda."%'";
}
}

?>



<div class="col-md-12">
            <table class="table table-striped table-dark table_id ">
                    <thead>
                        <tr>
                            <td>Cuenta</td>
                            <td>Nombre</td>
                            <td>domicilio</td>
                            <td>Correo</td>
                            <td>Vencimiento</td>
                            <td>Adeudo </td>
                            <td>Estatus de Pago</td>                           
                            <td>Consumo</td>
                        </tr>
                    </thead>
                    <tbody>
                   
                    <!-- , registro.Nombre, registro.domicilio                     -->
 
<?php
$conexion= mysqli_connect("127.0.0.1","pkkvmhzyzr","wJbYZTCA8c","pkkvmhzyzr");
$SQL="SELECT usr.cuenta, usr.correo, usr.vence, usr.adeudo, usr.pagolinea, usr.consumo, reg.Nombre, reg.domicilio FROM usuario as usr
inner join registro as reg on usr.correo = reg.Correo collate utf8_spanish_ci $where LIMIT 10";
$dato = mysqli_query($conexion, $SQL);
if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
?>
<tr>

    <td><?php echo $fila['cuenta']; ?></td>
    <td><?php echo $fila['Nombre']; ?></td>
    <td><?php echo $fila['domicilio']; ?></td> 
    <td><?php echo $fila['correo']; ?></td>
    <td><?php echo $fila['vence']; ?></td>
    <td><?php echo $fila['adeudo']; ?></td>
    <td><?php echo $fila['pagolinea']; ?></td>
    <td><?php echo $fila['consumo']; ?></td>
    <!-- <td>?php echo $fila['']; ?></td> -->
</tr>
</tbody>
</div>
<?php 
  }
}else{
    ?>
    <tr class="text-center">
        <td colspan="16">No Existen Registros</td>
    </tr>
    <?php
}
?>
</body>
</table>   
<!-- 
<div class="row">
        <div class="col-md-12"> 
            <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>Fecha del Movimiento</td>
                            <td>Autorización </td>
                            <td>Estatus</td>
                            <td>Respuesta 3DS</td>                            
                        </tr>
                    </thead>
                    <tbody id="tasksM"></tbody>
            </table>            
        </div> 
</div> -->

    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

   <script src="js/ReciboPagoappAdm.js"></script>
    

  
    
</html>