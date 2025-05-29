function revisar(){
    var nombre=document.getElementById('name').value;
    var correo=document.getElementById('email').value;
    var telefono=document.getElementById('phone').value;
    var cuenta=document.getElementById('count').value;
    var asunto=document.getElementById('subject').value;
    var mensaje=document.getElementById('msj').value;
    var response = grecaptcha.getResponse();
  

    expresion = /\w+@\w+\.+[a-z]/;
    expresion2= /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;

    if(nombre =="" || cuenta=="" || correo=="" || correo=="" || telefono=="" || asunto==""
        || mensaje=="" ){
         alert("Todos los campos son obligatorios");
        return false;
    }else if(!expresion.test(correo)){
        alert("El correo no es valido");
           return false;
    }else if(!expresion2.test(telefono)){
        alert("El numero no es valido");
        return false;    
    }if(response.length == 0){
      alert("Captcha no verificado")
      return false;
    }
   
     document.getElementById("Bn").value="1";
     
}

