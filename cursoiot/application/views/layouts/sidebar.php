<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url(); ?>" class="brand-link">
    <img src="<?php echo base_url(); ?>dist/img/logoCEIOT.png"
         alt="CEIOT Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">ESP32_IOT</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
   <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
       <li class="nav-item">
          <a href="<?php echo base_url(); ?>" class="nav-link">
            <i class="fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>broker" class="nav-link">
            <i class="fab fa-slideshare"></i>
            <p>
              Broker MQTT
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>broker/publish" class="nav-link">
            <i class="fas fa-upload"></i>
            <p>
              Publicar MQTT
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>dispositivos" class="nav-link">
            <i class="fa fa-microchip"></i>
            <p>
              Dispositivos
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>usuarios" class="nav-link">
            <i class="fa fa-user"></i>
            <p>
              Usuarios
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>data" class="nav-link">
            <i class="fa fa-chart-bar"></i>
            <p>
              Data
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>data/graficas" class="nav-link">
            <i class="fa fa-chart-area"></i>
            <p>
              Gráficas
            </p>
          </a>
        </li>
        <li class="nav-header"> <- DESCARGAS - CURSOIOT -></li>
        <li class="nav-item">
          <a href="https://github.com/yamir84/cursoiot" target="_blank" class="nav-link">
            <i class="fab fa-github"></i>
            <p>
              CursoIOT GitHub
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://github.com/yamir84/MQTT-con-ESP32-y-Servidor-VPS-EMQX" target="_blank" class="nav-link">
            <i class="fab fa-github"></i>
            <p>
              ESP32 GitHub
            </p>
          </a>
        </li>
        <li class="nav-header"> <- CHAT IOT CUBAELECTRONICA-></li>
        <li class="nav-item">
          <a href="https://chat.whatsapp.com/FMO60GbkRAJAGrNb8kNQUn" target="_blank" class="nav-link">
            <i class="fab fa-whatsapp"></i>
            <p>
              Grupo WhatsApp
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
