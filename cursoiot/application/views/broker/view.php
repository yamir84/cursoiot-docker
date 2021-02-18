<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" onload="traedata();">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>EMQX Broker</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Inicio</a></li>
              <li class="breadcrumb-item active">EMQX Broker</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


  <!-- Main content -->
    <section class="content">

       <!-- =========================================================== -->
         <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-file-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Nombre del Sistema</span>
                <span id="name" class="info-box-number">---</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  Curso IOT Cubaelectronica
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="fab fa-buffer"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Versión</span>
                <span id="version" class="info-box-number">---</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  Curso IOT Cubaelectronica
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="fas fa-hourglass-half"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tiempo de Funcionamiento</span>
                <span id="tiempo" class="info-box-number">---</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
      
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="far fa-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Hora del Sistema</span>
                <span id="hora" class="info-box-number">---</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  Curso IOT Cubaelectronica
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Clientes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ClienteID</th>
                      <th>UserName</th>
                      <th>IP:PORT</th>
                      <th>KeepAlive</th>
                      <th>SubsCriptions</th>
                      <th>Status</th>
                      <th>CreatedAT</th>
                    </tr>
                  </thead>
                  <tbody id="mi_tabla2">

                   <!-- /. Aquí dibujaremos el cuerpo de la tabla 

                    <tr>
                      <td>--</td>
                      <td>--</td>
                      <td>--</td>
                      <td>--</td>
                      <td>--</td>
                      <td>--</td>
                      <td>--</td>
                    </tr>

                   -->
                    
                  </tbody>
                </table>
              </div>
              <!-- /. paginación por defecto -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right" id="card_footer2">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Suscripciones</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ClienteID</th>
                      <th>Topico</th>
                      <th>QoS</th>
                    </tr>
                  </thead>
                  <tbody id="mi_tabla">

                   <!-- /. Aquí dibujaremos el cuerpo de la tabla 

                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr>

                   -->
                    
                  </tbody>
                </table>
              </div>
              <!-- /. paginación por defecto -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right" id="card_footer">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>


    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<script type="text/javascript">

traedata();

function traedata(){
    var AppID="89ffe22b0effc";
    var AppSecret="MjkzNjg0MzM0NzU0ODE1Mzk5OTcxMDQ0MDE1MzEzMzg3NTC";
     //https://cors-anywhere.herokuapp.com/
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://cors-anywhere.herokuapp.com/http://cubaelectronica.com:8090/api/v4/brokers",
        beforeSend: function (xhr){ 
          xhr.setRequestHeader('Authorization', "Basic " + btoa(AppID+":"+AppSecret)); 
        },

        success : function(data) {
         
          //console.log(data); 

          document.getElementById('name')
          .innerHTML = data.data[0].sysdescr;
          document.getElementById('version')
          .innerHTML = data.data[0].version;
          document.getElementById('tiempo')
          .innerHTML = data.data[0].uptime;
          document.getElementById('hora')
          .innerHTML = data.data[0].datetime;
          //llamamos a suscripcion cada ves que se dispare traedata y la pasamos pagina 1
          suscription(1);
          clientes(1);

       },

       error: function (xhr,ajaxOptions,throwError){
        //Error block 
        console.log("NO");
      },
    });
    //Se autoejecuta cada 60 segundos
    setInterval(traedata, 60000);
}
  

  
function suscription(page){
    //var contenido = document.querySelector("mi_tabla");
    var AppID="89ffe22b0effc";
    var AppSecret="MjkzNjg0MzM0NzU0ODE1Mzk5OTcxMDQ0MDE1MzEzMzg3NTC";
  
    $.ajax({
        type: "GET",
        dataType: "json",
        url: `https://cors-anywhere.herokuapp.com/http://cubaelectronica.com:8090/api/v4/subscriptions?_page=${page}&_limit=10`, 
        beforeSend: function (xhr){ 
          xhr.setRequestHeader('Authorization', "Basic " + btoa(AppID+":"+AppSecret)); 
        },
        success : function(data) {
          //Llamamos a iniciando
          iniciando(data,page);
       },
       error: function (xhr,ajaxOptions,throwError){
        //Error block 
        console.log("NO");
      },
    }); 
  
  function iniciando(data, page){
        //capturamos el id del Body para dibujar la tabla
        var mitabla = document.getElementById('mi_tabla');
        //capturamos el id del Card para dibujar la paginación
        var cardfooter = document.getElementById('card_footer');
        //capturamos el numero de elementos del JSON y lo pasamos a entero
        var cantregistros = parseInt(data.meta.count,0);
        //calculamos la cantidad de paginas redondeando por arriba
        var paginas = Math.ceil(cantregistros/10);
        //limpiamos ambos contenedores
        mitabla.innerHTML= "";
        cardfooter.innerHTML= "";
        //recorremos toda la lonjitud del JSON key DATA
        for(let valor of data.data){
          mitabla.innerHTML += `
                    <tr>
                      <td>${valor.clientid}</td>
                      <td>${valor.topic}</td>
                      <td>${valor.qos}</td>
                    </tr>
          `;
        };
       //dibujamos el li de la flecha atras
       if (page == 1) {
         cardfooter.innerHTML='<li class="page-item"><a class="page-link" onclick="suscription(1)">«</a></li>';
       }else{
         cardfooter.innerHTML=`<li class="page-item"><a class="page-link" onclick="suscription(${page-1})">«</a></li>`;
       }
       
       //recorremos un for con la cantidad de paginas
       for (var i = 0; i < paginas; i++) {
       //dibujamos el li por la cantidad de páginas 
        cardfooter.innerHTML += `
         <li class="page-item"><a class="page-link"  onclick="suscription(${i+1})">${i+1}</a></li>
        `;
        }
        //NOTA: con `` podemos usar ${variable} para colocar una variable dentro de la cadena.
        //dibujamos el li de la flecha adelante
        if (page == paginas) {
         cardfooter.innerHTML+= `<li class="page-item"><a class="page-link" onclick="suscription(${paginas})">»</a></li>`;
        }else{
         cardfooter.innerHTML+= `<li class="page-item"><a class="page-link" onclick="suscription(${page+1})">»</a></li>`;
        }
   }//cerramos iniciando
}; //cerramos suscripcion

