<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" onload="traedata();">
    <!-- Content Header (Page header) -->
       
       <br>

          <div class="col-md-12">
            <div class="bg-teal color-palette">
              <div class="card-header">
                <h3 class="card-title">Método Publish EMQX Broker MQTT</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                

                    <div class="row">
                      <div class="col-sm-3">
                        <input type="text" id="topic" class="form-control" placeholder="Topico {0000002/command}">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" id="payload" class="form-control" placeholder="Mensaje {on}">
                      </div>
                      <div class="col-sm-3">
                        <select id="qos" class="form-control">
                          <option value="">QoS</option>
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <button type="button" class="btn btn-block bg-gradient-purple" onclick="publicarMQTT();"><i class="fas fa-upload"></i> Publicar</button>
                      </div>
                      <div class="col-sm-1" id="carita">

                        <button type="button" class="input-group-text bg-gradient-primary d-flex justify-content-center" disabled="" ><i class="far fa-meh"></i></button>
                
                        <!-- <i class="far fa-meh"></i> -->
                        <!-- <i class="far fa-frown"></i> -->
                        <!-- <i class="far fa-smile-beam"></i> -->
                        <!-- <i class="far fa-dizzy"></i> -->
                      </div>
                    </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


</div>
<!-- /.content-wrapper -->

<script type="text/javascript">


function publicarMQTT(){

    var AppID="89ffe22b0effc"; //user
    var AppSecret="MjkzNjg0MzM0NzU0ODE1Mzk5OTcxMDQ0MDE1MzEzMzg3NTC"; //password

    //Capturamos las variables de los input
    var topic = $("#topic").val();
    var payload = $("#payload").val();
    var qos = $("#qos").val();

    console.log(topic); 
    console.log(payload); 
    console.log(qos); 
     //https://cors-anywhere.herokuapp.com/
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "https://cors-anywhere.herokuapp.com/http://cubaelectronica.com:8090/api/v4/mqtt/publish",
        data:`{"topic":"${topic}","payload":"${payload}","qos":${qos},"retain":false,"clientid":"WEB_API"}`,
        
        beforeSend: function (xhr){ 
          xhr.setRequestHeader('Authorization', "Basic " + btoa(AppID+":"+AppSecret)); 
        },

        success : function(data) {
         
          console.log(data); 

          if (data.code === 0) {

            var carita = document.getElementById('carita');

            carita.innerHTML= "";

            carita.innerHTML = `
                  
                  <button type="button" class="input-group-text bg-gradient-success d-flex justify-content-center" disabled="" ><i class="far fa-smile-beam"></i></button>   

              `;
          }

       },

        error: function (xhr,ajaxOptions,throwError){
        //Error block 
          console.log("NO");

          var carita = document.getElementById('carita');

          carita.innerHTML= "";

          carita.innerHTML = `
                
                <button type="button" class="input-group-text bg-gradient-danger d-flex justify-content-center" disabled="" ><i class="far fa-dizzy"></i></button>   

            `;

      },

    });
 
}; //cerramos suscripcion



  



</script>