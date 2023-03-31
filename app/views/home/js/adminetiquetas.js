function agregaretiqueta(){
    area_etiqueta=document.getElementById("area_etiqueta").value;
    mensaje_etiqueta=document.getElementById("mensaje_etiqueta");
    descrip=document.getElementById("descripetic").value;
    t_estimado=document.getElementById("t_estimado").value;
    tipo_t=document.getElementById("tipo_t").value;
    
    //tablaetiquetas=document.getElementById("tablaetiquetas");
  
    obj = [{ "descrip": `${descrip}`, "t_estimado": `${t_estimado}`, "tipo_t": `${tipo_t}`, "area_etiqueta": `${area_etiqueta}`, "estado": 3 }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "adetiquetas/guardaretiqueta", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            mensaje_etiqueta.innerHTML = data;
          }else{
            console.log(data);
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);
  }
  
  function borraretiqueta(id){
      tablaetiquetas=document.getElementById("tablaetiquetas");
  
      console.log(id);
  
      obj = [{ "id_etiqueta": `${id}`, "estado": 3, borrar: true }];
          console.log(obj)
          dbParam = JSON.stringify(obj);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/guardar_config.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
              let data = xhr.response;
              tablaetiquetas.innerHTML = data;
            }
        }
      }
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("x=" + dbParam);
  }
  
  function editaretiqueta(id){
    editetiqueta=document.getElementById("editetiqueta");
  
    console.log(id);
  
    obj = [{ "id_etiqueta": `${id}`, "estado": 3, borrar: false }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "php/guardar_config.php", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            editetiqueta.innerHTML = data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);
  }
  
  function actualizaretiqueta(id){
  
    descrip=document.getElementById("des_etiqueta").value;
    t_estimado=document.getElementById("t_estimado").value;
    tipo_t=document.getElementById("tipo_t").value;
    area_etiqueta=document.getElementById("area_etiqueta").value;
    mensaje_etiqueta=document.getElementById("mensaje_etiqueta");
    tablaetiquetas=document.getElementById("tablaetiquetas");
  
    obj = [{ "id_etiqueta": id,"descrip": `${descrip}`, "t_estimado": `${t_estimado}`, "tipo_t": `${tipo_t}`, "area_etiqueta": `${area_etiqueta}`, "estado": 3, "actualizar": true }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "php/guardar_config.php", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            tablaetiquetas.innerHTML = data;
            console.log(data);
          }else{
            console.log(data);
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("x=" + dbParam);
  
  }