
notyIcon = document.getElementById('notify');
notycontentnormal = document.getElementById('notify2');
notycontentgrupo = document.getElementById('notify3');
mensajes_tkt = document.getElementById('mensajes_tkt');

var numnotys = 0;
var mensajes_n = 0;
var mensajes_grup = 0;
var total_notys = 0;


setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "notify", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var dato_notys = xhr.response;
        console.log(dato_notys);
        cant = dato_notys.length;
        if (cant > 1000) {
          //window.location.reload()
          location.href = "cerrar";
          console.log(cant)
        } else {
          if (dato_notys == 0) {
            notyIcon.innerHTML = "";
            mensajes_tkt.innerHTML = "Intranet | Puntualmente";
          } else {
            notyIcon.innerHTML = dato_notys;
            mensajes_tkt.innerHTML = `(` + dato_notys + `) Intranet | Puntualmente`;
          }



          if (total_notys == dato_notys) {

          } else {
            var URL = window.location.toString();
            const es_chat = URL.split('/');
            chat = es_chat.indexOf('chat');
            if (chat != -1) {
              tipo_chat = document.getElementById('tipo_chat').value;
              total_notys = dato_notys;

              if (tipo_chat == "chat_1_1") {
                obj = [{ "estado": 0 }];
                mensajes = JSON.stringify(obj);
                let xhr0 = new XMLHttpRequest();
                xhr0.open("POST", "notify", true);
                xhr0.onload = () => {
                  if (xhr0.readyState === XMLHttpRequest.DONE) {
                    if (xhr0.status === 200) {
                      var data0 = xhr0.response;
                      if (mensajes_n == data0) {

                      } else {

                        id_enviar = document.getElementById('id_enviar').value;
                        console.log(id_enviar);

                        if (id_enviar == "nada") {

                        } else {
                          contenidochat = document.querySelector("#contenidochat");
                          let xhr2 = new XMLHttpRequest();
                          xhr2.open("POST", "chat/getchat", true);
                          xhr2.onload = () => {
                            if (xhr2.readyState === XMLHttpRequest.DONE) {
                              if (xhr2.status === 200) {
                                let data2 = xhr2.response;
                                contenidochat.innerHTML = data2;
                              }
                            }
                          }
                          xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                          xhr2.send("id_user=" + id_enviar);
                        }

                      }
                    }
                  }
                }
                xhr0.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr0.send("x=" + mensajes);

                let xhr2 = new XMLHttpRequest();
                xhr2.open("GET", "chat/mostrargrupos", true);
                xhr2.onload = () => {
                  if (xhr2.readyState === XMLHttpRequest.DONE) {
                    if (xhr2.status === 200) {
                      let data2 = xhr2.response;
                      listagrupos.innerHTML = data2;
                    }
                  }
                }
                xhr2.send();

                let xhr = new XMLHttpRequest();
                xhr.open("GET", "chat/users", true);
                xhr.onload = () => {
                  if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                      let data = xhr.response;
                      usersList.innerHTML = data;
                      mensajes_grup = data;
                    }
                  }
                }
                xhr.send();

              } else if (tipo_chat == "chat_grupo") {

                obj = [{ "estado": 1 }];
                dbParam = JSON.stringify(obj);
                let xhr2 = new XMLHttpRequest();
                xhr2.open("POST", "notify", true);
                xhr2.onload = () => {
                  if (xhr2.readyState === XMLHttpRequest.DONE) {
                    if (xhr2.status === 200) {
                      let data2 = xhr2.response;
                      if (mensajes_grup == data2) {

                      } else {

                        id_enviar = document.getElementById('id_enviar').value;

                        let xhr3 = new XMLHttpRequest();
                        xhr3.open("POST", "chat/grupos/chat", true);
                        xhr3.onload = () => {
                          if (xhr3.readyState === XMLHttpRequest.DONE) {
                            if (xhr3.status === 200) {
                              let data3 = xhr3.response;
                              contenidochat.innerHTML = data3;
                            }
                          }
                        }
                        xhr3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr3.send("id_grupo=" + id_enviar);
                      }
                    }
                  }

                }
                xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr2.send("x=" + dbParam);

                let xhr3 = new XMLHttpRequest();
                xhr3.open("GET", "chat/mostrargrupos", true);
                xhr3.onload = () => {
                  if (xhr3.readyState === XMLHttpRequest.DONE) {
                    if (xhr3.status === 200) {
                      let data3 = xhr3.response;
                      listagrupos.innerHTML = data3;
                    }
                  }
                }
                xhr3.send();

                let xhr = new XMLHttpRequest();
                xhr.open("GET", "chat/users", true);
                xhr.onload = () => {
                  if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                      let data = xhr.response;
                      usersList.innerHTML = data;
                      mensajes_grup = data;
                    }
                  }
                }
                xhr.send();

              } else {
                let xhr2 = new XMLHttpRequest();
                xhr2.open("GET", "chat/mostrargrupos", true);
                xhr2.onload = () => {
                  if (xhr2.readyState === XMLHttpRequest.DONE) {
                    if (xhr2.status === 200) {
                      let data2 = xhr2.response;
                      listagrupos.innerHTML = data2;
                    }
                  }
                }
                xhr2.send();

                let xhr = new XMLHttpRequest();
                xhr.open("GET", "chat/users", true);
                xhr.onload = () => {
                  if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                      let data = xhr.response;
                      usersList.innerHTML = data;
                      mensajes_grup = data;
                    }
                  }
                }
                xhr.send();

              }
              console.log(total_notys);
            }
          }
          }
        }
      }
    }
    xhr.send();

  }, 4000);




