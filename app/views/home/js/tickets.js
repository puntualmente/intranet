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
    console.log(id)
    obj = [{ "estado": 6, "id": id }];
      traerid = JSON.stringify(obj);
    let xhr6 = new XMLHttpRequest();
    xhr6.open("POST", "adetiquetas/guardaretiqueta", true);
    xhr6.onload = ()=>{
    if(xhr6.readyState === XMLHttpRequest.DONE){
        if(xhr6.status === 200){
          let data6 = xhr6.response;
          ok.innerHTML = data6;
          console.log(data6)
       
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
    descrip_sol=document.getElementById('descrip_reasig').value;
    response = document.getElementById('response_reasig');
    id_tkt=document.getElementById('id_tk_redirec').value;
    area_redireccion = document.getElementById('area_redireccion').value;

    obj = [{ "estado": 2, "descrip_reasig": descrip_sol, "id_tkt_reasig": id_tkt, "area_redirec": area_redireccion }];
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

function verReasigna(id){

  mostrarReasig=document.getElementById('mostrarReasig');

  obj = [{ "estado":7, "id": id }];
    traerid = JSON.stringify(obj);
  let xhr7 = new XMLHttpRequest();
  xhr7.open("POST", "adetiquetas/guardaretiqueta", true);
  xhr7.onload = ()=>{
  if(xhr7.readyState === XMLHttpRequest.DONE){
      if(xhr7.status === 200){
        let data7 = xhr7.response;
        mostrarReasig.innerHTML = data7;
        console.log(data7);
      }
  }
  }
  xhr7.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr7.send("x=" + traerid);
}




