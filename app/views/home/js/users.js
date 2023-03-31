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


}, 1000);


function hola(id){

  document.getElementById('botonopciones').disabled=false;
  document.getElementById('enviar').disabled=false;
  document.getElementById('msg').disabled=false;
  document.getElementById('contenidodeenvio').hidden=false;
  document.getElementById('iniciodelchat').hidden=true;


  
  
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
       

        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("id_out=" + id);


  chat=setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "chat/getchat", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          contenidochat.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("id_out=" + id);
}, 500);
setTimeout(function(){
  document.getElementById('final').scrollIntoView(true);
}, 600);


}


