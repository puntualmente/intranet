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


    nombre=document.getElementById('nombre').value;
    celular=document.getElementById('celular').value;
    direccion=document.getElementById('direccion').value;
    con_info=document.getElementById('con_info').value;
    cedula=document.getElementById('cedula').value;
    correo=document.getElementById('correo').value;
    idiomas=document.getElementById('idiomas').value;
    ap_hab=document.getElementById('ap_hab').value;
    perfil=document.getElementById('perfil').value;



    var inputs = document.querySelectorAll('input[type="file"]');
    var isEmpty = false;

    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].files.length === 0) {
        isEmpty = true;
        break;
      }
    }

    if (isEmpty || nombre=="" || celular=="" || direccion=="" || con_info=="" || cedula=="" || correo=="" || idiomas=="" ||ap_hab=="" || perfil=="") {
      event.preventDefault(); // Evita el envío del formulario
      alert("Debes llenar Todos los campos.");
    }else{

    buttoninput=document.getElementById('buttoninput');
    buttoninput.disabled=true;

    cargando=document.getElementById('cargando');
    cargando.style.display = "";
    buttoninput=document.getElementById('buttoninput');
    buttoninput.disabled;
    
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "perfildata", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="registrar";
              }else{

                if(data==="Guardado con exito"){
                  alertify.success(data);
                  setTimeout(() => {
                    location.href="perfil";;
                  }, 2000); 
                  cargando.style.display = "none";
                }else{
                  alertify.error(data);
                }
              
          }
      }
    }
  }

    let formData = new FormData(form);
    xhr.send(formData);
    }
  }



  function agregarTrabajos(){

    empresa=document.getElementById('empresa').value;
    cargo=document.getElementById('cargo').value;
    f_ini_emp=document.getElementById('f_ini_emp').value;
    f_fin_emp=document.getElementById('f_fin_emp').value;
    funciones=document.getElementById('funciones').value;
    tablatrabajo = document.getElementById('trabajos');

    if(empresa==""||cargo==""||f_ini_emp==""||f_fin_emp==""||funciones==""){
        alertify.error("Llena todos los campos");
    }else{

    obj = [{ "empresa": `${empresa}`, "cargo": `${cargo}`, "f_ini_emp": `${f_ini_emp}`,"f_fin_emp": `${f_fin_emp}`,"funciones": `${funciones}`, "opcion": 0}];
            console.log(obj)
            dbParam = JSON.stringify(obj);
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "perfildata", true);
          xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                let data = xhr.response;
                //document.getElementById('nombrearea').value='';
                tablatrabajo.innerHTML = data;
                alertify.success("Cargado con exito");
                empresa=document.getElementById('empresa').value="";
                cargo=document.getElementById('cargo').value="";
                f_ini_emp=document.getElementById('f_ini_emp').value="";
                f_fin_emp=document.getElementById('f_fin_emp').value="";
                funciones=document.getElementById('funciones').value="";
                document.getElementById('cerrarmodaltrabajo').click();
              }
          }
        }
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("x=" + dbParam);

      }
  }

  function agregarEscolaridad(){
    institucion=document.getElementById('institucion').value;
    titulo=document.getElementById('titulo').value;
    f_ini_escol=document.getElementById('f_ini_escol').value;
    f_fin_escol=document.getElementById('f_fin_escol').value;
    tablaescolaridad = document.getElementById('escolaridad');

    if(institucion==""||titulo==""||f_ini_escol==""||f_fin_escol==""){
      alertify.error("Llena todos los campos");
    }else{
    obj = [{ "institucion": `${institucion}`, "titulo": `${titulo}`, "f_ini_escol": `${f_ini_escol}`,"f_fin_escol": `${f_fin_escol}`, "opcion": 1}];
            console.log(obj)
            dbParam = JSON.stringify(obj);
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "perfildata", true);
          xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                let data = xhr.response;
                //document.getElementById('nombrearea').value='';
                tablaescolaridad.innerHTML = data;
                alertify.success("Cargado con exito");
                institucion=document.getElementById('institucion').value="";
                titulo=document.getElementById('titulo').value="";
                f_ini_escol=document.getElementById('f_ini_escol').value="";
                f_fin_escol=document.getElementById('f_fin_escol').value="";
                document.getElementById('cerrarmodalescolaridad').click();
              }
          }
        }
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("x=" + dbParam);
      }
  }

  function agregarRef(){

    nombre_ref=document.getElementById('nombre_ref').value;
    telefono=document.getElementById('telefono').value;
    parentesco=document.getElementById('parentesco').value;
    tablareferencias = document.getElementById('referencias');

    if(nombre_ref==""&&telefono==""&&parentesco==""){
      alertify.error("Llena todos los campos");
    }else{
    obj = [{ "nombre_ref": `${nombre_ref}`, "telefono": `${telefono}`, "parentesco": `${parentesco}`, "opcion": 2}];
            console.log(obj)
            dbParam = JSON.stringify(obj);
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "perfildata", true);
          xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                let data = xhr.response;
                //document.getElementById('nombrearea').value='';
                tablareferencias.innerHTML = data;
                alertify.success("Cargado con exito");
                nombre_ref=document.getElementById('nombre_ref').value="";
                telefono=document.getElementById('telefono').value="";
                parentesco=document.getElementById('parentesco').value="";
                document.getElementById('cerrarmodalreferen').click();

              }
          }
        }
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("x=" + dbParam);
      }
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