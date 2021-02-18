<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Inicio</a></li>
              <li class="breadcrumb-item active">Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card card-secondary">

        <div class="card-header">
          <h3 class="card-title">Rango de Fechas & Dispositivos</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body">

          <form role="form"  action="<?php echo current_url();?>" method="POST">
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

                  if (empty($fechafin)){
                    
                    echo " <script type='text/javascript'> 
                              $(function () { 
                                $('#fechainicio').val(moment().subtract(29, 'days').format('YYYY-MM-DD')); 
                                $('#fechafin').val(moment().format('YYYY-MM-DD')); 
                              });
                            </script>";
                  }else{
                      
                      echo " <script type='text/javascript'> 
                               $(function () { 
                                  swal('Excelente!', 'Usted filtro la data en el siguiente rango, Fecha Inicio: ".$fechainicio."".' '."Fecha Fin: ".$fechafin."', 'success');
                               });
                             </script>";
                  }

                  ?>

                  <!-- Dispositivos -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Selecciona un Dispositivo:</label>
                        <select class="form-control select2" name="idDevice" id="idDevice" style="width: 100%;">
                          <option selected="selected">Dispositivos</option>
                            <?php if(!empty($dispositivos)):?>
                              <?php foreach($dispositivos as $dispositivo):?>

                                <?php if ($idDevice == $dispositivo->device_id): // Si el Id que retornamos es igual al que captura el en Foreach lo selecciono?>
                                  <option value="<?php echo $dispositivo->device_id ?>" selected>Nombre: <?php echo $dispositivo->device_nombre ?> - Serie: <?php echo $dispositivo->device_serie ?></option>
                                <?php else:?>
                                  <option value="<?php echo $dispositivo->device_id ?>">Nombre: <?php echo $dispositivo->device_nombre ?> - Serie: <?php echo $dispositivo->device_serie ?></option>
                                <?php endif;?>    

                              <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                  </div>         
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Filtrar</button>
                  <a href="<?php echo base_url();?>data" class="btn btn-info"> Restablecer</a>
                </div>
          </form>

        </div>
      </div>

      <!-- Default box -->
      <div class="card card-secondary">

        <div class="card-header">
          <h3 class="card-title">Data de Sensores</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body">

            
          <table id="table" class="table table-striped table-no-more table-bordered  mb-none">

                  <thead>
                   <tr>
                      <th style="width: 5%">-</th>
                      <th>Nombre del Dispositivo</th>
                      <th>Temp CPU</th>
                      <th>Temp DHT</th>
                      <th>Hum DHT</th>
                      <th>IndC DHT</th>
                      <th>WiFi</th>
                      <th>Fecha</th>
                   </tr>
                  </thead>

                <tbody>

                  <?php if(!empty($data)):?>
                   <?php foreach($data as $data):?>

                      <tr>

                          <td data-title="-" align="center">
                            <i class="fa fa-chart-bar fa-fw text-primary text-md va-middle"></i>
                          </td>
                          <td data-title="Nombre"><span class= "badge bg-danger">Nombre: <?php echo $data->nombre;?> </span> - <span class= "badge bg-success">Serie: <?php echo $data->serie;?></span></td>
                          <td data-title="Temp CPU"><?php echo $data->data_temp_cpu;?></td>
                          <td data-title="Fecha"><?php echo $data->data_temp_dht;?></td>
                          <td data-title="Nombre"><?php echo $data->data_hum_dht;?></td>
                          <td data-title="Serie"><?php echo $data->data_ind_dht;?></td>
                          <td data-title="Fecha"><?php echo $data->data_wifi;?></td>  
                          <td data-title="Fecha"><?php echo $data->data_date;?></td>   

                      </tr>

                    <?php endforeach;?>
                  <?php endif;?>

               </tbody>

          </table>
  

      </div>

      </div>

  </div>
  <!-- /.card -->
   