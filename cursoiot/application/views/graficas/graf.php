<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gráficas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Inicio</a></li>
              <li class="breadcrumb-item active">Gráficas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Rango de Fechas - Dispositivos - Variables</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body">

          <form role="form">
                <div class="card-body">
                  <!-- Date Inicio -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Fecha Inicio:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" name="fechainicio" id="fechainicio" class="form-control datetimepicker-input" data-target="#reservationdate" 
                           value="<?php echo !empty($fechainicio) ? $fechainicio :'';?>"/>
                           <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                             <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                    </div>
                  </div>
                  <!-- Date Fin -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Fecha Final:</label>
                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                          <input type="text" name="fechafin" id="fechafin" class="form-control datetimepicker-input" data-target="#reservationdate2" 
                           value="<?php echo !empty($fechafin) ? $fechafin :'';?>"/>
                           <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                             <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                    </div>
                  </div> 
                  
                  <?php 
                          
                    echo " <script type='text/javascript'> 
                              $(function () { 
                                $('#fechainicio').val(moment().subtract(29, 'days').format('YYYY-MM-DD HH:mm')); 
                                $('#fechafin').val(moment().format('YYYY-MM-DD HH:mm')); 
                              });
                            </script>";
                      
                  ?>

                  <!-- Dispositivos -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Selecciona un Dispositivo:</label>
                        <select class="form-control select2" name="idDevice" id="idDevice" style="width: 100%;">
                          <optgroup label="Dispositivo">
                            <?php if(!empty($dispositivos)):?>
                              <?php foreach($dispositivos as $dispositivo):?>
                                <option value="<?php echo $dispositivo->device_id ?>">Nombre: <?php echo $dispositivo->device_nombre ?> - Serie: <?php echo $dispositivo->device_serie ?></option>
                              <?php endforeach;?>
                            <?php endif;?>
                          </optgroup>
                        </select>
                    </div>
                  </div> 
                  <!-- Variables -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Selecciona una Variable:</label>
                        <select class="form-control select2" name="idDevice" id="variable" style="width: 100%;">
                          <optgroup label="Variable">
                             <option value="WIFI-db">WiFi (dbm)</option>
                             <option value="TEMP-CPU">Temperatura CPU (ºC)</option>
                             <option value="TEMP-EXT">Temperatura Externa (ºC)</option>
                             <option value="HUM-EXT">Humedad Externa (%)</option>
                             <option value="IND-EXT">Sensación Térmica (ºC)</option>
                             <option value="TODAS">Todas</option>
                           </optgroup>
                        </select>
                    </div>
                  </div>        
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary" id="btnBuscar" onclick="datagrafico('<?php echo base_url();?>')">Graficar</button>
                </div>
          </form>

        </div>
      </div>

      <!-- Default box -->
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Gráficas por Dispositivos</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body">

           <!-- Aquí las Gráfias. --> 

           <figure class="highcharts-figure">
              <div id="container"></div>
              <p class="highcharts-description">
                  Gráfica de tipo Línea con las principales Variables por Dispositivos. <code>IOT CubaElectronica</code>
              </p>
          </figure>
          
  

        </div>

      </div>

  </div>
  <!-- /.card -->

  
<script type="text/javascript">

   ////////////////////Gráfico///////////////////////////
        function datagrafico(base_url){
         
          var  fecha_inicio = $("#fechainicio").val();
          var  fecha_fin = $("#fechafin").val();
          var  variable = $("#variable").val();
          var  device_serie = $( "#idDevice" ).val(); 

        /*
             console.log(fecha_inicio);
             console.log(fecha_fin);
             console.log(variable);
             console.log(device_serie);  */
            
            if (variable != 'TODAS'){

              $.ajax({

                    url:"<?php echo base_url();?>data/getDato",
                    method: "POST",
                    data:{device_serial: device_serie, fecha_inicio: fecha_inicio, fecha_fin: fecha_fin, variable: variable},
                    dataType: "json",
                      success: function(data){
                        var meses = new Array();
                        var montos = new Array();
                          $.each(data, function(key, value){
                              meses.push(value.mes);
                              valor = Number(value.monto);
                              montos.push(valor);
                              serie = value.serie;
                          });

                          graficar(meses, montos, serie, variable);
                      }
                 });

            }else{

              $.ajax({

                    url:"<?php echo base_url();?>data/getDato",
                    method: "POST",
                    data:{device_serial: device_serie, fecha_inicio: fecha_inicio, fecha_fin: fecha_fin, variable: variable},
                    dataType: "json",
                      success: function(data){

                        var fechas = new Array();
                        var wifi = new Array();
                        var cpu = new Array();
                        var temp = new Array();
                        var hum = new Array();
                        var ind = new Array();

                          $.each(data, function(key, value){

                              fechas.push(value.fechas);

                              valorwifi = Number(value.wifi);
                              wifi.push(valorwifi);

                              valorcpu = Number(value.cpu);
                              cpu.push(valorcpu);

                              valortemp = Number(value.temp);
                              temp.push(valortemp);

                              valorhum = Number(value.hum);
                              hum.push(valorhum);

                              valorind = Number(value.ind);
                              ind.push(valorind);

                              serie = value.serie;

                          });

                          graficarTodas(fechas, wifi, cpu, temp, hum, ind, serie, variable);
                      }
                 });
            }
                  

        }

        function graficar(meses, montos, serie, variable){

        Highcharts.chart('container', {

              title: {
                  text: 'Valores del nivel de señal ' + variable
              },

              subtitle: {
                  text: 'Dispositivo Serie: ' + serie
              },

              yAxis: {
                  title: {
                      text: variable
                  }
              },

              xAxis: {
                  accessibility: {
                      rangeDescription: meses
                  },

                  categories: meses
              },

              legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'middle'
              },

              plotOptions: {
                  column: {
                      pointPadding: 0.1,
                      borderWidth: 0
                  },
                  series: meses
              },

              series: [{
                  name: variable,
                  data: montos
              }
              ],

              responsive: {
                  rules: [{
                      condition: {
                          maxWidth: 500
                      },
                      chartOptions: {
                          legend: {
                              layout: 'horizontal',
                              align: 'center',
                              verticalAlign: 'bottom'
                          }
                      }
                  }]
              }

          });
       }

        function graficarTodas(fechas, wifi, cpu, temp, hum, ind, serie, variable){

        Highcharts.chart('container', {

              title: {
                  text: 'Valores del nivel de señal ' + variable
              },

              subtitle: {
                  text: 'Dispositivo Serie: ' + serie
              },

              yAxis: {
                  title: {
                      text: variable
                  }
              },

              xAxis: {
                  accessibility: {
                      rangeDescription: fechas
                  },

                  categories: fechas
              },

              legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'middle'
              },

              plotOptions: {
                  column: {
                      pointPadding: 0.1,
                      borderWidth: 0
                  },
                  series: fechas
              },

              series: [{
                  name: 'WiFi',
                  data: wifi
              }, {
                  name: 'Temp CPU',
                  data: cpu
              }, {
                  name: 'Temp DHT',
                  data: temp
              }, {
                  name: 'Hum DHT',
                  data: hum
              }, {
                  name: 'HumRelativa DHT',
                  data: ind
              } 
              ],

              responsive: {
                  rules: [{
                      condition: {
                          maxWidth: 500
                      },
                      chartOptions: {
                          legend: {
                              layout: 'horizontal',
                              align: 'center',
                              verticalAlign: 'bottom'
                          }
                      }
                  }]
              }

          });

      }


     ////////////////////////////////////////////////////////////////////////

</script>

