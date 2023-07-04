const form = document.getElementById('udt_users');

function validar() {
    // Obtener nombre de archivo
    let archivo = document.getElementById('file_upl').value,
    // Obtener extensión del archivo
        extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);
    // Si la extensión obtenida no está incluida en la lista de valores
    // del atributo "accept", mostrar un error.

    if(document.getElementById('file_upl').getAttribute('accept').split(',').indexOf(extension) < 0) {
      alert('Archivo inválido. No se permite la extensión ' + extension);
      document.getElementById('file_upl').value='';
    }
  }

  function subirArchivo(){

    console.log('Hola');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "subirArchivoUs", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            data=xhr.response;
            alertify.success(data, 0);

      }
    }
  }

    let formData = new FormData(form);
    console.log(formData);
    xhr.send(formData);
  }  





/*
form.onsubmit = (e)=>{
    e.preventDefault();
}

function subirArchivo(){
    fromarchivo = new From()

}
*/
