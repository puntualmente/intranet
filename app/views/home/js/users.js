const searchBar = document.querySelector('#buscadorusuarios'),
usersList = document.querySelector("#user-list");
listagrupos = document.querySelector("#lista-grupos");
listadeusuarios=document.querySelector("#listadeusuarios");
contentsearch=document.querySelector("#contentsearch");

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
    document.getElementById('botonbuscar').click();
   // clearInterval(mostrarcosas);
  
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "chat/busqueda", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          contentsearch.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

$( document ).ready( function() {
    let xhr2 = new XMLHttpRequest();
  xhr2.open("GET", "chat/mostrargrupos", true);
  xhr2.onload = ()=>{
    if(xhr2.readyState === XMLHttpRequest.DONE){
        if(xhr2.status === 200){
          let data2 = xhr2.response;
            listagrupos.innerHTML = data2;
        }
    }
}
xhr2.send();

let xhr = new XMLHttpRequest();
  xhr.open("GET", "chat/users", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
            usersList.innerHTML = data;
        }
    }
  }
  xhr.send();

  let xhr3 = new XMLHttpRequest();
  xhr3.open("GET", "chat/contactos", true);
  xhr3.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr3.response;
            listadeusuarios.innerHTML = data;
        }
    }
  }
  xhr3.send();


});

/*
mostrarcosas = setInterval(() =>{
 let xhr2 = new XMLHttpRequest();
  xhr2.open("GET", "chat/mostrargrupos", true);
  xhr2.onload = ()=>{
    if(xhr2.readyState === XMLHttpRequest.DONE){
        if(xhr2.status === 200){
          let data2 = xhr2.response;
            listagrupos.innerHTML = data2;
        }
    }
  }
  xhr2.send();
  
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "chat/users", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
            usersList.innerHTML = data;
        }
    }
  }
  xhr.send();

  let xhr3 = new XMLHttpRequest();
  xhr3.open("GET", "chat/contactos", true);
  xhr3.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr3.response;
            listadeusuarios.innerHTML = data;
        }
    }
  }
  xhr3.send();


}, 1500);
*/

function actualizarGrupos(){
  let xhr2 = new XMLHttpRequest();
  xhr2.open("GET", "chat/mostrargrupos", true);
  xhr2.onload = ()=>{
    if(xhr2.readyState === XMLHttpRequest.DONE){
        if(xhr2.status === 200){
          let data2 = xhr2.response;
            listagrupos.innerHTML = data2;
        }
    }
  }
  xhr2.send();
}

function actualizarContactos(){
  let xhr3 = new XMLHttpRequest();
  xhr3.open("GET", "chat/contactos", true);
  xhr3.onload = ()=>{
    if(xhr3.readyState === XMLHttpRequest.DONE){
        if(xhr3.status === 200){
          let data3 = xhr3.response;
            listadeusuarios.innerHTML = data3;
        }
    }
  }
  xhr3.send();

}

function holausers(id){

  destacados= document.getElementById('destacados');
  document.getElementById('botonopciones').disabled=false;
  document.getElementById('enviar').disabled=false;
  document.getElementById('msg').disabled=false;

  const permiso=document.getElementById('permiso').value;
  contenidodeenvio=document.getElementById('contenidodeenvio');
  if(permiso == 0){
      contenidodeenvio.hidden=true;
  }else{
      contenidodeenvio.hidden=false;
  }
  document.getElementById('iniciodelchat').hidden=true;

  destacados.innerHTML="";
  
  
  clearInterval(chat);
  contenidochat = document.querySelector("#contenidochat");
  headerchat = document.querySelector("#headerchat");
  

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "chat/getheader", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data2 = xhr.response;
          headerchat.innerHTML = data2;

          const es_mi_jefe=document.getElementById('es_mi_jefe').value;
          contenidodeenvio=document.getElementById('contenidodeenvio');
          const permiso=document.getElementById('permiso').value;
          texto_error=document.getElementById('texto_error');
          if(permiso == 0){
            if(es_mi_jefe == 0){
                contenidodeenvio.hidden=true;
                texto_error.hidden=false;

            }else{
                contenidodeenvio.hidden=false;
                texto_error.hidden=true;
            }
          }
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("id_user=" + id);


  //chat=setInterval(() =>{
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
  xhr2.send("id_user=" + id);
//}, 1000);
setTimeout(function(){
  document.getElementById('final').scrollIntoView(true);
}, 1200);

let xhr3 = new XMLHttpRequest();
xhr3.open("GET", "chat/users", true);
xhr3.onload = ()=>{
  if(xhr3.readyState === XMLHttpRequest.DONE){
      if(xhr3.status === 200){
        let data3 = xhr3.response;
          usersList.innerHTML = data3;
      }
  }
}
xhr3.send();

}

function holagrupos(id){

  document.getElementById('botonopciones').disabled=false;
  document.getElementById('enviar').disabled=false;
  document.getElementById('msg').disabled=false;
  const permiso=document.getElementById('permiso').value;
  contenidodeenvio=document.getElementById('contenidodeenvio');
  const tipo_chat = document.getElementById('tipo_chat').value;
  texto_error=document.getElementById('texto_error');




  if(permiso != 0 || tipo_chat=="chat_grupo"){
      contenidodeenvio.hidden=false;
      texto_error.hidden = true;
  }else{
      contenidodeenvio.hidden=true;
      texto_error.hidden = false;

  }
  document.getElementById('iniciodelchat').hidden=true;
  
  clearInterval(chat);
  contenidochat = document.querySelector("#contenidochat");
  headerchat = document.querySelector("#headerchat");
  

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "chat/grupos/header", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data2 = xhr.response;
          headerchat.innerHTML = data2;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("id_grupo=" + id);


  //chat=setInterval(() =>{
  let xhr2 = new XMLHttpRequest();
  xhr2.open("POST", "chat/grupos/chat", true);
  xhr2.onload = ()=>{
    if(xhr2.readyState === XMLHttpRequest.DONE){
        if(xhr2.status === 200){
          let data2 = xhr2.response;
          contenidochat.innerHTML = data2;

          const tipo_chat = document.getElementById('tipo_chat').value;

          if(permiso != 0 || tipo_chat=="chat_grupo"){
              contenidodeenvio.hidden=false;
              texto_error.hidden = true;

          }else{
              contenidodeenvio.hidden=true;
          }
        }
    }
  }
  xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr2.send("id_grupo=" + id);
//}, 800);
setTimeout(function(){
  document.getElementById('final').scrollIntoView(true);
}, 950);

actualizarGrupos();


}



