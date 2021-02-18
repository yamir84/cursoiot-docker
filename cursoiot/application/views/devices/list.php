<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dispositivos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Inicio</a></li>
              <li class="breadcrumb-item active">Dispositivos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-success">

        <div class="card-header">
          <h3 class="card-title">Crear un nuevo Dispositivo</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body">

              <form role="form" action="<?php echo base_url();?>dispositivos/store" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Dispositivo" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Número de Serie</label>
                    <input type="text" class="form-control" id="serie" name="serie" placeholder="Llene mínimo 7 caracteres alfanuméricos" required="">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
              </form>

        </div>

      </div>
      <!-- /.card -->

      <!-- Default box -->
      <div class="card card-info">

        <div class="card-header">
          <h3 class="card-title">Listado de todos los Dispositivos</h3>

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
                      <th>Nombre</th>
                      <th>Serie</th>
                      <th>Creado</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                   </tr>
                  </thead>

                <tbody>

                  <?php if(!empty($dispositivos)):?>
                   <?php foreach($dispositivos as $dispositivo):?>

                      <tr>
                              <td data-title="-" align="center">
                                <i class="fa fa-microchip fa-fw text-primary text-md va-middle"></i>
                              </td>
                              <td data-title="Nombre"><?php echo $dispositivo->device_nombre;?></td>
                              <td data-title="Serie"><?php echo $dispositivo->device_serie;?></td>
                              <td data-title="Fecha"><?php echo $dispositivo->device_date;?></td>
                              <td data-title="Estado">

                               <?php if ( $dispositivo->device_estado == 1):?>
                                 <?php echo "<span class='label label-table label-success'>Activo</span>"?>
                               <?php else: ?>
                                 <?php echo "<span class='input-group-text'><i class='fas fa-circle text-secondary'></i></span>"?>
                               <?php endif; ?>
                              </td>

                          <td data-title="Acciones"align="center">

                              <div class="btn-group">

                                <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#modal-info"
                                onclick="selDevice('<?php echo $dispositivo->device_id?>','<?php echo $dispositivo->device_nombre?>','<?php echo $dispositivo->device_serie?>');">
                                  <i class="fa fa-edit"></i>
                                </button>

                                <a href="<?php echo base_url()?>dispositivos/delete/<?php echo $dispositivo->device_id;?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                              </div>

                          </td>

                      </tr>
                    <?php endforeach;?>
                  <?php endif;?>
               </tbody>

          </table>

      </div>

      </div>
      <!-- /.card -->


    <!-- /.Ventana Modal -->
      <div class="modal fade" id="modal-info" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-info">

            <div class="modal-header">
              <h4 class="modal-title " id="titulo">Dispositivo:</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">

        <form role="form" action="<?php echo base_url()?>dispositivos/update/" method="POST">

                  <input hidden="" type="text" class="form-control" id="idupdate" name="idupdate">

                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="nombreupdate" name="nombreupdate" placeholder="Nombre del Dispositivo" >
                  </div>

                  <div class="form-group">
                    <label>Serie</label>
                    <input disabled="" type="text" class="form-control" id="serieupdate" name="serieupdate">
                  </div>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>

              <button type="submit" class="btn btn-outline-light">Actualizar</button>


            </div>

        </form>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.Ventana Modal -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
