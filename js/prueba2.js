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

 

function revisar(){
   var contra=document.getElementById('contra').value;
   var contra2=document.getElementById('contra2').value;
   var correo=document.getElementById('correo').value;

   if(contra=="" || contra2=="" || correo==""){
        resultador=1;
        alert("Todos los campos son obligatorios");
        return false;
   }else if(!(contra===contra2)){
        resultador=1;
        alert("No coinciden las contraseñas");
        return false;
    }else{
         const postData = {
            correo: $('#correo').val(),
            contra: $('#contra').val(),
          };
          console.log(postData);
         $.post('conexion/resetPass.php', postData, function(response){
            if(response!=""){
            alert("Se actualizo el password correctamente");
            location.href="cuenta.php";
         }
       })

      return true; 
  }   
}  