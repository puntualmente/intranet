function guardarIntento(){
    cedula=document.getElementById('ced_intento').value;
    console.log(cedula)
    obj = [{ "id": cedula, "estado": 6 }];
            console.log(obj)
            dbParam = JSON.stringify(obj);
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "admintablas", true);
          xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                let data = xhr.response;

                if(data == 1){
                    alertify.error("La cedula no existe", 5);
                }else if(data == 2){
                    alertify.error("Error general contacta con el admin", 0);
                }else{
                    alertify.success(data, 5);
                    document.getElementById('ced_intento').value="";

                }
              }
          }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("x=" + dbParam);
}

function recargar(){
    window.location.reload()
}