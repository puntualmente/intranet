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

function traerReasignartk2(id){
    idticket=document.getElementById('idticket');

      obj = [{ "estado": 4, "id": id, "redireccion": true }];
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

function traeridreasignar2(id){
  ok=document.getElementById('idtkredireccion');
  obj = [{ "estado": 6, "id": id, "redireccion": true }];
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
          Swal.fire(
            {
                title: 'Ticket Resuelto Con Exito!',
                icon: 'success',
            }
        )
        setTimeout(() => {
          window.location.reload()            
        }, 2000);
        }
    }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + resol);
    
}

function traer_users(id){
      mostrar_users_areas = document.getElementById('users_area');
      console.log(id);

      obj = [{ "id_area": id, "tipo": 2 }];
      console.log(obj)
      dbParam = JSON.stringify(obj);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chat/otrasconsultastick", true);
    xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          mostrar_users_areas.innerHTML = data;
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


function reasignar(){
    descrip_sol=document.getElementById('descrip_reasig').value;
    response = document.getElementById('response_reasig');
    id_tkt=document.getElementById('id_tk_redirec').value;
    area_redireccion = document.getElementById('area_redireccion').value;
    sel_user = document.getElementById('sel_user').value;

    obj = [{ "estado": 2, "descrip_reasig": descrip_sol, "id_tkt_reasig": id_tkt, "area_redirec": area_redireccion, "sel_user": sel_user }];
      resol = JSON.stringify(obj);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chat/tkt/creartkt", true);
    xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          response.innerHTML=data;
          Swal.fire(
            {
                title: 'Reasignado Con Exito!',
                icon: 'success',
            }
        )
        setTimeout(() => {
          window.location.reload()            
        }, 2000);
            
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

      }
  }
  }
  xhr7.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr7.send("x=" + traerid);
}




