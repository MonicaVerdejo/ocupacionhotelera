<?php
ob_start();
require_once 'db.php';
$db = new DB();
session_start();

if (!isset($_SESSION['rol'])) {
  header('location: index.php');
} else {
  if ($_SESSION['rol'] != 1) {
    header('location: index.php');
  }
}

if (isset($_POST['hotel'])) {
  $_SESSION['hotel'] = $_POST['hotel'];
  //echo $_SESSION['hotel'];
} else {
  require 'buscar_id.php';
}
ob_flush();
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
  <link rel="stylesheet" href="public/css/bootstrap.min.css" type="text/css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="public/TABLA/dist/css/adminlte.min.css" type="text/css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"  type="text/css">
  <!--Chartjs-->
  <script src="Chartjs/Chart.min.js" type="text/javascript"></script>
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

                                                                                                                            } else {
                                                                                                                              ?> style="display: none;" > <?php
                                                                                                                                                        }
                                                                                                                                                          ?></input>
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
        <div class="container-fluid" id="infogeneral">
          <h2>Hoteles registrados</h2>

          <header style="position:relative; z-index:1;">
            <div class="text-center alert alert-info">
              <h1 class="mt-2 mb-2">OCUPACIÓN HOTELERA</h1>
            </div>
          </header>

          <!--Info general del hotel seleccionado-->
          <div class="row">
            <div class="col-sm-3">
              <div class="card">
                <img class="card-img-top img-responsive" src="public/img_profile/<?php echo $imgPerfil; ?>" alt="Card image">
                <div class="card-body">
                  <h1 class="card-title"><?php echo  $hotel; ?></h1>
                  <p class="card-text">Hotel</p>
                  <p class="card-text"><?php echo $correo; ?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-9">
              <div class="row">

                <!--Seccion de navbar-->
                <div class="col-sm-12">

                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand"><?php echo $hotel; ?></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                      <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="#infogeneral">Información del hotel <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="#graficas">Graficas</a>
                        <a class="nav-item nav-link" href="#tabla">Registros</a>

                      </div>
                    </div>
                  </nav>

                </div>




                <!--Sección info general-->
                <div class="col-sm-12 mt-5 mb-5">
                  <div class="row">
                    <!--INGRESOS-->
                    <div class="col-sm-4">
                      <div class="card" style="width: 18 rem;">
                        <div class="row card-body">
                          <div class="col-sm-6">
                            <h5 class="card-title">$<?php
                                                    echo $ingresos; ?></h5>
                            <BR></BR>
                            <h6 class="card-subtitle mb-2 text-muted">Ingresos</h6>
                          </div>
                          <div class="col-sm-6"><img width="100" height="100" src="public/img/ingresos.png" alt="Ingresos anuales registrados"></div>
                        </div>
                      </div>
                    </div>
                    <!--VISITAS DE TURISTAS-->
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="row card-body">
                          <div class="col-sm-6">
                            <h5 class="card-title"><?php echo $turismo; ?> visitas</h5>
                            <BR></BR>
                            <h6 class="card-subtitle mb-2 text-muted">Turismo</h6>
                          </div>
                          <div class="col-sm-6"><img width="100" height="100" src="public/img/turismo.jpg" alt="Turismo en ocupación hotelera"></div>
                        </div>
                      </div>
                    </div>
                    <!--PORCENTAJE DE OCUPACION HOTELERA-->
                    <div class="col-sm-4">
                      <div class="card" style="width: 15rem;">
                        <div class="row card-body">
                          <div class="col-sm-6">
                            <h5 class="card-title"><?php echo $porcentaje; ?>%</h5>
                            <BR></BR>
                            <h6 class="card-subtitle mb-2 text-muted">Porcentaje de ocupación</h6>
                          </div>
                          <div class="col-sm-6"><img width="100" height="100" src="public/img/favorito.png" alt="Hotel más visitado"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Formulario fecha de graficacion-->
                <div class="col-sm-12 col-lg-12 mt-5">

                  <form class="form-inline" action="buscar_id.php" method="POST">
                    <small id="passwordHelpInline" class="text-muted ml-2">
                      Escoja el año que desea graficar.
                    </small>
                    <div class="form-group ml-2">

                      <select id="year" class="" name="year">
                        <?php
                        for ($i = 2016; $i < 2023; $i++) {
                          if ($i == 2019) {
                            echo '<option value="' . $i . '" selected>' . $i . '</option>';
                          } else {
                            echo '<option value="' . $i . '" >' . $i . '</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <button class="btn btn-info ml-2" type="submit">Graficar</button>

                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--fin info del hotel-->

          <hr>

          <div id="graficas">

            <!--Graficas-->

            <h2>Gráficas <?php echo $hotel;  ?> </h2>
            <hr>

            <div class="row">
              <!-- Grafica Turismo/visitantes en champo-->
              <div class="col-lg-6 col-md-6 .col-sm-12 .col-xs-12 ">
                <div class="tabla card">
                  <h1 class="ml-3 mt-3 card-title">TURISMO</h1>
                  <div>


                    <hr>
                    <div class="row">
                      <div class="resultados col-12">
                        <canvas id="grafico" style="width:80%; margin-bottom:10%;"></canvas>
                      </div>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">La actividad turística comprende la cuantificación de las visitas que obtuvo el hotel.</small>
                    </div>


                  </div>

                  <script>
                    var contexto = document.getElementById("grafico").getContext("2d");
                    var grafico = new Chart(contexto, {

                      type: "line", //line,bar,pie,bubble,doughnut,polarArea


                      data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        datasets: [{
                          label: "Turistas de México",

                          pointStyle: 'rectRot',
                          //backgroundColor: 'rgba(70,228,146,0.6)', //color de la barra
                          //backgroundColor: 'transparent',
                          //borderColor: 'rgba(57,194,112,0.7)', //color del borde de la barra
                          //highlightFill: 'rgba(73,206,180,0.6)', //color hover de la barra
                          //highlightStroke: 'rgba(66,196,157,0.7)', //color hover del borde de la barra
                          hoverBackgroundColor: '#c9effc',
                          hoverBorderColor: 'black',
                          backgroundColor: [
                            'rgba(151, 219, 242, 0.55)',
                            'rgba(151, 219, 242, 0.55)',
                            'rgba(151, 219, 242, 0.55)',
                            'rgba(151, 219, 242, 0.55)',
                            'rgba(151, 219, 242, 0.55)',
                            'rgba(151, 219, 242, 0.55)',
                            'rgba(151, 219, 242, 0.55)',
                            'rgba(151, 219, 242, 0.55)',
                            'rgba(151, 219, 242, 0.55)',
                            'rgba(151, 219, 242, 0.55)',
                            'rgba(151, 219, 242, 0.55)',
                            'rgba(151, 219, 242, 0.55)'

                          ],
                          borderColor: [
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(0, 99, 132, 0.8)'
                          ],

                          borderWidth: 2,

                          data: [<?php
                                  echo ($e1 . "," . $f1 . "," . $m1 . "," . $a1 . "," . $ma1 . "," . $j1 . "," . $jl1 . "," . $ag1 . "," . $s1 . "," . $o1 . "," . $n1 . "," . $d1);  ?>],

                        }, { //Turistas extranjeros
                          label: "Turistas extranjeros",
                          pointStyle: 'rectRot',
                          hoverBackgroundColor: '#1e856b',
                          hoverBorderColor: 'black',
                          backgroundColor: [
                            'rgba(52, 203, 155, 0.58)',
                            'rgba(52, 203, 155, 0.58)',
                            'rgba(52, 203, 155, 0.58)',
                            'rgba(52, 203, 155, 0.58)',
                            'rgba(52, 203, 155, 0.58)',
                            'rgba(52, 203, 155, 0.58)',
                            'rgba(52, 203, 155, 0.58)',
                            'rgba(52, 203, 155, 0.58)',
                            'rgba(52, 203, 155, 0.58)',
                            'rgba(52, 203, 155, 0.58)',
                            'rgba(52, 203, 155, 0.58)',
                            'rgba(52, 203, 155, 0.58)'

                          ],
                          borderColor: [
                            'rgba(13, 130, 112, 0.82)',
                            'rgba(13, 130, 112, 0.82)',
                            'rgba(13, 130, 112, 0.82)',
                            'rgba(13, 130, 112, 0.82)',
                            'rgba(13, 130, 112, 0.82)',
                            'rgba(13, 130, 112, 0.82)',
                            'rgba(13, 130, 112, 0.82)',
                            'rgba(13, 130, 112, 0.82)',
                            'rgba(13, 130, 112, 0.82)',
                            'rgba(13, 130, 112, 0.82)',
                            'rgba(13, 130, 112, 0.82)',
                            'rgba(13, 130, 112, 0.82)'
                          ],

                          borderWidth: 2,

                          data: [<?php
                                  echo ($e2 . "," . $f2 . "," . $m2 . "," . $a2 . "," . $ma2 . "," . $j2 . "," . $jl2 . "," . $ag2 . "," . $s2 . "," . $o2 . "," . $n2 . "," . $d2); ?>],

                        }]

                      },

                      options: {
                        responsive: true,
                        scales: {
                          yAxes: [{
                            ticks: {
                              beginAtZero: true
                            }
                          }]
                        }
                      }
                    });
                  </script>
                </div>
              </div>

              <!--Grafica visitas mensuales-->
              <div class="col-lg-6 col-md-6 .col-sm-12 .col-xs-12 ">
                <div class="tabla card">
                  <h1 class="ml-3 mt-3 card-title">PORCENTAJE DE OCUPACIÓN</h1>
                  <div>


                    <hr>
                    <div class="row">
                      <div class="resultados col-12">
                        <canvas id="grafico2" style="width:80%; margin-bottom:10%;"></canvas>
                      </div>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">El porcentaje de ocupación que promedia nuestro hotel de forma mensual</small>
                    </div>


                  </div>

                  <script>
                    var contexto = document.getElementById("grafico2").getContext("2d");
                    var grafico = new Chart(contexto, {

                      type: "horizontalBar", //line,bar,pie,bubble,doughnut,polarArea


                      data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        datasets: [{
                          label: "Porcentaje de ocupacion mensual",
                          //backgroundColor: 'rgba(70,228,146,0.6)', //color de la barra
                          //backgroundColor: 'transparent',
                          //borderColor: 'rgba(57,194,112,0.7)', //color del borde de la barra
                          //highlightFill: 'rgba(73,206,180,0.6)', //color hover de la barra
                          //highlightStroke: 'rgba(66,196,157,0.7)', //color hover del borde de la barra
                          hoverBackgroundColor: '#6185ae',
                          hoverBorderColor: 'black',

                          backgroundColor: [
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(30, 99, 132, 0.8)',
                            'rgba(60, 99, 132, 0.8)',
                            'rgba(90, 99, 132, 0.8)',
                            'rgba(120, 99, 132, 0.8)',
                            'rgba(150, 99, 132, 0.8)',
                            'rgba(160, 99, 132, 0.8)',
                            'rgba(180, 99, 132, 0.8)',
                            'rgba(210, 99, 132, 0.8)',
                            'rgba(240, 99, 132, 0.8)',
                            'rgba(270, 99, 130, 0.8)',
                            'rgba(300, 100, 138, 0.8)'
                          ],
                          borderColor: [
                            'rgba(0, 99, 132, 1)',
                            'rgba(30, 99, 132, 1)',
                            'rgba(60, 99, 132, 1)',
                            'rgba(90, 99, 132, 1)',
                            'rgba(120, 99, 132, 1)',
                            'rgba(150, 99, 132, 1)',
                            'rgba(160, 90, 132, 1)',
                            'rgba(180, 99, 132, 1)',
                            'rgba(210, 99, 132, 1)',
                            'rgba(240, 99, 132, 1)',
                            'rgba(270, 99, 132, 1)',
                            'rgba(300, 99, 132, 1)'
                          ],
                          borderWidth: 2,

                          data: [<?php
                                  echo ($e3 . "," . $f3 . "," . $m3 . "," . $a3 . "," . $ma3 . "," . $j3 . "," . $jl3 . "," . $ag3 . "," . $s3 . "," . $o3 . "," . $n3 . "," . $d3); ?>],

                        }]

                      },

                      options: {
                        responsive: true,
                        scales: {
                          yAxes: [{
                            ticks: {
                              beginAtZero: true
                            }
                          }]
                        }
                      }
                    });
                  </script>
                </div>
              </div>
              <!--Fin grafica 2-->
            </div>
            <!--Fin graficas-->

            <!--Segundo row de grafica-->
            <div class="row">
              <div class="col-12">
                <div class="tabla card">
                  <h1 class="ml-3 mt-3 card-title">DERRAMA ECONÓMICA</h1>
                  <div>
                    <hr>
                    <div class="row">
                      <div class="resultados col-12">
                        <canvas id="grafico3" style="width:80%; margin-bottom:10%;"></canvas>
                      </div>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">El concepto de la derrama económica motivada por la actividad turística comprende la cuantificación del valor monetario total promedio (en pesos corrientes), de los gastos que como mínimo son realizados por los visitantes con pernocta a los principales centros turísticos del Estado durante el periodo de análisis.</small>
                    </div>
                  </div>

                  <script>
                    var contexto = document.getElementById("grafico3").getContext("2d");
                    var grafico = new Chart(contexto, {

                      type: "doughnut", //line,bar,pie,bubble,doughnut,polarArea


                      data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        datasets: [{
                          label: "Derrama economica",
                          //backgroundColor: 'rgba(70,228,146,0.6)', //color de la barra
                          //backgroundColor: 'transparent',
                          //borderColor: 'rgba(57,194,112,0.7)', //color del borde de la barra
                          //highlightFill: 'rgba(73,206,180,0.6)', //color hover de la barra
                          //highlightStroke: 'rgba(66,196,157,0.7)', //color hover del borde de la barra
                          hoverBackgroundColor: '#6185ae',
                          hoverBorderColor: 'black',

                          backgroundColor: [
                            'rgba(0, 99, 132, 0.8)',
                            'rgba(30, 99, 132, 0.8)',
                            'rgba(60, 99, 132, 0.8)',
                            'rgba(90, 99, 132, 0.8)',
                            'rgba(120, 99, 132, 0.8)',
                            'rgba(150, 99, 132, 0.8)',
                            'rgba(160, 99, 132, 0.8)',
                            'rgba(180, 99, 132, 0.8)',
                            'rgba(210, 99, 132, 0.8)',
                            'rgba(240, 99, 132, 0.8)',
                            'rgba(270, 99, 130, 0.8)',
                            'rgba(300, 100, 138, 0.8)'
                          ],
                          borderColor: [
                            'rgba(0, 99, 132, 1)',
                            'rgba(30, 99, 132, 1)',
                            'rgba(60, 99, 132, 1)',
                            'rgba(90, 99, 132, 1)',
                            'rgba(120, 99, 132, 1)',
                            'rgba(150, 99, 132, 1)',
                            'rgba(160, 90, 132, 1)',
                            'rgba(180, 99, 132, 1)',
                            'rgba(210, 99, 132, 1)',
                            'rgba(240, 99, 132, 1)',
                            'rgba(270, 99, 132, 1)',
                            'rgba(300, 99, 132, 1)'
                          ],
                          borderWidth: 2,

                          data: [<?php
                                  echo ($e . "," . $f . "," . $m . "," . $a . "," . $ma . "," . $j . "," . $jl . "," . $ag . "," . $s . "," . $o . "," . $n . "," . $d); ?>],

                        }]

                      },

                      options: {
                        responsive: true,
                        scales: {
                          yAxes: [{
                            ticks: {
                              beginAtZero: true
                            }
                          }]
                        }
                      }
                    });
                  </script>
                </div>
              </div>
            </div>


          </div>

          <!--TABLA DE REGISTRO DEL HOTEL SELECCIONADO-->
          <div id="tabla">
            <hr>
            <h2>Tabla de registros <?php echo $hotel;   ?></h2>
            <hr>

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
                        <table id="datos" class="text-center table table-bordered table-hover table-responsive">

                          <?php echo $salida; ?>



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




        </div>
      </main>



    </div>

  </main>
  <!-- page-content" -->
  </div>
  <!-- page-wrapper -->
  </main>
</body>

<script src="public/js/buscar_idfetch.js" type="text/javascript"></script>
<script src="public/js/js.js" type="text/javascript"></script>
<script src="public/js/bootstrap.min.js" type="text/javascript"></script>
<script src="public/js//popper.min.js" type="text/javascript"></script>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js" type="text/javascript"></script>

</html>