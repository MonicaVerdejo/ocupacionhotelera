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

$db = new DB();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Administrador</title>
  <link rel="shortcut icon" href="public/img/cropped-logom3-1.png" type="image/x-icon">
  <link rel="stylesheet" href="public/css/styles20.css" type="text/css">
  <link rel="stylesheet" href="public/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" type="text/css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/TABLA/dist/css/adminlte.min.css" type="text/css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" type="text/css">

  <script src="public/js/jquery-3.2.1.min.js" type="text/javascript"></script>

  <style>
    body {
      background-color: #ededed;
    }
  </style>

</head>

<body>
  <main>

    <div class="page-wrapper chiller-theme toggled">
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
                      $sentencia = $db->connect()->prepare("SELECT usuario FROM usuario");
                      $sentencia->execute();

                      foreach ($sentencia as $row) {

                      ?>
                        <form class="text-center" action="buscar_id.php" method="POST">
                          <input type="submit" id="hotel" name="hotel" class="btn btn-outline-info btn-sm mt-1 mb-1" <?php

                                                                                                                      if ($row[0] != 'Administrador') {
                                                                                                                      ?> value="<?php echo $row[0]; ?>"><?php
                                                                                                                      }else {
                                                                                                                            ?> style="display: none;" > 
                                                                                                                            <?php        
                                                                                                                            }
                                                                                                                            ?>
                          </input>
                        </form>
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
          <div class="row">
            <div class="col-12">
            <div class="row">
              <div class="col-10"> <h2 class="mt-3">Datos</h2></div>
              <div class="col-2"> <img width="130" height="110" class="img-responsive mr-0 mt-0" src="public/img/h_ayuntamiento.svg" alt="Honorable ayuntamiento de Champotón"></div>
            </div>  
   
            </div>
            <div class="col-12">
              <header style="position:relative; z-index:1;">
                <div class="text-center alert alert-info">
                  <h1 class="mt-2 mb-2">OCUPACIÓN HOTELERA</h1>
                </div>
              </header>
            </div>


          </div>


          <!-- Container correos de los hoteles-->
          <div class="row">
            <div class="col-lg-6 col-md-6 .col-sm-12 .col-xs-12 ">
              <div class="tabla card">
                <h3 class="ml-3 mt-3 card-title "><img src="public/img/mail.svg" height="50" width="50"> Correos de hoteles </h3>
                <div>

                  
                  <hr>
                  <div class="row">
                    <div class="resultados col-12 table-responsive ">
                      <!--Tabla correo de los hoteles-->
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
                      <!--Fin tabla correo de los hoteles-->
                      <br>
                    </div>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Correos registrados por los hoteles.</small>
                  </div>
                </div>
              </div>
            </div>
            <!--Fin container correo de los hoteles-->
            <!--Container status de registro-->
            <div class="col-lg-6 col-md-6 .col-sm-12 .col-xs-12 ">
              <section id="tabla_resultado" class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <h3 class="ml-3 mt-3 card-title "><img src="public/img/check-circle.svg" height="50" width="50"> Estatus de entrega de reportes</h3>
                        <hr>

                        <div class="row">
                          <form method="POST" class="container mr-0">
                            <div class="row col-8  mt-2">
                              <div class="input-group mb-2">

                                <input name="consulta" id="caja_busqueda" type="text" class="form-control ml-3" placeholder="Buscar hotel...">
                                <div class="input-group-append">
                                  <!--<button type="submit" disabled class="btn btn-outline-secondary"
                                                      type="button"> Buscar</button>-->
                                </div>

                              </div>
                            </div>
                          </form>
                        </div>

                        <div class="resultados col-12 table-responsive ">
                          <table class="table" id="datos" align="center">




                          </table>
                          <br>
                        </div>

                      </div>
                      <div class="card-footer">
                        <small class="text-muted">Hoteles que ya hicieron su registro mensual</small>
                      </div>
              </section>
            </div>

          </div>
        </div>
    </div>
    </div>
    </div>

  </main>

  <script src="public/js/js.js" type="text/javascript"></script>
  <script src="public/js/buscar_registro_mensual.js" type="text/javascript"></script>
  <script src="public/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="public/js//popper.min.js" type="text/javascript"></script>
  <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js" type="text/javascript"></script>

</body>

</html>