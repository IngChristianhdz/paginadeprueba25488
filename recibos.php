<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago en Linea</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<?php
  session_start();
    if(!isset($_SESSION["Correo1S"])){
           header("Location:cuenta.php");
    }
    $correo1=$_SESSION["Correo1S"];  


?>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a href="#" class="navbar-brand">Cuentas Registradas a <?php $correo1 ?></a>
    <ul class="navbar-nav ml -auto">
        <form class="form-inline my-2 my-lg-0">
            <input type="search" id="search" class="form-control mr-sm-2" placeholder="Numero de Cuenta" >
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>

        </form>
    </ul>
</nav>
<div class="container" p-4> 
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form id="task-form">
                        <input type="text" id = "correo" >
                        <div class="form-group"> 
                            <input type="text" id="cuenta" placeholder="Numero de Cuenta" class="form-control">
                        </div>
                        <div class="form-group">
                            <input  type = "text" id="reparto" placeholder="Numero de Reparto"  class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block text-center">
                            Guardar Numero Cuenta
                        </button>
                        <form action="" class="group"></form>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card my-4" id="task-result">
                <div class="card-body">
                    <ul id="container"></ul>
                </div>
            </div>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <td>Cuenta</td>
                        <td>Vencimiento</td>
                        <td>Total a Pagar</td>
                        <td>Estatus</td>
                        <td>Accion </td>
                        <td>XML </td>
                    </tr>
                </thead>
                <tbody id="tasks"></tbody>
            </table>
        </div>
    </div>
</div>
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

   <script src="js/reciboapp.js"></script>
    
</body>
</html>