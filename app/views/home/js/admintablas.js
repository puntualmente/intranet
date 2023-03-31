

function agregararea(){

    areatabla=document.getElementById('areatabla');
    anombre=document.getElementById('nombrearea').value;
    
    console.log(anombre);
    
        obj = [{ "nombre": `${anombre}`, "estado": 0, borrar: false }];
            console.log(obj)
            dbParam = JSON.stringify(obj);
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "admintablas", true);
          xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                let data = xhr.response;
                document.getElementById('nombrearea').value='';
                areatabla.innerHTML = data;
              }
          }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("x=" + dbParam);
      }
    
    function modificararea(id){
        areatabla=document.getElementById('areatabla');

        
        console.log(id);
            
            obj = [{ "id": `${id}`, "estado": 0, borrar: true }];
            console.log(obj)
            dbParam = JSON.stringify(obj);
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "admintablas", true);
          xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                let data = xhr.response;
                areatabla.innerHTML = data;
              }
          }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("x=" + dbParam);
    }


//------------------------SEDES--------------------
function agregarsede(){
    sedetabla=document.getElementById('sedetabla');
    snombre=document.getElementById('nombresede').value;
    
    console.log(snombre);
    
        obj = [{ "nombre": `${snombre}`, "estado": 4, borrar: false }];
            console.log(obj)
            dbParam = JSON.stringify(obj);
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "admintablas", true);
          xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                let data = xhr.response;
                document.getElementById('nombresede').value='';
                sedetabla.innerHTML = data;
              }
          }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("x=" + dbParam);
}


    
    //------------Grupos---------------
    
    function agregargrupos(){
        areatabla=document.getElementById('grupotabla');
        gnombre=document.getElementById('nombregrupo').value;
    
        console.log(gnombre);
    
        obj = [{ "nombre": `${gnombre}`, "estado": 1, borrar: false }];
            console.log(obj)
            dbParam = JSON.stringify(obj);
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "admintablas", true);
          xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                let data = xhr.response;
                document.getElementById('nombregrupo').value='';
                areatabla.innerHTML = data;
              }
          }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("x=" + dbParam);
    }
    
    function modificargrupo(id){
        areatabla=document.getElementById('grupotabla');
    
        console.log(areatabla);
    
        obj = [{ "id_grupo": `${id}`, "estado": 1, borrar: true }];
            console.log(obj)
            dbParam = JSON.stringify(obj);
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "admintablas", true);
          xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                let data = xhr.response;
                areatabla.innerHTML = data;
              }
          }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("x=" + dbParam);
    }

    function agregarempresa(){
        empresatabla=document.getElementById('empresatabla');
        enombre=document.getElementById('nombrempresa').value;
    
        console.log(enombre);
    
        obj = [{ "nombre": `${enombre}`, "estado": 5, borrar: false }];
            console.log(obj)
            dbParam = JSON.stringify(obj);
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "admintablas", true);
          xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                let data = xhr.response;
                document.getElementById('nombrempresa').value='';
                empresatabla.innerHTML = data;
              }
          }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("x=" + dbParam);
    }
    /*
    function cambtamaño(){
      msgtamaño=document.getElementById("msjtamaño");
      t_img=document.getElementById('tarchivo').value;
    
      console.log(t_img);
    
      obj = [{ "t_img": `${t_img}`, "estado": 2 }];
          console.log(obj)
          dbParam = JSON.stringify(obj);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/guardar_config.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
              let data = xhr.response;
              msgtamaño.innerHTML = data;
              console.log(data);
            }else{
              console.log(data);
            }
        }
      }
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("x=" + dbParam);
    }
    
    function agregaretiqueta(){
      descrip=document.getElementById("des_etiqueta").value;
      t_estimado=document.getElementById("t_estimado").value;
      tipo_t=document.getElementById("tipo_t").value;
      area_etiqueta=document.getElementById("area_etiqueta").value;
      mensaje_etiqueta=document.getElementById("mensaje_etiqueta");
      tablaetiquetas=document.getElementById("tablaetiquetas");
    
      obj = [{ "descrip": `${descrip}`, "t_estimado": `${t_estimado}`, "tipo_t": `${tipo_t}`, "area_etiqueta": `${area_etiqueta}`, "estado": 3 }];
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
    */