 $(document).ready(function(){
    $("#enviar").click (function (){
        $.post("conexion/buscar_correo.php", function(dato){
            $("#resultado").html(dato);
            console.log("#resultado")
        })
    });
});

$(function(){
   console.log('jQuery is Working');
   $("#correo").keyup(function(){
      let correo=  $("#correo").val();
       
      $.ajax({
         url:"https://www.jumapac.gob.mx/conexion/buscar_correo.php",
         type:"POST",
          data:{correo},
          success: function(response){
                  dato=response;
                  console.log(response);
              }
          })
       })
  
    
    
 $("#formulario").submit(function(e){
    const postData = {
            sexo: $('#sexo').val(),
            nombre: $('#nombre').val(),
            domicilio: $('#domicilio').val(),
            ciudad: $('#ciudad').val(),
            estado: $('#estado').val(),
            celular: $('#celular').val(),
            telefono: $('#telefono').val(),
            cuenta: $('#cuenta').val(),
            reparto: $('#reparto').val(),
            correo: $('#correo').val(),
            contra: $('#contra').val(),
            conf_contra: $('#conf_contra').val(),
            pregunta: $('#pregunta').val(),
            respuesta: $('#respuesta').val(),
            terminos: $('#terminos').val() 
    };
     $.post('conexion/agregar_usuario.php', postData, function(response){
         console.log(response);
     })
     e.preventDefault();
 })  
    
});