function mostrarnotify() {

  obj = [{ "estado": 0 }];
  mensajes = JSON.stringify(obj);
  let xhr0 = new XMLHttpRequest();
  xhr0.open("POST", "notify", true);
  xhr0.onload = () => {
    if (xhr0.readyState === XMLHttpRequest.DONE) {
      if (xhr0.status === 200) {
        var data0 = xhr0.response;
        console.log(data0);
        if (data0 == 0) {
          notycontentnormal.innerHTML = `No tienes mensajes nuevos`;
        } else {
          notycontentnormal.innerHTML = `Tienes ${data0} mensajes nuevos`;
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
  xhr2.onload = () => {
    if (xhr2.readyState === XMLHttpRequest.DONE) {
      if (xhr2.status === 200) {
        let data2 = xhr2.response;
        if (data2 == 0) {
          notycontentgrupo.innerHTML = `No tienes mensajes nuevos`;
        } else {
          notycontentgrupo.innerHTML = `Tienes ${data2} mensajes nuevos`;
        }
      }
    }
  }
  xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr2.send("x=" + dbParam);

  notitickets = document.getElementById('notitickes');

  obj = [{ "estado": 2 }];
  notickt = JSON.stringify(obj);
  let xhr3 = new XMLHttpRequest();
  xhr3.open("POST", "notify", true);
  xhr3.onload = () => {
    if (xhr3.readyState === XMLHttpRequest.DONE) {
      if (xhr3.status === 200) {
        let data3 = xhr3.response;
        if (data3 == 0) {
          notitickets.innerHTML = `No hay tickets por resolver`;
        } else {
          notitickets.innerHTML = `Tienes ${data3} Tickets por resolver`;
        }
      }
    }
  }
  xhr3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr3.send("x=" + notickt);

  notys_dinam = document.getElementById('notys_dinam');

  obj = [{ "estado": 3 }];
  notickt = JSON.stringify(obj);
  let xhr4 = new XMLHttpRequest();
  xhr4.open("POST", "notify", true);
  xhr4.onload = () => {
    if (xhr4.readyState === XMLHttpRequest.DONE) {
      if (xhr4.status === 200) {
        let data4 = xhr4.response;
        notys_dinam.innerHTML = data4;
      }
    }
  }
  xhr4.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr4.send("x=" + notickt);


}