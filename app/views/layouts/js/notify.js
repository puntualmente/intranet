
notyIcon=document.getElementById('notify');
notycontentnormal=document.getElementById('notify2');
notycontentgrupo=document.getElementById('notify3');

var numnotys=0;


setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "notify", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          var data = xhr.response;
            if(data==0){
              notyIcon.innerHTML = "";
            }else{
              notyIcon.innerHTML = data;
            }
        }
    }
  }
  xhr.send();
}, 1000);

function mostrarnotify(){
  
  obj = [{ "estado": 0 }];
  mensajes = JSON.stringify(obj);
  let xhr0 = new XMLHttpRequest();
  xhr0.open("POST", "notify", true);
  xhr0.onload = ()=>{
    if(xhr0.readyState === XMLHttpRequest.DONE){
        if(xhr0.status === 200){
          var data0 = xhr0.response;
          console.log(data0);
            if(data0==0){
              notycontentnormal.innerHTML= `No tienes mensajes nuevos`;
            }else{
              notycontentnormal.innerHTML= `Tienes ${data0} mensajes nuevos`;
            }
        }
    }
  }
  xhr0.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr0.send("x=" + mensajes);

  obj = [{ "estado": 1 }];
  dbParam = JSON.stringify(obj);
    let xhr2 = new XMLHttpRequest();
    xhr2.open("POST", "notify", true);
    xhr2.onload = ()=>{
    if(xhr2.readyState === XMLHttpRequest.DONE){
        if(xhr2.status === 200){
          let data2 = xhr2.response;
          if(data2==0){
            notycontentgrupo.innerHTML= `No tienes mensajes nuevos`;
            numnotys=parseInt(numnotys)+parseInt(data2);
          }else{
            notycontentgrupo.innerHTML= `Tienes ${data2} mensajes nuevos`;
            numnotys=parseInt(numnotys)+parseInt(data2);
          } 
        }
    }
  }
xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr2.send("x=" + dbParam);

notitickets=document.getElementById('notitickes');

obj = [{ "estado": 2 }];
notickt = JSON.stringify(obj);
  let xhr3 = new XMLHttpRequest();
  xhr3.open("POST", "notify", true);
  xhr3.onload = ()=>{
  if(xhr3.readyState === XMLHttpRequest.DONE){
      if(xhr3.status === 200){
        let data3 = xhr3.response;
        if(data3==0){
          notitickets.innerHTML= `No hay tickets por resolver`;
          numnotys=parseInt(numnotys)+parseInt(data3);

        }else{
          notitickets.innerHTML= `Tienes ${data3} Tickets por resolver`;
          numnotys=parseInt(numnotys)+parseInt(data3);

        }
      }
  }
}
xhr3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr3.send("x=" + notickt);

}