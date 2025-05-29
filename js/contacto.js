function revisar(){
    var nombre=document.getElementById('nombre').value;
    var telefono=document.getElementById('phone').value;
    var cuenta=document.getElementById('count').value;
    var correo=document.getElementById('email').value;
    var mensaje=document.getElementById('msj').value;
    indice1 = document.getElementById("subject").selectedIndex;
   

    expresion = /\w+@\w+\.+[a-z]/;
    expresion2= /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;

    if(nombre ==""  || telefono=="" || cuenta=="" || correo=="" || mensaje==""){
        alert("Todos los campos son obligatorios");
        return false;
    }else if(!expresion.test(correo)){
      alert("El correo no es valido");
      return false;
    }else if(!expresion2.test(telefono)){
        alert("El numero no es valido");
        return false;
    }else if( indice1 == null || indice1 == 0 ) {
       alert("Debes seleccionar una opcion");
       return false;
    }else if( mensaje == null || mensaje.length == 0 || /^\s+$/.test(mensaje) ) {
        return false;
    }
   
}


