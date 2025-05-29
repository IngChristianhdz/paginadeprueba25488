<?php
require_once ('conexion/database1.php');

$NPozo=substr($_POST["PozosdE"],0,3);
$NoPozo=$_POST["PozosdE"];
?>
<!DOCTYPE HTML>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php     
            echo $NoPozo;
            ?> </title>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Metros Columna de Agua',
            x: -20 //center
        },
        subtitle: {
            text: '<?php     
            echo $NoPozo;
            ?>',
            x: -20
        },
        xAxis: {
            categories: [
            <?php  
            $query =  "SELECT * " . " FROM pozo".$NPozo . " WHERE DATE(fecha) >= DATE_ADD(DATE(NOW()), INTERVAL -8 DAY ) AND DATE(fecha) <= DATE(NOW()) ORDER BY fecha ASC  ";             
            $fila= mysqli_query($connection, $query) ;
            $row = mysqli_fetch_assoc($fila);
            $totalRows = mysqli_num_rows($fila);  

            do    {
                ?>
                '<?php echo $row['fecha'] ?>',
                <?php
            }
            while ($row = mysqli_fetch_assoc($fila)); 
            ?>

            ]
        },
        yAxis: {
            title: {
                text: 'Metros (mts)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: 'mts'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Tanque',
            data: [
            <?php                       
            
            $query =  "SELECT * " . " FROM pozo".$NPozo  . " WHERE DATE(fecha) >= DATE_ADD(DATE(NOW()), INTERVAL -8 DAY ) AND DATE(fecha) <= DATE(NOW()) ORDER BY fecha ASC  ";            
            $fila= mysqli_query($connection, $query) ;
            $row = mysqli_fetch_assoc($fila);
            $totalRows = mysqli_num_rows($fila);  
            $b=0;

do    {
                ?>
                <?php 
$a=$row['VTanque'];

if($a>=0  )
{
$b=$row['VTanque'];
}
echo $b ?>,
                <?php
            }
            while ($row = mysqli_fetch_assoc($fila)); 
            ?>
            ]        
        },{
            name: 'Carcamo',
            data: [
            <?php                       
            
            $query =  "SELECT * " . " FROM pozo".$NPozo  . " WHERE DATE(fecha) >= DATE_ADD(DATE(NOW()), INTERVAL -8 DAY ) AND DATE(fecha) <= DATE(NOW()) ORDER BY fecha ASC  ";            
            $fila= mysqli_query($connection, $query) ;
            $row = mysqli_fetch_assoc($fila);
            $totalRows = mysqli_num_rows($fila);  
            $b=0;

do    {
                ?>
                <?php 
$a=$row['VCarcamo'];

if($a>=0  )
{
$b=$row['VCarcamo'];
}
echo $b ?>,
                <?php
            }
            while ($row = mysqli_fetch_assoc($fila)); 
            ?>
            ]        
        },{
            name: 'Dinamico',
            data: [
            <?php                       
            
            $query =  "SELECT * " . " FROM pozo".$NPozo  . " WHERE DATE(fecha) >= DATE_ADD(DATE(NOW()), INTERVAL -8 DAY ) AND DATE(fecha) <= DATE(NOW()) ORDER BY fecha ASC  ";            
            $fila= mysqli_query($connection, $query) ;
            $row = mysqli_fetch_assoc($fila);
            $totalRows = mysqli_num_rows($fila);  
            $b=0;

do    {
                ?>
                <?php 
$a=$row['VDinamico'];

if($a>=0  )
{
$b=$row['VDinamico']/100;
}
echo $b ?>,
                <?php
            }
            while ($row = mysqli_fetch_assoc($fila)); 
            ?>
            ]        
        },{
            name: 'Remoto',
            data: [
            <?php                       
            
            $query =  "SELECT * " . " FROM pozo".$NPozo  . " WHERE DATE(fecha) >= DATE_ADD(DATE(NOW()), INTERVAL -8 DAY ) AND DATE(fecha) <= DATE(NOW()) ORDER BY fecha ASC  ";            
            $fila= mysqli_query($connection, $query) ;
            $row = mysqli_fetch_assoc($fila);
            $totalRows = mysqli_num_rows($fila);  
            $b=0;

do    {
                ?>
                <?php 
$a=$row['VRemoto'];

if($a>=0  )
{
$b=$row['VRemoto'];
}
echo $b ?>,
                <?php
            }
            while ($row = mysqli_fetch_assoc($fila)); 
            ?>
            ]        
        },{
            name: 'Bomba1',
            data: [
            <?php                       
            
            $query =  "SELECT * " . " FROM pozo".$NPozo  . " WHERE DATE(fecha) >= DATE_ADD(DATE(NOW()), INTERVAL -8 DAY ) AND DATE(fecha) <= DATE(NOW()) ORDER BY fecha ASC  ";            
            $fila= mysqli_query($connection, $query) ;
            $row = mysqli_fetch_assoc($fila);
            $totalRows = mysqli_num_rows($fila);  
            $b=0;

do    {
                ?>
                <?php 
$a=$row['statusb1'];

if($a=="ON"  )
{
$b=1;
}else{$b=0;
}
echo $b ?>,
                <?php
            }
            while ($row = mysqli_fetch_assoc($fila)); 
            ?>
            ]        
        },{
            name: 'Bomba2',
            data: [
            <?php                       
            
            $query =  "SELECT * " . " FROM pozo".$NPozo  . " WHERE DATE(fecha) >= DATE_ADD(DATE(NOW()), INTERVAL -8 DAY ) AND DATE(fecha) <= DATE(NOW()) ORDER BY fecha ASC  ";            
            $fila= mysqli_query($connection, $query) ;
            $row = mysqli_fetch_assoc($fila);
            $totalRows = mysqli_num_rows($fila);  
            $b=0;

do    {
                ?>
                <?php 
$a=$row['statusb2'];

if($a=="ON"  )
{
$b=1.1;
}else{$b=0.1;
}
echo $b ?>,
                <?php
            }
            while ($row = mysqli_fetch_assoc($fila)); 
            ?>
            ]        
        },{
            name: 'Reseteo',
            data: [
            <?php                       
            
            $query =  "SELECT * " . " FROM pozo".$NPozo  . " WHERE DATE(fecha) >= DATE_ADD(DATE(NOW()), INTERVAL -8 DAY ) AND DATE(fecha) <= DATE(NOW()) ORDER BY fecha ASC  ";            
            $fila= mysqli_query($connection, $query) ;
            $row = mysqli_fetch_assoc($fila);
            $totalRows = mysqli_num_rows($fila);  
            $b=0;

do    {
                ?>
                <?php 
$a=$row['observacion'];

if($a=="RESETEO_PROGRAMADO"  )
{
$b=.7;
}else{$b=0.;
}
echo $b ?>,
                <?php
            }
            while ($row = mysqli_fetch_assoc($fila)); 
            ?>
            ]        
        }]
    });
});
		</script>
	</head>
	<body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>