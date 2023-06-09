const form = document.querySelector("#reg_observa"),
continueBtn = document.querySelector("#btn_observa"),
errorText = document.querySelector("#error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick =  ()=>{
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "observaciones", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              console.log(data)
              if(data === "success"){
                console.log("error")
              }else{
                echo = "Sirve"
              
          }
      }
    }
  }

    let formData = new FormData(form);
    xhr.send(formData);
  }