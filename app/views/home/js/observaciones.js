const form = document.querySelector("#reg_observa"),
continueBtn = document.querySelector("#btn_observa"),
errorText = document.querySelector("#error-text");

  function observar_grupos(id_grupo){
    vista_grupos=document.getElementById('vista_grupos')
    obj = [{ "tipo": 0, "id_grupo": id_grupo}];
    traerReasig = JSON.stringify(obj);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "observaciones", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              vista_grupos.innerHTML = data;
                 table= $('#datos_impresos').DataTable({
                  
                "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
                "responsive": false,
                paging: false,
                retrieve: true,

                
                
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                },
                "order": [
                    [0, "desc"]
                ],
                "initComplete": function () {
                    this.api().columns().every(function () {
                        var that = this;
                        $('input', this.footer()).on('keyup change', function () {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();                                    
                                  
                            }
                        });
                    })
                },
                "buttons": ['csv', 'excel', 'pdf', 'print']

              });             
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("x=" + traerReasig);
  table.destroy();

  }

  function traeridreasignar(id){
    ok=document.getElementById('idtkredireccion');
    obj = [{ "estado": 2, "id": id }];
      traerid = JSON.stringify(obj);
    let xhr6 = new XMLHttpRequest();
    xhr6.open("POST", "observaciones", true);
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
  