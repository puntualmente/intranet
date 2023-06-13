
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

        id_enviar=document.getElementById('id_enviar').value;
        contenidochat = document.querySelector("#contenidochat");
        tipo_chat = document.getElementById('tipo_chat').value;

        console.log(tipo_chat);

        inputField.value = "";
        let data = xhr.response;
        document.getElementById('texto_error').innerHTML=data;
        limpiar();
        setTimeout(function(){
            document.getElementById('final').scrollIntoView(true);
        }, 500);

        if(tipo_chat=="chat_1_1"){
            let xhr2 = new XMLHttpRequest();
            xhr2.open("POST", "chat/getchat", true);
            xhr2.onload = ()=>{
              if(xhr2.readyState === XMLHttpRequest.DONE){
                  if(xhr2.status === 200){
                    let data2 = xhr2.response;
                    contenidochat.innerHTML = data2;
                  }
              }
            }
            xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr2.send("id_user=" + id_enviar);

            let xhr3 = new XMLHttpRequest();
            xhr3.open("GET", "chat/users", true);
            xhr3.onload = ()=>{
              if(xhr3.readyState === XMLHttpRequest.DONE){
                  if(xhr3.status === 200){
                    let data = xhr3.response;
                      usersList.innerHTML = data;
                  }
              }
            }
            xhr3.send();
            setTimeout(function(){
            document.getElementById('final').scrollIntoView(true);
            }, 950);

        }else if(tipo_chat=="chat_grupo"){
            let xhr2 = new XMLHttpRequest();
            xhr2.open("POST", "chat/grupos/chat", true);
            xhr2.onload = ()=>{
                if(xhr2.readyState === XMLHttpRequest.DONE){
                    if(xhr2.status === 200){
                    let data2 = xhr2.response;
                    contenidochat.innerHTML = data2;
                    }
                }
            }
            xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr2.send("id_grupo=" + id_enviar);

            let xhr3 = new XMLHttpRequest();
            xhr3.open("GET", "chat/mostrargrupos", true);
            xhr3.onload = ()=>{
              if(xhr3.readyState === XMLHttpRequest.DONE){
                  if(xhr3.status === 200){
                    let data3 = xhr3.response;
                      listagrupos.innerHTML = data3;
                  }
              }
            }
            xhr3.send();
            //}, 800);
            setTimeout(function(){
            document.getElementById('final').scrollIntoView(true);
            }, 950);
        } 
            
        

            setTimeout(function(){
                document.getElementById('final').scrollIntoView(true);
              }, 1000);

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
         id_enviar=document.getElementById('id_enviar').value;
        contenidochat = document.querySelector("#contenidochat");
        tipo_chat = document.getElementById('tipo_chat').value;


            if(tipo_chat=="chat_1_1"){
                let xhr2 = new XMLHttpRequest();
                xhr2.open("POST", "chat/getchat", true);
                xhr2.onload = ()=>{
                  if(xhr2.readyState === XMLHttpRequest.DONE){
                      if(xhr2.status === 200){
                        let data2 = xhr2.response;
                        contenidochat.innerHTML = data2;
                      }
                  }
                }
                xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr2.send("id_user=" + id_enviar);
    
                let xhr3 = new XMLHttpRequest();
                xhr3.open("GET", "chat/users", true);
                xhr3.onload = ()=>{
                  if(xhr3.readyState === XMLHttpRequest.DONE){
                      if(xhr3.status === 200){
                        let data = xhr3.response;
                          usersList.innerHTML = data;
                      }
                  }
                }
                xhr3.send();
                setTimeout(function(){
                document.getElementById('final').scrollIntoView(true);
                }, 950);
    
            }else if(tipo_chat=="chat_grupo"){
                let xhr2 = new XMLHttpRequest();
                xhr2.open("POST", "chat/grupos/chat", true);
                xhr2.onload = ()=>{
                    if(xhr2.readyState === XMLHttpRequest.DONE){
                        if(xhr2.status === 200){
                        let data2 = xhr2.response;
                        contenidochat.innerHTML = data2;
                        }
                    }
                }
                xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr2.send("id_grupo=" + id_enviar);
    
                let xhr3 = new XMLHttpRequest();
                xhr3.open("GET", "chat/mostrargrupos", true);
                xhr3.onload = ()=>{
                  if(xhr3.readyState === XMLHttpRequest.DONE){
                      if(xhr3.status === 200){
                        let data3 = xhr3.response;
                          listagrupos.innerHTML = data3;
                      }
                  }
                }
                xhr3.send();
                //}, 800);
                setTimeout(function(){
                document.getElementById('final').scrollIntoView(true);
                }, 950);
            } 
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
        descrip=document.getElementById('descripticket').value;
        mensajetkt=document.getElementById('mensajeticket');

        mensajetkt.innerHTML=" <span> Campos Obligatorios</span> ";

        if(areaDestTkt==0){
            alertify.error("Los Campos son obligatorios", "", 0);

        }else{
            select_etk=document.getElementById('sel_etiqueta').value;
            user_destino= document.getElementById('sel_user').value;

            if(select_etk==0||user_destino==0){
                alertify.error("Los Campos son obligatorios");
            }else{
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

                        setTimeout(() => {
                            window.location.reload()
                          }, 3000);
                          

                    }
                }
            }
            enviarticket.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            enviarticket.send("x=" + dbParam);
            
            }

            
        }
    }

    function mostrarimg(src){
        console.log(src);
    }

 
    

    function validarRadio(value){
        contenido_etiquetado=document.getElementById('contenido_etiquetado');
        valorActivo = document.querySelector('input[name="crearMsjEtq"]:checked').value;
        console.log(valorActivo)
        console.log(value)

        if(value==1){
            contenido_etiquetado.innerHTML= `<label for="n_etiqueta_msg">Nombre de la Etiqueta</label>
            <input class="form-control" type="text" name="n_etiqueta_msg" id="n_etiqueta_msg">`
        }else if(value==0){
            contenido_etiquetado.innerHTML=`<label for="area" class="form-label font-size-13 text-muted">Area destino ticket:</label>
            <select class="form-control" data-trigger name="area">
                <option value="0" selected disabled>1. Elige un area</option>
                    <option value="<?php echo $value['id_area']?>"><?php echo $value['n_area']?></option>
            </select>`
        }
    }


    const download = document.querySelector('.download');


    // Obtener todas las imágenes con la clase 'imagen-clickable'

    download=document.querySelector('.download');

    function verimagen(imagen){

        imagesgru = [];
        images1 = [];


        console.log(imagen)
        id_enviar=document.getElementById('id_enviar').value;
        

        obj = [{ "id_user": id_enviar, "tipo": 0}];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "mostrarimagenchat", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            const images1 = data.split(",");
            console.log(images1);
         

        const popup = document.querySelector('.popupmostrarimagen');
        const closeBtn = document.querySelector('.close');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const image = document.querySelector('.image');
        let currentIndex2 = 0;


        const imagesgru = images1.filter(function(elemento) {
        return elemento.trim() !== "";
      });

      console.log(imagesgru)

    function openPopup(imagen) {

        console.log(imagen)

            let indice2 = imagesgru.indexOf(imagen);
            popup.style.display = 'flex';

            image.src = imagesgru[indice2];
            download.href=`${imagesgru[indice2]}`;

    }

    function closePopup() {
        popup.style.display = 'none';

    }

    function nextImage() {
            currentIndex2++;
            if (currentIndex2 >= imagesgru.length) {
                currentIndex2 = 0;
            }
            
                image.src = imagesgru[currentIndex2];
                download.href=`${imagesgru[currentIndex2]}`;
    }

    function prevImage() {
            currentIndex2--;
            if (currentIndex2 < 0) {
                currentIndex2 = imagesgru.length - 1;
            }
            
                image.src = imagesgru[currentIndex2];
                download.href=`${imagesgru[currentIndex2]}`;
                
            
    }


        closeBtn.addEventListener('click', closePopup);
        prevBtn.addEventListener('click', prevImage);
        nextBtn.addEventListener('click', nextImage);
        openPopup(imagen);

        }
    }}
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);

      } 



