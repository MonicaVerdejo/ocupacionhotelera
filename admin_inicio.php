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
                <i class="fas fa-chart-pie"></i>
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
                      $db=new DB();
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
              <li>
                <a href="admin_becarios.php">
                  <i class="fas fa-graduation-cap"></i>
                  <span>Becarios</span>
                </a>
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
          <h2>Datos</h2>
          <!-- Correos de los hoteles-->
          <div class="row">
          <div class="col-lg-6 col-md-6 .col-sm-12 .col-xs-12 ">
            <div class="tabla card">
              <div>

                <h3 class="ml-3 mt-3 card-title "><img src="public/img/mail.svg" height="50" width="50"> Correos de hoteles </h3>
                <hr>
                <div class="row">
                  <div class="resultados col-12 table-responsive ">
                    <table class="table" align="center">
                        <tr class="bg-dark text-white">
                        </tr>
                        <tr class="bg-light text-dark">
                            <th>Hotel</th>
                            <th>Correo</th>
                        </tr>

                        <?php

                        $sentencia = $db->connect()->prepare("SELECT usuario, correo FROM usuario WHERE rol_id = '2'");
                        $sentencia->execute();

                        foreach ($sentencia as $row) {

                        ?>
                            <tr>
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </table>
                    <br>
                  </div>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Correos registrados por los hoteles.</small>
                </div>
              </div>
            </div>

          </div>
          <div class="col-lg-6 col-md-6 .col-sm-12 .col-xs-12 ">
            <section id="tabla_resultado" class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <h3 class="ml-3 mt-3 card-title "><img src="public/img/check-circle.svg" height="50" width="50"> Status entrega de reporte </h3>
                                <hr>
                                <div class="row">
                                  <div class="col-4 form-group">
                                      <label for="fecha_inicio">Fecha</label>
                                      <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                                  </div>
                                  <div class="resultados col-12 table-responsive ">
                                    <table class="table" align="center">
                                        <tr class="bg-dark text-white">
                                        </tr>
                                        <tr class="bg-light text-dark">
                                            <th>Hotel</th>
                                            <th>Status</th>
                                        </tr>

                                        <?php

                                        $sentencia = $db->connect()->prepare("SELECT usuario FROM usuario WHERE rol_id = '2'");
                                        $sentencia->execute();

                                        foreach ($sentencia as $row) {

                                        ?>
                                            <tr>
                                                <td><?php echo $row[0]; ?></td>
                                                
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </table>
                                    <br>
                                  </div>
                                </div>
                                <div class="card-footer">
                                  <small class="text-muted">Correos registrados por los hoteles.</small>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">










                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
        </div>
                <div class="card-footer">
                  <small class="text-muted">Hoteles que ya hicieron su registro mensual</small>
                </div>
              </div>
            </div>
          </div>
          <!--Fin grafica 2-->
          <hr>
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
