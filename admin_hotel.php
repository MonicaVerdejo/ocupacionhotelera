<?php
include_once 'db.php';
session_start();

if (!isset($_SESSION['rol'])) {
  header('location: index.php');
} else {
  if ($_SESSION['rol'] != 1) {
    header('location: index.php');
  }
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Administrador</title>
  <link rel="stylesheet" href="public/css/styles20.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
  <!-- Site Icons -->
  <link rel="shortcut icon" href="public/img/cropped-logom3-1.png" type="image/x-icon">
</head>

<body>
  <main>

    <div class="page-wrapper chiller-theme toggled">
      <!--sideBar-->
      <!--Sidebar-->
      <a id="show-sidebar" style="position:absolute; z-index:3;" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
      </a>
      <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
          <div class="sidebar-brand">
            <a href="#">Administrador</a>
            <div id="close-sidebar">
              <i class="fas fa-times"></i>
            </div>
          </div>
          <div class="sidebar-menu">
            <ul>
              <li class="header-menu">
                <span>General</span>
              </li>
              <li>
                <a href="admin_inicio.php">
                  <i class="fa fa-tachometer-alt"></i>
                  <span>Inicio</span>
                </a>
              </li>

              <li>
                <a href="admin_tablas.php">
                  <i class="fas fa-table"></i>
                  <span>Tablas</span>
                </a>

              </li>

              <li>
                <a href="admin_graficas.php">
                  <i class="fas fa-align-justify"></i>
                  <span>Graficas</span>
                </a>
              </li>

              <li class="sidebar-dropdown">
                <a href="#">
                  <i class="fas fa-h-square"></i>
                  <span>Hoteles</span>
                </a>
                <div class="sidebar-submenu">
                  <ul>
                    <li>
                      <?php
                      $sentencia = $db->connect()->prepare("SELECT usuario FROM usuario");
                      $sentencia->execute();

                      foreach ($sentencia as $row) {

                      ?>
                        <a <?php

                            if ($row[0] != 'Administrador') {
                            ?>> <?php echo $row[0];
                                                      } else {
                                                        ?> style="display: none;" > <?php
                                                                                  }
                                                                                    ?></a>
                      <?php
                      }
                      ?>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="header-menu">
                <span>Sistema</span>
              </li>
              <li>
                <a href="cerrar.php">
                  <i class="fa fa-power-off"></i>
                  <span>Salir</span>
                </a>
              </li>

            </ul>
            <!-- sidebar-menu  -->
          </div>
          <!-- sidebar-content  -->
      </nav>
      <!-- Sidebar end -->


      
      <main class="page-content">
        <div class="container-fluid">
          <h2>Hotel</h2>

          <hr>
          <div class="row">
            <div class="form-group col-md-12">
              <p>datos del hotel</p>
              <p>podra personalizar el costo de habitación y ver el perfil (que cosa, no se )</p>
            </div>
          </div>


        </div>

      </main>
      <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
  </main>
</body>

<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script id="rendered-js" src="public/js/js.js"></script>

</html>