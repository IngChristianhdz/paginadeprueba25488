function mensaje(){
	if($conector=0){
     document.write("Fallo la conexion")
	}
	else{
		if($conector=1){
			if($row['correo1'] == txtcorreo){

			}else{
			 document.write("El correo no esta registrado")
			}
		}
	}
}