
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
      //      notyIcon.innerHTML = data;
            if(data==0){
              notycontentnormal.innerHTML= `No tienes mensajes nuevos`;
              numnotys=data;
            }else{
              notycontentnormal.innerHTML= `Tienes ${data} mensajes nuevos`;
              numnotys=data;
            }
        }
    }
  }
  xhr.send();


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

        /*if(numnotys==0){
          notyIcon.innerHTML="";
        }else{
          notyIcon.innerHTML=numnotys;
        }*/
      }else{
        /*
        if(numnotys!=0){
            notyIcon.innerHTML = parseInt(numnotys) + parseInt(data2);
        }else{
            notyIcon.innerHTML=data2;
        }*/
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
        notitickets.innerHTML= `Tienes ${data3} mensajes nuevos`;
        numnotys=parseInt(numnotys)+parseInt(data3);

      }
    }
}
}
xhr3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr3.send("x=" + notickt);

if(numnotys==0){
  notyIcon.innerHTML="";
}else{
  notyIcon.innerHTML=numnotys;

}



}, 1000);