function verimagengrupo(imagen){

        console.log(imagen)

        imagesgru = [];
        images1gru = [];

        id_enviar=document.getElementById('id_enviar').value;

        obj = [{ "id_grupo": id_enviar, "tipo": 1}];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "mostrarimagenchat", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            const images1gru = data.split(",");
            console.log(images1gru);
         

        const popup = document.querySelector('.popupmostrarimagen');
        const closeBtn = document.querySelector('.close');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const image = document.querySelector('.image');

        let currentIndex2 = 0;


            const imagesgru = images1gru.filter(function(elemento) {
            return elemento.trim() !== "";
          });

          console.log(imagesgru)

        function openPopup(imagen) {

            console.log(imagen)

                let indice2 = imagesgru.indexOf(imagen);
                popup.style.display = 'flex';

                image.src = imagesgru[indice2];
                download.href=`${imagesgru[indice2]}`;


        }

        function closePopup() {
            popup.style.display = 'none';

        }

        function nextImage() {
                currentIndex2++;
                if (currentIndex2 >= imagesgru.length) {
                    currentIndex2 = 0;
                }
                
                    image.src = imagesgru[currentIndex2];
                    download.href=`${imagesgru[currentIndex2]}`;

        }

        function prevImage() {
                currentIndex2--;
                if (currentIndex2 < 0) {
                    currentIndex2 = imagesgru.length - 1;
                }
                
                    image.src = imagesgru[currentIndex2];
                    download.href=`${imagesgru[currentIndex2]}`;

                
        }

        closeBtn.addEventListener('click', closePopup);
        prevBtn.addEventListener('click', prevImage);
        nextBtn.addEventListener('click', nextImage);
        openPopup(imagen);

        }
    }}
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);

      } 



      

      /*Nueva funcion para visualizacion de mensajes destacados*/ 
      

      function verimagengrupo_2(imagen){

        console.log(imagen)

        if(tipo_chat=="chat_grupo"){
            tipo=1
        }else{
            tipo=0
        }

        imagesgru = [];
        images1gru = [];

        id_enviar2=document.getElementById('eti_msg').value;
        tipo_chat = document.getElementById('tipo_chat').value;
        id_enviar=document.getElementById('id_enviar').value;



        obj = [{ "id_grupo": id_enviar, "tipo": 3, "tipo_chat":tipo, "etiquetar_msg":id_enviar2}];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "mostrarimagenchat", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            const images1gru = data.split(",");
            console.log(images1gru);
         

        const popup = document.querySelector('.popupmostrarimagen');
        const closeBtn = document.querySelector('.close');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const image = document.querySelector('.image');

        let currentIndex2 = 0;


            const imagesgru = images1gru.filter(function(elemento) {
            return elemento.trim() !== "";
          });

          console.log(imagesgru)

        function openPopup(imagen) {

            console.log(imagen)

                let indice2 = imagesgru.indexOf(imagen);
                popup.style.display = 'flex';

                image.src = imagesgru[indice2];
                download.href=`${imagesgru[indice2]}`;


        }

        function closePopup() {
            popup.style.display = 'none';

        }

        function nextImage() {
                currentIndex2++;
                if (currentIndex2 >= imagesgru.length) {
                    currentIndex2 = 0;
                }
                
                    image.src = imagesgru[currentIndex2];
                    download.href=`${imagesgru[currentIndex2]}`;

        }

        function prevImage() {
                currentIndex2--;
                if (currentIndex2 < 0) {
                    currentIndex2 = imagesgru.length - 1;
                }
                
                    image.src = imagesgru[currentIndex2];
                    download.href=`${imagesgru[currentIndex2]}`;

                
        }

        closeBtn.addEventListener('click', closePopup);
        prevBtn.addEventListener('click', prevImage);
        nextBtn.addEventListener('click', nextImage);
        openPopup(imagen);

        }
    }}
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);


        /*

        console.log(imagen)

        imagesgru = [];
        images1gru = [];

        id_enviar=document.getElementById('eti_msg').value;

        obj = [{ "id_grupo": id_enviar, "tipo": 2}];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "mostrarimagenchat", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            const images1gru = data.split(",");
            console.log(images1gru);
         

        const popup = document.querySelector('.popupmostrarimagen');
        const closeBtn = document.querySelector('.close');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const image = document.querySelector('.image');

        let currentIndex2 = 0;


            const imagesgru = images1gru.filter(function(elemento) {
            return elemento.trim() !== "";
          });

          console.log(imagesgru)

        function openPopup(imagen) {

            console.log(imagen)

                let indice2 = imagesgru.indexOf(imagen);
                popup.style.display = 'flex';

                image.src = imagesgru[indice2];

        }

        function closePopup() {
            popup.style.display = 'none';

        }

        function nextImage() {
                currentIndex2++;
                if (currentIndex2 >= imagesgru.length) {
                    currentIndex2 = 0;
                }
                
                    image.src = imagesgru[currentIndex2];
        }

        function prevImage() {
                currentIndex2--;
                if (currentIndex2 < 0) {
                    currentIndex2 = imagesgru.length - 1;
                }
                
                    image.src = imagesgru[currentIndex2];
                
        }

        closeBtn.addEventListener('click', closePopup);
        prevBtn.addEventListener('click', prevImage);
        nextBtn.addEventListener('click', nextImage);
        openPopup(imagen);

        }
    }}
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);
*/

      } 

      /* Fin de la nueva funcion para visualizacion de mensajes destacados*/ 
      


