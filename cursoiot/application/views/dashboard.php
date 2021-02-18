<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard desde Docker</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Inicio</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


  <!-- Main content -->
    <section class="content">

      <?php if(!empty($dispositivos)):?>
       <?php foreach($dispositivos as $dispositivo):?>

         <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    Datos del <b>Dispositivo: </b><?php echo $dispositivo->device_nombre;?> <b>Serie: </b><?php echo $dispositivo->device_serie?>
                  </h3>

                  <div class="card-tools">
                    
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                    </button>

                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    
                    <div class="col-6 col-md-3 text-center">
                      <input type="text" class="knobCPUrange_<?php echo $dispositivo->device_serie?>"  data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="0" data-width="120" data-height="120" readonly="true" data-fgColor="#C0392B">

                      <div class="knob-label">Temperatura CPU °C</div>
                    </div>
                    <br>
                    <!-- ./col -->
                    <div class="col-6 col-md-3 text-center">
                      <input type="text" class="knobTemprange_<?php echo $dispositivo->device_serie?>" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="0" data-width="120" data-height="120" readonly="true" data-fgColor="#5B2C6F">

                      <div class="knob-label">Temperatura DHT11 °C</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-6 col-md-3 text-center">
                      <input type="text" class="knobHumrange_<?php echo $dispositivo->device_serie?>" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="0" data-width="120" data-height="120" readonly="true" data-fgColor="#2ECC71">

                      <div class="knob-label">Humedad DHT11 %</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-6 col-md-3 text-center">
                      <input type="text" class="knobSenTrange_<?php echo $dispositivo->device_serie?>" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="0" data-width="120" data-height="120"  readonly="true" data-fgColor="#3498DB">

                      <div class="knob-label">Índice de calor DHT11 °C</div>
                    </div>
                    <!-- ./col -->
                  </div>

                <br>
                <!-- /.row Boton ON -->
                <div class="row">

                    <div class="col-6 col-md-3 text-center">

                        <a id="btnON_<?php echo $dispositivo->device_serie?>" class="btn btn-app bg-gradient-success" onclick="setRelay('on','<?php echo $dispositivo->device_serie?>');">
                        <i class="fas fa-power-off"></i>ON</a>
                        <div class="knob-label">GPIO-13</div>

                      

                    </div>
                    <!-- ./col Boton OFF -->
                    <div class="col-6 col-md-3 text-center">

                        <a id="btnOFF_<?php echo $dispositivo->device_serie?>" class="btn btn-app bg-gradient-danger disabled" onclick="setRelay('off','<?php echo $dispositivo->device_serie?>');">
                        <i class="fas fa-power-off"></i>OFF</a>
                        <div class="knob-label">GPIO-13</div>

                    </div>
                    <!-- ./col Slider -->
                    <div class="col-6 col-md-3 text-center">

                        <input class="rang" id="range_<?php echo $dispositivo->device_serie?>" onchange="process_dimmer('<?php echo $dispositivo->device_serie?>');" type="text"  value="">
                        <div class="knob-label">Dimmer GPIO-2 LED BOARD</div>

                    </div>
                    <!-- ./col Alarma -->
                    <div class="col-6 col-md-3 text-center">

                      <a class="btn btn-app bg-gradient-purple disabled" id="Alrange_<?php echo $dispositivo->device_serie?>">
                      <i class="fa fa-bell" aria-hidden="true"></i></a>
                      <!-- 
                           <i class="far fa-lightbulb"></i> 
                           <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                      -->
                      <div class="knob-label">Input GPIO-25</div>
                    </div>
                    <!-- ./col -->
               </div>

              <br>

              <!-- /.row Boton ON -->
                <div class="row">

                    <div class="col-6 col-md-3 text-center">

                        <a id="btnON1_<?php echo $dispositivo->device_serie?>" class="btn btn-app bg-gradient-success" onclick="setRelay('on1','<?php echo $dispositivo->device_serie?>');">
                        <i class="fas fa-power-off"></i>ON</a>
                        <div class="knob-label">GPIO-14</div>
 

                    </div>
                    <!-- ./col Boton OFF -->
                    <div class="col-6 col-md-3 text-center">

                        <a id="btnOFF1_<?php echo $dispositivo->device_serie?>" class="btn btn-app bg-gradient-danger disabled" onclick="setRelay('off1','<?php echo $dispositivo->device_serie?>');">
                        <i class="fas fa-power-off"></i>OFF</a>
                        <div class="knob-label">GPIO-14</div>

                    </div>
                    <!-- ./col Slider -->
                    <div class="col-6 col-md-3 text-center">
                      
                      <a id="btnON2_<?php echo $dispositivo->device_serie?>" class="btn btn-app bg-gradient-success" onclick="setRelay('on2','<?php echo $dispositivo->device_serie?>');">
                        <i class="fas fa-power-off"></i>ON</a>
                        <div class="knob-label">GPIO-13</div>


                    </div>
                    <!-- ./col Alarma -->
                    <div class="col-6 col-md-3 text-center">

                        <a id="btnOFF2_<?php echo $dispositivo->device_serie?>" class="btn btn-app bg-gradient-danger disabled" onclick="setRelay('off2','<?php echo $dispositivo->device_serie?>');">
                        <i class="fas fa-power-off"></i>OFF</a>
                        <div class="knob-label">GPIO-13</div>

                    </div>
                    <!-- ./col -->
               </div>

              <br>

              <div class="row">

                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-wifi"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Señal WiFi</span>
                      <span id="wifi_<?php echo $dispositivo->device_serie?>" class="info-box-number">0 dBm</span>
                      <span id="wifi2_<?php echo $dispositivo->device_serie?>" class="info-box-number">Calidad</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-history"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Ultima Conexión</span>
                      <span id="display_time<?php echo $dispositivo->device_serie?>" class="info-box-number">--/--/----</span>
                      <span id="display_time2<?php echo $dispositivo->device_serie?>" class="info-box-number">--:--:--</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-bell"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Ultimo Evento</span>
                      <span id="display_time3<?php echo $dispositivo->device_serie?>" class="info-box-number">--/--/----</span>
                      <span id="display_time4<?php echo $dispositivo->device_serie?>" class="info-box-number">--:--:--</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-ethernet"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Dirección IP</span>
                      <span id="display_time5<?php echo $dispositivo->device_serie?>" class="info-box-number">Red_Local</span>
                      <span id="display_ip<?php echo $dispositivo->device_serie?>" class="info-box-number">---.---.---.---</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

              </div> 

             </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

   <?php endforeach;?>
  <?php endif;?>

  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->
