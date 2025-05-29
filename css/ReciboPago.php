<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago en Linea</title>
    
    <link rel="shortcut icon" type="image/png" href="imagenes/LJ.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo_iconos.css">
    <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
    <?php
    session_start();
      if(!isset($_SESSION["Correo1S"])){
             header("Location:ReciboPago1.php");
      }
      $correo1=$_SESSION["Correo1S"];    
  ?>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a href="#" class="navbar-brand">Cuentas Relacionadas a   <?php echo  $correo1; ?> </a>
    <ul class="navbar-nav ml -auto">
        <form class="form-inline my-2 my-lg-0">
            <input type="search" id="search" class="form-control mr-sm-2" placeholder="Numero de Cuenta"  >
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
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
                            <div  class="form-group"> <input type="hidden" id = "taskHist"> </div>
                            
                            <div class="form-group"> 
                                <input type="text" id="name" placeholder="Cuenta" class="form-control">
                            </div>
                            <div class="form-group">
                                <input  id="description" class="form-control" placeholder="Reparto">
                            </div>
                            <button type="submit" class="btn btn-success btn-block text-center">
                                Guardar  
                            </button>
                            <form action="" class="group"></form>
                        </form>                        
                    </div>  
                    
                    <div class="card my-1" id="enlaces_int">
                        <div class= "enlaces">              
                          <a href="TérminosyCondiciones.pdf" target="_blank"&nbsp;&nbsp;&nbsp;&nbsp;><img src="imagenes/ICONO_TERMINOSYCONDICIONES.png"> </a>  <a href="AVISO DE PRIVACIDAD PARA WEB.pdf" target="_blank"><img src="imagenes/ICONOAVISODEPRIVACIDAD.png"> </a> 
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
                <div id='myDiv'><!-- Plotly chart will be drawn inside this DIV --></div>
            </div>
    </div>  
   
</div>

<div class="row">
        <div class="col-md-12"> 
            <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>Cuenta</td>
                            <td>Vencimiento</td>
                            <td>Adeudo </td>
                            <td>Estatus de Pago</td>
                            <td></td>
                            <td></td>
                            <td>Historico</td>
                        </tr>
                    </thead>
                    <tbody id="tasks"></tbody>
            </table>            
        </div> 
</div>

    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

   <script src="js/ReciboPagoapp.js"></script>
    
</body>
  
    
</html>