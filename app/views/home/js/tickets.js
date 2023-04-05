ok=document.getElementById('selectapar');

function traerReasignartk(id){
    idticket=document.getElementById('idticket');

    obj = [{ "estado": 4, "id": id }];
      traerReasig = JSON.stringify(obj);
    let xhr4 = new XMLHttpRequest();
    xhr4.open("POST", "adetiquetas/guardaretiqueta", true);
    xhr4.onload = ()=>{
    if(xhr4.readyState === XMLHttpRequest.DONE){
        if(xhr4.status === 200){
          let data4 = xhr4.response;
          idticket.innerHTML = data4;
        }
    }
    }
    xhr4.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr4.send("x=" + traerReasig);
}

function traerresuelto(id){
    idticket2=document.getElementById('idticketresuelto');

    obj = [{ "estado": 5, "id": id }];
      traertickresuel = JSON.stringify(obj);
    let xhr5 = new XMLHttpRequest();
    xhr5.open("POST", "adetiquetas/guardaretiqueta", true);
    xhr5.onload = ()=>{
    if(xhr5.readyState === XMLHttpRequest.DONE){
        if(xhr5.status === 200){
          let data5 = xhr5.response;
          idticket2.innerHTML = data5;
        }
    }
    }
    xhr5.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr5.send("x=" + traertickresuel);
}

function traeridreasignar(id){
    ok=document.getElementById('idtkredireccion');
    obj = [{ "estado": 6, "id": id }];
      traerid = JSON.stringify(obj);
    let xhr6 = new XMLHttpRequest();
    xhr6.open("POST", "adetiquetas/guardaretiqueta", true);
    xhr6.onload = ()=>{
    if(xhr6.readyState === XMLHttpRequest.DONE){
        if(xhr6.status === 200){
          let data6 = xhr6.response;
          ok.innerHTML = data6;
       
        }
    }
    }
    xhr6.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr6.send("x=" + traerid);
}

function resolver(){
    
    descrip_sol=document.getElementById('descrip_resuelto').value;
    response = document.getElementById('response');
    id_tkt=document.getElementById('tkt').value;

    obj = [{ "estado": 1, "descrip_sol": descrip_sol, "id_tkt": id_tkt }];
      resol = JSON.stringify(obj);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chat/tkt/creartkt", true);
    xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          response.innerHTML=data;
            
        }
    }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + resol);
    
}




function reasignar(){
    descrip_sol=document.getElementById('descrip_resuelto').value;
    response = document.getElementById('response');
    id_tkt=document.getElementById('tkt').value;

    obj = [{ "estado": 1, "descrip_sol": descrip_sol, "id_tkt": id_tkt }];
      resol = JSON.stringify(obj);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chat/tkt/creartkt", true);
    xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          response.innerHTML=data;
            
        }
    }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + resol);

}




