
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


// chatBox.onmouseenter = ()=>{
//     chatBox.classList.add("active");
// }

// chatBox.onmouseleave = ()=>{
//     chatBox.classList.remove("active");
// }

// setInterval(() =>{
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "php/get-chat.php", true);
//     xhr.onload = ()=>{
//       if(xhr.readyState === XMLHttpRequest.DONE){
//           if(xhr.status === 200){
//             let data = xhr.response;
//             chatBox.innerHTML = data;
//             if(!chatBox.classList.contains("active")){
//                 scrollToBottom();
//               }
//           }
//       }
//     }
//     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhr.send("incoming_id="+incoming_id);

//     //valorActivo = document.querySelector('input[name="tipo"]:checked').value;
//     //console.log(valorActivo);



// }, 1000);

// function scrollToBottom(){
//     chatBox.scrollTop = chatBox.scrollHeight;
//   }
  
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

// // ----------------------MODAL-------------------------------------

// var participantes = [];

// function adduser(){
//     var select = document.getElementById("participantes");
//     user=document.querySelector("#participantes").value;
//     participantes.push(user);
//     select.options[select.selectedIndex].style.display = "none";
//     console.log(participantes);
     
//           $.ajax({
//               dataType:"json",
//               url:"php/get-names.php",
//               type:"POST",
//               data:{users: JSON.stringify(participantes), tipo: 0},
//               success: function(data){
//               },
//                   error: function(response) {
//                       document.querySelector("#user-list").value=response.responseText;
//                   }
//           });

//         };

//     function selectuser(){
//         $("#partici").show();
//     }

//     function selectarea(){
//         $("#partici").show();
//     }
 
    function areaselect(id){

        mostrar_etiqueta=document.getElementById('etiqueta');

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
        mensajetkt=document.getElementById('mensajeticket');

        obj = [{ "area_dest_tkt": areaDestTkt, "etiqueta": select_etk, "descrip": descrip, "estado": 0 }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
        let enviarticket = new XMLHttpRequest();
        enviarticket.open("POST", "chat/tkt/creartkt", true);
        enviarticket.onload = ()=>{
        if(enviarticket.readyState === XMLHttpRequest.DONE){
            if(enviarticket.status === 200){
                let data = enviarticket.response;
                mensajetkt.innerHTML = data;
            }else{
                mensajetkt.innerHTML = data;
            }
        }
    }
    enviarticket.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    enviarticket.send("x=" + dbParam);

    }

//     function areaselect2(id){

//         mostrar_etiqueta=document.getElementById('etiqueta2');

//         obj = [{ "id_area": id, "tipo": 1 }];
//         console.log(obj)
//         dbParam = JSON.stringify(obj);
//       let xhr = new XMLHttpRequest();
//       xhr.open("POST", "php/get-names.php", true);
//       xhr.onload = ()=>{
//       if(xhr.readyState === XMLHttpRequest.DONE){
//           if(xhr.status === 200){
//             let data = xhr.response;
//             mostrar_etiqueta.innerHTML = data;
//             console.log(data);
//           }else{
//             console.log(data);
//           }
//       }
//     }
//     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhr.send("x=" + dbParam);
//     }

    

