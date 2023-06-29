const form = document.querySelector("#reg_observa"),
  continueBtn = document.querySelector("#btn_observa"),
  errorText = document.querySelector("#error-text");
  function guardarRespuesta() {
    var data = $("#reg_observa").serialize();
  
    $.ajax({
      url: 'app/model/observaciones/observaciones.php', // Ruta relativa al archivo PHP
      type: 'POST',
      dataType: 'json',
      data: data,
    })
      .done(function (r) {
        console.log(r);
        var alerta = document.getElementById('alerta');
        var successCount = 0;
  
        for (var i = 0; i < r.length; i++) {
          if (r[i].success) {
            successCount++;
            console.log(r[i].message); // Mensaje de éxito
          } else {
            console.log("error");
            alerta.innerHTML = r[i].message;
            alerta.className = 'alert alert-danger';
          }
        }
  
        if (successCount > 0) {
          alerta.innerHTML = '¡Gracias! ' + successCount + ' datos fueron enviados con éxito... 👍';
          alerta.className = 'alert alert-success';
        }
      })
      .fail(function () {
        var alerta = document.getElementById('alerta');
        alerta.innerHTML = 'Error de comunicación con el servidor. Por favor, intente nuevamente más tarde.';
        alerta.className = 'alert alert-danger';
      });
  
    // Devuelve false para evitar que el formulario se envíe o la página se recargue
    return false;
  }
//imprimir la tabla completa
  
function obtenerDatosObservaciones() {
  $.ajax({
      url: 'app/model/observaciones/observaciones.php', 
      type: 'GET', 
      dataType: 'html', 
      success: function(response) {
          
          $('#vistaObservaciones').html(response);
      },
      error: function() {
          // Me imprime esto si hay algun error 
          alert('Error al obtener los datos de observaciones.');
      }
  });
}
    



    
    
  /* function actualizarRes(){ 
  let xhr2 = new XMLHttpRequest();
                xhr2.open("POST", "/../model/observaciones/observaciones.php", true);
                xhr2.onload = ()=>{
                    if(xhr2.readyState === XMLHttpRequest.DONE){
                        if(xhr2.status === 200){
                        let data2 = xhr2.response;
                        console.log(data2);
                        vis.innerHTML = data2;
                        }
                    }
                }
                xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr2.send("x=");
              } */


 /* function VerTabla(){
       vista_grupos=document.getElementById('vista_grupos')
       obj = [{ "tipo": 0, "id_grupo": id_grupo}];
       traerReasig = JSON.stringify(obj);
       let xhr = new XMLHttpRequest();
       xhr.open("POST", "observaciones", true);
       xhr.onload = ()=

  } */

// function observar_grupos(id_grupo){
//   vista_grupos=document.getElementById('vista_grupos')
//   obj = [{ "tipo": 0, "id_grupo": id_grupo}];
//   traerReasig = JSON.stringify(obj);
//   let xhr = new XMLHttpRequest();
//   xhr.open("POST", "observaciones", true);
//   xhr.onload = ()=>{
//     if(xhr.readyState === XMLHttpRequest.DONE){
//         if(xhr.status === 200){
//             let data = xhr.response;
//             vista_grupos.innerHTML = data;
//                table= $('#datos_impresos').DataTable({

//               "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
//               "responsive": false,
//               paging: false,
//               retrieve: true,



//               "language": {
//                   "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
//               },
//               "order": [
//                   [0, "desc"]
//               ],
//               "initComplete": function () {
//                   this.api().columns().every(function () {
//                       var that = this;
//                       $('input', this.footer()).on('keyup change', function () {
//                           if (that.search() !== this.value) {
//                               that
//                                   .search(this.value)
//                                   .draw();                                    

//                           }
//                       });
//                   })
//               },
//               "buttons": ['csv', 'excel', 'pdf', 'print']

//             });             
//     }
//   }
// }
// xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// xhr.send("x=" + traerReasig);
// table.destroy();

// }

/* function imprimirTabla(id){
  vista_grupos=document.getElementById('vista_grupos');
   obj = [{ "estado": 1, "id": id }];
     traerid = JSON.stringify(obj);
   let xhr6 = new XMLHttpRequest();
   xhr6.open("POST", "observaciones", true);
   console.log();
   xhr6.onload = ()=>{
   if(xhr6.readyState === XMLHttpRequest.DONE){
       if(xhr6.status === 200){
         let data6 = xhr6.response;
         ok.innerHTML = data6;       
       }
   }
   }
   xhr6.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xhr6.send(formData);
} */

// function imprimirTabla(ausencia,id_login) {


//   console.log(ausencia,id_login);
  
    
//     obj = [{ "id_login": `${id_login}`, "ausencia":`${ausencia}` }];
//     console.log(obj)
//     dbParam = JSON.stringify(obj);
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "observaciones", true);
//     xhr.onload = () => {
//       if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//           let data = xhr.response;
//           //document.getElementById('nombrearea').value='';
//           vista_grupos.innerHTML = data;


          
//           xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//           xhr.send(Data);
//         }
//       }
//     }
  
//   }

 
 