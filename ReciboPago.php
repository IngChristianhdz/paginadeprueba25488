<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Validar que la sesi¨®n exista antes de continuar
if (!isset($_SESSION["Correo1S"])) {
    header("Location: ReciboPago.php");
    exit;
}

$correo1 = htmlspecialchars($_SESSION["Correo1S"]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago en L¨ªnea</title>

    <link rel="shortcut icon" href="imagenes/LJ.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo_iconos.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilo_recibopago.css">
    <script src="https://cdn.plot.ly/plotly-3.0.1.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Cuentas Relacionadas a <?php echo $correo1; ?></a>
    <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0">
            <input type="search" id="search" class="form-control mr-sm-2" placeholder="Numero de Cuenta">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
            <button type="button" id="cerrar" class="btn btn-danger">Cerrar Sesion</button>
        </form>
    </ul>
</nav>

<div class="container" p-4> 
    <div class="row">
        <div class="col-md-4">      
            <div class="card my-10">
                    <div class="card-body"> 
                    </div>
                    <div class="card-body">
                        <form id="task-form">
                            <input type="hidden" id = "taskId">
                            <div  class="form-group"> <input type="hidden" id = "taskHis"> </div>
                            
                            <div class="form-group"> 
                                <input type="text" id="name" placeholder="Cuenta" class="form-control"> 
                            </div>
                            
                            <div class="form-group">
                                <input  id="description" class="form-control1" placeholder="Reparto"><a class="icon-question" href="imagenes/Guia recibo.jpg" target="_blank"></a>
                            </div>
                            <button type="submit" class="btn btn-success btn-block text-center">
                                Guardar  
                            </button>
                            <form action="" class="group"></form>
                        </form>                        
                    </div>  
                    
                    <div class="card my-1" id="enlaces_int">
                        <div class= "enlaces">              
                          <a href="T¨¦rminosyCondiciones.pdf" target="_blank"&nbsp;&nbsp;&nbsp;&nbsp;><img src="imagenes/ICONO_TERMINOSYCONDICIONES.png"> </a>  <a href="AVISO DE PRIVACIDAD PARA WEB.pdf" target="_blank"><img src="imagenes/ICONOAVISODEPRIVACIDAD.png"> </a> 
                        </div> 
                    </div>
                        
            </div> 
            
          

    </div>

        <div class="col-md-8">
            <div class="card my-1" id="task-result">
                <div class="card-body">
                    <ul id="container"></ul>
                </div>
            </div>
            <div class="panel panel-primary">
                <div id="myDiv"><!-- Plotly chart -->Estimados usuarios,

Ofrecemos nuestras mas sinceras disculpas por las demoras en la habilitacion del servicio de pago en linea. Estamos trabajando intensamente para implementar mejoras que fortaleceran la seguridad y optimizaran la experiencia.

Agradecemos su comprension y paciencia mientras finalizamos estos ajustes, que tienen como principal objetivo brindarles un servicio mas confiable y seguro.

Atentamente: El equipo de Informatica JUMAPAC</div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Cuenta</th>
                        <th>Vencimiento</th>
                        <th>Adeudo</th>
                        <th>Estatus de Pago</th>
                        <th></th>
                        <th></th>
                        <th>HistÃ³rico</th>
                    </tr>
                </thead>
                <tbody id="tasks"></tbody>
            </table>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Fecha del Movimiento</th>
                        <th>AutorizaciÃ³n</th>
                        <th>Estatus</th>
                        <th>Respuesta 3DS</th>
                    </tr>
                </thead>
                <tbody id="tasksM"></tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/ReciboPagoapp.js"></script>
</body>
</html>
