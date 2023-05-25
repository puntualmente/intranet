function validar(id){
    // Obtener nombre de archivo
    let archivo = document.getElementById(id).value,
    // Obtener extensión del archivo
        extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);
    // Si la extensión obtenida no está incluida en la lista de valores
    // del atributo "accept", mostrar un error.

    if(document.getElementById(id).getAttribute('accept').split(',').indexOf(extension) < 0) {
      alert('Archivo inválido. No se permite la extensión ' + extension);
      document.getElementById(id).value='';
    }

  
}



const form = document.querySelector("#form_perfil"),
continueBtn = document.querySelector("#buttoninput"),
errorText = document.querySelector("#error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{

    var inputs = document.querySelectorAll('input[type="file"]');
    var isEmpty = false;

    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].files.length === 0) {
        isEmpty = true;
        break;
      }
    }

    if (isEmpty) {
      event.preventDefault(); // Evita el envío del formulario
      alert("Debes llenar Todos los campos.");
    }else{
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "perfildata", true);
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
                }
              
          }
      }
    }
  }

    let formData = new FormData(form);
    xhr.send(formData);
    }
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