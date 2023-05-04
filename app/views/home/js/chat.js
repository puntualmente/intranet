
inputField = document.getElementById('msg');
sendBtn = document.getElementById('enviar');
form = document.getElementById('typing-area');
contenidochat = document.getElementById('contenidochat');





form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    inputField.disabled = false;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chat/insertchat", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              let data = xhr.response;
              document.getElementById('texto_error').innerHTML=data;
              limpiar();
              setTimeout(function(){
                document.getElementById('final').scrollIntoView(true);
              }, 500);
            }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

var divImagen = document.getElementById("imagen");

document.addEventListener("paste", function(event){
   var items = event.clipboardData.items;
   for (var i = 0; i < items.length; i++) {
      if (items[i].type.indexOf("image") !== -1) {
         var blob = items[i].getAsFile();
         var url = URL.createObjectURL(blob);
         var img = new Image();
         img.src = url;
         //divImagen.appendChild(img);
         console.log(blob);
         //enviarImagenAlServidor(blob);
         enviarImagen(blob);
      }
   }
});

function enviarImagen(imagen){
    var formData = new FormData(form);
   formData.append("image", imagen);
   var xhr = new XMLHttpRequest();
   xhr.open("POST", "chat/insertchat", true);
   xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
         data = xhr.response;
         console.log("Imagen guardada en el servidor");
         document.getElementById('texto_error').innerHTML=data;
         setTimeout(function(){
            document.getElementById('final').scrollIntoView(true);
          }, 500);

      }
   };
   xhr.send(formData);
}






document.getElementById("inputima").addEventListener('click', function() {
    document.getElementById("file-input").click();
});

document.getElementById("file-input").addEventListener('change', function() {
    let pos = this.files.length - 1;
    inputField.disabled = true;
    inputField.value = "";
    document.getElementById('add_labels').innerHTML="";
    document.getElementById("add_labels").innerHTML += `<div class="details">${this.files[pos].name} 
    <button onclick="limpiar()">x</button></div>`;
    sendBtn.classList.add("active");
});

function limpiar(){
    sendBtn.classList.remove("active");
    document.getElementById('file-input').value ='';
    document.getElementById('add_labels').innerHTML="";
}

    function areaselect(id){

        mostrar_etiqueta=document.getElementById('etiqueta');
        mostrar_users_areas = document.getElementById('users_area');
        console.log(id);
     
        obj = [{ "id_area": id, "tipo": 1 }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "chat/otrasconsultastick", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            mostrar_etiqueta.innerHTML = data;
                var genericExamples = document.querySelectorAll('[data-trigger]');
                for (i = 0; i < genericExamples.length; ++i) {
                    var element = genericExamples[i];
                    new Choices(element, {
                        placeholderValue: 'This is a placeholder set in the config',
                        searchPlaceholderValue: 'This is a search placeholder',
                    });
                }
            
                // singleNoSearch
                var singleNoSearch = new Choices('#choices-single-no-search', {
                    searchEnabled: false,
                    removeItemButton: true,
                    choices: [
                        { value: 'One', label: 'Label One' },
                        { value: 'Two', label: 'Label Two', disabled: true },
                        { value: 'Three', label: 'Label Three' },
                    ],
                }).setChoices(
                    [
                        { value: 'Four', label: 'Label Four', disabled: true },
                        { value: 'Five', label: 'Label Five' },
                        { value: 'Six', label: 'Label Six', selected: true },
                    ],
                    'value',
                    'label',
                    false
                );
            
                // singleNoSorting
                var singleNoSorting = new Choices('#choices-single-no-sorting', {
                    shouldSort: false,
                });
            
            
                // multiple Remove CancelButton
                var multipleCancelButton = new Choices(
                    '#choices-multiple-remove-button',
                    {
                        removeItemButton: true,
                    }
                );
            
                //choices-multiple-groups
                var multipleDefault = new Choices(
                    document.getElementById('choices-multiple-groups')
                );
            
                // text inputs example
                var textRemove = new Choices(
                    document.getElementById('choices-text-remove-button'),
                    {
                        delimiter: ',',
                        editItems: true,
                        maxItemCount: 5,
                        removeItemButton: true,
                    }
                );
            
                // choices-text-unique-values
                var textUniqueVals = new Choices('#choices-text-unique-values', {
                    paste: false,
                    duplicateItemsAllowed: false,
                    editItems: true,
                });
            
                //choices-text-disabled
                var textDisabled = new Choices('#choices-text-disabled', {
                    addItems: false,
                    removeItems: false,
                }).disable();
          }else{
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);
    }

    function crearTicket(){

        areaDestTkt=document.getElementById('area').value;
        select_etk=document.getElementById('sel_etiqueta').value;
        descrip=document.getElementById('descripticket').value;
        user_destino= document.getElementById('sel_user').value;

        mensajetkt=document.getElementById('mensajeticket');

        obj = [{ "area_dest_tkt": areaDestTkt, "etiqueta": select_etk, "descrip": descrip, "user_destino": user_destino,"estado": 0 }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
        let enviarticket = new XMLHttpRequest();
        enviarticket.open("POST", "chat/tkt/creartkt", true);
        enviarticket.onload = ()=>{
        if(enviarticket.readyState === XMLHttpRequest.DONE){
            if(enviarticket.status === 200){
                let data = enviarticket.response;
                Swal.fire(
                    {
                        title: 'Ticket Creado con Exito!',
                        text: data,
                        icon: 'success',
                        confirmButtonColor: '#5156be'
                    }
                )
                document.getElementById('cerrarmodalticket').click();
            }
        }
    }
    enviarticket.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    enviarticket.send("x=" + dbParam);

    }

    function mostrarimg(src){
        console.log(src);
    }

    


    