function enviarid1v1(id, value){
    informacion_adicional=document.getElementById('informacion_adicional');
    informacion_adicional.innerHTML= `
        <label for="${id}" class="form-label font-size-13 text-muted">Mensaje a enviar:</label>
        <input disabled name="msg_reenviar" class="form-control bg-success" id="msg_reenviar" value="${value}" type="text">
        <input disabled name="esimagen" class="form-control bg-success" id="esimagen" value="0" type="text" hidden>

        `;
}

function enviaridgrupo(id, value){
    informacion_adicional=document.getElementById('informacion_adicional');
    informacion_adicional.innerHTML= `
        <label for="${id}" class="form-label font-size-13 text-muted">Mensaje a enviar:</label>
        <input disabled name="msg_reenviar" class="form-control bg-success" id="msg_reenviar" value="${value}" type="text">
        <input disabled name="esimagen" class="form-control bg-success" id="esimagen" value="1" type="text" hidden>
        `;
}


reenviar = document.getElementById('reenviar');

reenviar.onclick = ()=>{
    inputField2 = document.getElementById('msg_reenviar').value;
    esimagen=document.getElementById('esimagen').value;
    form2 = document.getElementById('form_reenviar_msg');
    tipo_chat = document.getElementById('tipo_chat').value;

    console.log(inputField2);

    let xhr = new XMLHttpRequest();
        xhr.open("POST", "chat/insertchat", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                alertify.success("Mensaje reenviado...", 0);

                if(tipo_chat=="chat_1_1"){
        
                    let xhr3 = new XMLHttpRequest();
                    xhr3.open("GET", "chat/users", true);
                    xhr3.onload = ()=>{
                      if(xhr3.readyState === XMLHttpRequest.DONE){
                          if(xhr3.status === 200){
                            let data = xhr3.response;
                              usersList.innerHTML = data;
                          }
                      }
                    }
                    xhr3.send();
                    setTimeout(function(){
                    document.getElementById('final').scrollIntoView(true);
                    }, 950);
        
                }else if(tipo_chat=="chat_grupo"){
        
                    let xhr3 = new XMLHttpRequest();
                    xhr3.open("GET", "chat/mostrargrupos", true);
                    xhr3.onload = ()=>{
                      if(xhr3.readyState === XMLHttpRequest.DONE){
                          if(xhr3.status === 200){
                            let data3 = xhr3.response;
                              listagrupos.innerHTML = data3;
                          }
                      }
                    }
                    xhr3.send();
                }
                
            }else{
                alertify.error("Error enviando el mensaje");
            }
            }
        }
        let formData = new FormData(form2);
        if(esimagen==1){
            formData.append("esimagen", esimagen);
            formData.append("nombreimg", inputField2);

        }else if(esimagen==0){
            formData.append("msg", inputField2);
        }
        xhr.send(formData);
    }

    function pasarid(id){
        mostrarmsgaetiquetar=document.getElementById('mostrarmsgaetiquetar');

        mostrarmsgaetiquetar.innerHTML=`
            <input disabled name="msg_a_etiquetar" class="form-control bg-success" id="msg_a_etiquetar" value="${id}" type="text">
        `
    }