//funcion para clientes
function clientes(page2){
    //var contenido = document.querySelector("mi_tabla");
    var AppID="89ffe22b0effc";
    var AppSecret="MjkzNjg0MzM0NzU0ODE1Mzk5OTcxMDQ0MDE1MzEzMzg3NTC";
  
    $.ajax({
        type: "GET",
        dataType: "json",
        url: `https://cors-anywhere.herokuapp.com/http://cubaelectronica.com:8090/api/v4/clients?_page=${page2}&_limit=10`,
        beforeSend: function (xhr){ 
          xhr.setRequestHeader('Authorization', "Basic " + btoa(AppID+":"+AppSecret)); //encript base 64
        },
        success : function(data2) {
          //Llamamos a iniciando
          clientes(data2,page2);
       },
       error: function (xhr,ajaxOptions,throwError){
        //Error block 
        console.log("NO");
      },
    }); 
  
  function clientes(data2, page2){
        //capturamos el id del Body para dibujar la tabla
        var mitabla2 = document.getElementById('mi_tabla2');
        //capturamos el id del Card para dibujar la paginación
        var cardfooter2 = document.getElementById('card_footer2');
        //capturamos el numero de elementos del JSON y lo pasamos a entero
        var cantregistros2 = parseInt(data2.meta.count,0);
        //calculamos la cantidad de paginas redondeando por arriba
        var paginas2 = Math.ceil(cantregistros2/10);
        //limpiamos ambos contenedores
        mitabla2.innerHTML= "";
        cardfooter2.innerHTML= "";
        //recorremos toda la lonjitud del JSON key DATA
        for(let valor of data2.data){
          mitabla2.innerHTML += `
                    <tr>
                      <td>${valor.clientid}</td>
                      <td>${valor.username}</td>
                      <td>${valor.ip_address} : ${valor.port}</td>
                      <td style="text-align:center;">${valor.keepalive}</td>
                      <td style="text-align:center;">${valor.subscriptions_cnt}</td>
                      <td>${valor.connected ? "<i class='fas fa-check'></i> CONECTADO" : " <i class='far fa-times-circle '></i> DESCONECTADO"}</td>
                      <td>${valor.created_at}</td>
                    </tr>
          `;
        };
       //dibujamos el li de la flecha atras
       if (page2 == 1) {
         cardfooter2.innerHTML='<li class="page-item"><a class="page-link" onclick="clientes(1)">«</a></li>';
       }else{
         cardfooter2.innerHTML=`<li class="page-item"><a class="page-link" onclick="clientes(${page2-1})">«</a></li>`;
       }
       
       //recorremos un for con la cantidad de paginas
       for (var i = 0; i < paginas2; i++) {
       //dibujamos el li por la cantidad de páginas 
        cardfooter2.innerHTML += `
         <li class="page-item"><a class="page-link"  onclick="clientes(${i+1})">${i+1}</a></li>
        `;
        }
        //NOTA: con `` podemos usar ${variable} para colocar una variable dentro de la cadena.
        //dibujamos el li de la flecha adelante
        if (page2 == paginas2) {
         cardfooter2.innerHTML+= `<li class="page-item"><a class="page-link" onclick="clientes(${paginas2})">»</a></li>`;
        }else{
         cardfooter2.innerHTML+= `<li class="page-item"><a class="page-link" onclick="clientes(${page2+1})">»</a></li>`;
        }
   }//cerramos iniciando
}; //cerramos clientes
   


</script>