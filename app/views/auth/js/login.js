const form = document.querySelector("#loginform"),
continueBtn = document.querySelector("#buttoninput"),
errorText = document.querySelector("#error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "auth", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
                if(data==="Proceso Exitoso"||data.length>1000){
                  location.href = "home";
                  window.location.reload()
                }else{
                  errorText.textContent = data;
                }
              }
          }
      }
    let formData = new FormData(form);
    xhr.send(formData);
}