//PENDIENTE PARA UN FUTURO
/*
   function etiquetarelmsg(){

        etiquetar_msg = document.getElementById('etiquetar_msg').value;
        msg_a_etiquetar=document.getElementById('msg_a_etiquetar').value;
        tipo_chat = document.getElementById('tipo_chat').value;


        if(tipo_chat=="chat_grupo"){
            tipo=1
        }else{
            tipo=0
        }

        console.log(etiquetar_msg, msg_a_etiquetar)

        obj = [{ "id_etiqueta": etiquetar_msg, "id_msg": msg_a_etiquetar, "tipo": 3, "tipo_chat": tipo}];
        etiquetado = JSON.stringify(obj);
        console.log(etiquetado)
        let xhr5 = new XMLHttpRequest();
        xhr5.open("POST", "chat/otrasconsultastick", true);
        xhr5.onload = ()=>{
        if(xhr5.readyState === XMLHttpRequest.DONE){
            if(xhr5.status === 200){
            let data5 = xhr5.response;
            alertify.success(data5, 0);
        }
        }
        }
        xhr5.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr5.send("x=" + etiquetado);
   }
*/
   //HASTA AQUI 

   destacados= document.getElementById('destacados');

    
   function etiquetarelmsg(){

    destacados.innerHTML="";
    
        etiquetar_msg = document.getElementById('etiquetar_msg').value;
        msg_a_etiquetar=document.getElementById('msg_a_etiquetar').value;
        tipo_chat = document.getElementById('tipo_chat').value;


        if(tipo_chat=="chat_grupo"){
            tipo=1
        }else{
            tipo=0
        }

        console.log(etiquetar_msg, msg_a_etiquetar)

        obj = [{ "id_etiqueta": etiquetar_msg, "id_msg": msg_a_etiquetar, "tipo": 5, "tipo_chat": tipo}];
        etiquetado = JSON.stringify(obj);
        console.log(etiquetado)
        let xhr5 = new XMLHttpRequest();
        xhr5.open("POST", "chat/otrasconsultastick", true);
        xhr5.onload = ()=>{
        if(xhr5.readyState === XMLHttpRequest.DONE){
            if(xhr5.status === 200){
            let data5 = xhr5.response;
            alertify.success(data5, 3);
        }
        }
        }
        xhr5.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr5.send("x=" + etiquetado);
   }



    
   function traer_msg(id){

    destacados.innerHTML="";

    id_enviar=document.getElementById('id_enviar').value;
    tipo_chat = document.getElementById('tipo_chat').value;

    if(tipo_chat=="chat_grupo"){
        tipo=1
    }else{
        tipo=0
    }


    obj = [{ "id_etiqueta": id, "tipo": 4, "id_enviar": id_enviar, "tipo_chat": tipo }];
    etiqueta = JSON.stringify(obj);
    console.log(etiqueta)
    let xhr5 = new XMLHttpRequest();
    xhr5.open("POST", "chat/otrasconsultastick", true);
    xhr5.onload = ()=>{
    if(xhr5.readyState === XMLHttpRequest.DONE){
        if(xhr5.status === 200){
        let data5 = xhr5.response;
        destacados.innerHTML=data5;
        


    }
    }
    }
    xhr5.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr5.send("x=" + etiqueta);
        
      }
   

