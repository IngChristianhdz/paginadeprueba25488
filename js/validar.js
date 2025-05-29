function validar() {
    var txtcorreo, txtpass, expresion;
    txtcorreo = document.getElementById("txtcorreo").value;
    txtpass = document.getElementById("txtpass").value;
    
    expresion = /\w+@\w+\.+[a-z]/;
    
  if(txtcorreo === "" || txtpass === ""){
      alert("Todos los campos son obligatorios");
      return false;
  }else if(!expresion.test(txtcorreo)){
      alert("El correo no es valido");
      return false;
    }

}
