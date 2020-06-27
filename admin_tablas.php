<?php
require_once 'db.php';
$db = new DB();

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <link rel="stylesheet" href="public/css/styles20.css">
    <link rel="stylesheet" href="public/css/styles21.css">
    <link rel="stylesheet" href="public/css/tablas.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="public/img/cropped-logom3-1.png" type="image/x-icon">
    <!-- DataTables -->
    <link rel="stylesheet" href="public/TABLA/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="public/TABLA/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/TABLA/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<style>
    body{
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
                      $sentencia = $db->connect()->prepare("SELECT id, usuario FROM usuario");
                      $sentencia->execute();

                      foreach ($sentencia as $row) {

                      ?>
                        <form class="text-center" action="buscarid.php" method="POST">

                          <input type="submit" class="btn btn-outline-info btn-sm mt-1 mb-1" name="id" id="id" <?php

                                                                                                                if ($row[1] != 'Administrador') {
                                                                                                                ?> value=" <?php echo $row[1]; ?>"><?php

                                                                                                                                                  } else {
                                                                                                                                                    ?> style="display: none;" > <?php
                                                                                                                                                                              }
                                                                                                                                                                                ?></input type="submit">


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
                    <h2>Tabla de registros</h2>

                    <header style="position:relative; z-index:1;">
                        <div class="text-center alert alert-info">
                            <h1 class="mt-2 mb-2">OCUPACIÓN HOTELERA</h1>
                        </div>
                    </header>

                    <!-- PRUEBA DE CONSULTA CON JQUERY-->
                    <form class="form-inline mt-4 mb-2 mr-0 txt-center container" method="POST">
                        <div class="row  col-10">
                            <div class="col-4 form-group">
                                <label for="fecha_inicio">Fecha Inicio:</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                            </div>
                            <div class="col-4 form-group">
                                <label for="fecha_final">Fecha Final:</label>
                                <input type="date" class="form-control" id="fecha_final" name="fecha_final" required>
                            </div>


                        </div>
                    </form>
                    <hr>

                    <form method="POST" class="container mr-0">
                        <div class="row col-5  mt-4">
                            <div class="input-group mb-3">
                                <label for="caja_busqueda">Buscar:</label>
                                <input type="text" name="caja_busqueda" id="caja_busqueda" class="form-control" placeholder="">

                            </div>
                        </div>

                    </form>

                    <!-- TABLAS -->

                    <section id="tabla_resultado" class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title text-center">ESTADÍSTICA DE LA OCUPACIÓN HOTELERA</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="datos" class="text-center table table-bordered table-hover">
                                          
                                               
                                               
                                                
                                               
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>




                </div>

            </main>
            <!-- page-content" -->
            <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        </div>

    </main>
    <script src="public/js/jquery-3.2.1.min.js"></script>
    <script src="public/js/buscar_datos.js"></script>
    <script src="public/js/buscar_fechas.js"></script>

</body>



</html>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script id="rendered-js" src="public/js/js.js"></script>

<!-- jQuery -->
<script src="public/TABLA/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/TABLA/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="public/TABLA/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="public/TABLA/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="public/TABLA/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="public/TABLA/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#datos').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>