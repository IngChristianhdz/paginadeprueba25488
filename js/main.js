function mostrarContrasena(){
      var tipo = document.getElementById("contra");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }


function mostrarContrasena2(){
      var tipo = document.getElementById("contra2");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }

function validador(){
    var mayus= new RegExp("^(?=.*[A-Z])");
    var special=new RegExp("^(?=.*[!@#$&%*])");
    var number=new RegExp("^(?=.*[0-9])");
    var lowe= new RegExp("^(?=.*[a-z])");
    var len=new RegExp("^(?=.{8,})");

    $("#contra").on("keyup", function(){
        var contra=$("#contra").val();
        if(mayus.test(contra) && special.test(contra) && number.test(contra) && lowe.test(contra) && len.test(contra)){
              $("#mensaje").text("Segura").css("#mensaje","Color","green");
        }else {
             $("#mensaje").text("Insegura").css("Color","red");
        }
    })
}

function validador2(){
    var mayus= new RegExp("^(?=.*[A-Z])");
    var special=new RegExp("^(?=.*[!@#$&%*])");
    var number=new RegExp("^(?=.*[0-9])");
    var lowe= new RegExp("^(?=.*[a-z])");
    var len=new RegExp("^(?=.{8,})");

    $("#contra2").on("keyup", function(){
        var contra=$("#contra2").val();
        if(mayus.test(contra) && special.test(contra) && number.test(contra) && lowe.test(contra) && len.test(contra)){
              $("#mensaje2").text("Segura");
              $("#mensaje2").css("Color","green");
        }else {
             $("#mensaje2").text("Insegura").css("Color","red");
        }
    })
}

$(document).ready(function() {	
    $('#correo').on('blur', function() {
        $('#result_correo').html('<img src="imagenes/loader.gif" />').fadeOut(1000);
 
        var correo = $(this).val();		
        var dataString = 'correo='+correo;
 
        $.ajax({
            type: "POST",
            url: "conexion/buscar_correo.php",
            data: dataString,
            success: function(data) {
                 $('#result_correo').fadeIn(1000).html(data);
               
              }
        });
    });              
});    

$(document).ready(function() {	
    $('#cuenta').on('blur', function() {
        $('#result-cuenta').html('<img src="imagenes/loader.gif" />').fadeOut(1000);
 
        var cuenta = $(this).val();		
        var dataString = 'cuenta='+cuenta;
 
        $.ajax({
            type: "POST",
            url: "conexion/buscar_cuenta.php",
            data: dataString,
            success: function(data) {
                $('#result-cuenta').fadeIn(1000).html(data);
            }
        });
    });              
});  

$(document).ready(function() {	
    $('#reparto').on('blur', function() {
        $('#result-reparto').html('<img src="imagenes/loader.gif" />').fadeOut(1000);
 
        var reparto = $(this).val();		
        var dataString = 'reparto='+reparto;
 
        $.ajax({
            type: "POST",
            url: "conexion/buscar_reparto.php",
            data: dataString,
            success: function(data) {
                $('#result-reparto').fadeIn(1000).html(data);
            }
        });
    });              
});  


function revisar(){
    var nombre=document.getElementById('nombre').value;
    var domicilio=document.getElementById('domicilio').value;
    var sexo=document.getElementById('select2').value;
    var ciudad=document.getElementById('ciudad').value;
    var estado=document.getElementById('select3').value;
    var celular=document.getElementById('celular').value;
    var telefono=document.getElementById('telefono').value;
    var cuenta=document.getElementById('cuenta').value;
    var reparto=document.getElementById('reparto').value;
    var correo=document.getElementById('correo').value;
    var contra=document.getElementById('contra').value;
    var contra2=document.getElementById('contra2').value;
    var pregunta=document.getElementById('select1').value;
    var respuesta=document.getElementById('respuesta').value;
    var resultado=document.getElementById('result_correo').value;
    indice1 = document.getElementById("select1").selectedIndex;
    indice2 = document.getElementById("select2").selectedIndex;
    indice3 = document.getElementById("select3").selectedIndex; 
    var resultador = 0;


    expresion = /\w+@\w+\.+[a-z]/;
    expresion2= /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;

    if(nombre =="" || domicilio=="" || sexo=="" || ciudad=="" || estado=="" || celular=="" 
        || cuenta=="" || reparto=="" || correo=="" || contra=="" || contra2=="" || pregunta==""
        || respuesta=="" || terminos=="" ){
        resultador=1;
        alert("Todos los campos son obligatorios");
        return false;
    }else if(!expresion.test(correo)){
      resultador=1;
      alert("El correo no es valido");
           return false;
    }else if(!expresion2.test(celular)){
         resultador=1;
        alert("El numero no es valido");
        return false;
    }else if(!expresion2.test(telefono)){
         resultador=1;
        alert("El numero no es valido");
        return false;    
    }else if(!(contra===contra2)){
         resultador=1;
        alert("No coinciden las contraseñas");
        return false;
    }else if( !terminos.checked ) {
         resultador=1;
        alert("No se han aceptado los terminos");
        return false;
    }else if( indice1 == null || indice1 == 0  ||  indice2 == null || indice2 == 0  ||  indice3 == null || indice3 == 0 ) {
        resultador=1;
       alert("Debes seleccionar una opcion");
       return false;
   }else if($("#result_correo").val() == '1' ){
        resultador=1;
       alert("Este correo ya se encuentra registrado");
       return false;
   }
       const postData = {
            nombre: $('#nombre').val(),
            domicilio: $('#domicilio').val(),
            sexo: $('#select2').val(),
            ciudad: $('#ciudad').val(),
            estado: $('#select3').val(),
            celular: $('#celular').val(),
            telefono: $('#telefono').val(),
            cuenta: $('#cuenta').val(),
            reparto: $('#reparto').val(),
            correo: $('#correo').val(),
            contra: $('#contra').val(),
            conf_contra: $('#contra2').val(),
            pregunta: $('#select1').val(),
            respuesta: $('#respuesta').val(),
            terminos: $('#terminos').val() 
    };
                                     
      $.post('conexion/agregar_usuario.php', postData, function(response){
         console.log(response);
         if(response!=""){
            alert("Se agregaron los datos correctamente");
             location.href="cuenta.php";
         }
        
     })
    
   return true; 
}