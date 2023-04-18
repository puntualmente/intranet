const form = document.querySelector("#signupform"),
continueBtn = document.querySelector("#buttoninput"),
errorText = document.querySelector("#error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "signup", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="registrar";
              }else{

                if(data==="¡Todos los campos de entrada son obligatorios!"){
                  alertify.error(data);
                }else{
                  alertify.success(data);
                  limpiarFormulario();
                }
              
          }
      }
    }
  }

    let formData = new FormData(form);
    xhr.send(formData);
  }


  function limpiarFormulario() {
    document.getElementById('nombre').innerHTML="";
    document.getElementById('apellido').innerHTML="";
    document.getElementById('cedula').innerHTML="";
    document.getElementById('telefono').innerHTML="";
    document.getElementById('foto').innerHTML="";
    document.getElementById('nacimiento').innerHTML="";
    document.getElementById('contraseña').innerHTML="";
    document.getElementById('f_ingreso').innerHTML="";
  }


// Determinar peso de las imagenes
/*
timg=document.getElementById('tarchivo').value;

$('#myFile').change( function() {
  if(this.files[0].size > timg) { // 512000 bytes = 500 Kb
  		$(this).val('');
    $('#errores').html("El archivo supera el límite de peso permitido.");
    console.log(timg);
  } else { //ok
     var formato = (this.files[0].name).split('.').pop();
    //alert(formato);
     	if(formato.toLowerCase() == 'jpg' || formato.toLowerCase() == 'png' || formato.toLowerCase() == 'gif') {
        	$('#errores').html("IMAGEN VALIDA, Ha pasado la prueba con éxito.");
          console.log(timg);
      } else {
        $(this).val('');
        $('#errores').html("Formato no soportado");
      }
     }
});*/