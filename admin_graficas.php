<?php
include_once 'db.php';
$db = new DB();

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
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Administrador</title>
  <link rel="shortcut icon" href="public/img/cropped-logom3-1.png" type="image/x-icon">
  <link rel="stylesheet" href="public/css/styles20.css" type="text/css">
  <link rel="stylesheet" href="public/css/styles21.css" type="text/css">
  <link rel="stylesheet" href="public/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" type="text/css">
  <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css"  type="text/css">

  <script src="Chartjs/Chart.min.js"  type="text/javascript"></script>
  <script src="public/js/jquery-3.2.1.min.js" type="text/javascript"></script>

  <style>
    body {
      background-color: #ededed;
    }

    .tabla {
      background-color: white;
      width: 90%;
      margin: 20px auto;

    }
  </style>
</head>
<!-- Site Icons  background-color: #575e66;-->

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

      <!--Contenido principal-->
      <main class="page-content">
        <div class="container-fluid">
          <h2>Ocupación hotelera en el municipio de Champotón</h2>

          <div class="row">
            <div class="col-8">

            </div>
            <div class="col-4">
              <form class="form-inline" action="procesar_grafica.php" method="POST">
                <small id="passwordHelpInline" class="text-muted ml-2">
                  Escoja el año que desea graficar.
                </small>
                <div class="form-group ml-2">

                  <select id="year" class="form-control" name="year">
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

          <hr>
          <!--Sección info general-->
          <div class="row">
            <div class="col-4">
              <div class="card" style="width: 18rem;">
                <div class="row card-body">

                  <div class="col-7">
                    <h5 class="card-title">$<?php require_once 'procesar_grafica.php';
                                            echo $ingresos; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Ingresos</h6>
                  </div>
                  <div class="col-5"><img width="95" height="95" src="public/img/ingresos.png" alt="Ingresos anuales registrados"></div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="card" style="width: 18rem;">
                <div class="row card-body">
                  <div class="col-6">
                    <h5 class="card-title"><?php echo $turismo; ?> visitas</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Turismo</h6>
                  </div>
                  <div class="col-6"><img width="100" height="100" src="public/img/turismo.jpg" alt="Turismo en ocupación hotelera"></div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="card" style="width: 18rem;">
                <div class="row card-body">
                  <div class="col-6">
                    <h5 class="card-title"><?php echo $hotel; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Hotel más visitado</h6>
                  </div>
                  <div class="col-6"><img width="100" height="100" src="public/img/favorito.png" alt="Hotel más visitado"></div>
                </div>
              </div>
            </div>
          </div>



          <hr>
          <!--Graficas-->

          <div class="row">
            <!-- Grafica Turismo/visitantes en champo-->
            <div class="col-lg-6 col-md-6 .col-sm-12 .col-xs-12 ">
              <div class="tabla card">

                <div>
                  <h1 class="ml-3 mt-3 card-title">Turismo</h1>

                  <hr>
                  <div class="row">
                    <div class="resultados col-12">
                      <canvas id="grafico" style="width:80%; margin-bottom:10%;"></canvas>
                    </div>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Actividad turística comprende la cuantificación de las visitas, las cuales se dividen en visitantes de otros países o extranjeros, y los compatriotas.</small>
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
                          'rgba(247, 248, 248, 0.55)',
                          'rgba(247, 248, 248, 0.55)',
                          'rgba(247, 248, 248, 0.55)',
                          'rgba(247, 248, 248, 0.55)',
                          'rgba(247, 248, 248, 0.55)',
                          'rgba(247, 248, 248, 0.55)',
                          'rgba(247, 248, 248, 0.55)',
                          'rgba(247, 248, 248, 0.55)',
                          'rgba(247, 248, 248, 0.55)',
                          'rgba(247, 248, 248, 0.55)',
                          'rgba(247, 248, 248, 0.55)',
                          'rgba(247, 248, 248, 0.55)'

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

                <div>
                  <h1 class="ml-3 mt-3 card-title">Ocupación</h1>

                  <hr>
                  <div class="row">
                    <div class="resultados col-12">
                      <canvas id="grafico2" style="width:80%; margin-bottom:10%;"></canvas>
                    </div>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">El porcentaje de ocupación que promedian nuestros hoteles de forma mensual</small>
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

                <div>
                  <h1 class="ml-3 mt-3 card-title">Derrama económica</h1>

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

                    type: "bar", //line,bar,pie,bubble,doughnut,polarArea


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

    </div>

  </main>
  <!-- page-content" -->



  </div>
  <!-- page-wrapper -->
  </main>
</body>

<script src="public/js/bootstrap.min.js" type="text/javascript"></script>
<script src="public/js//popper.min.js" type="text/javascript"></script>
<script src="public/js/js.js" type="text/javascript"></script>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js" type="text/javascript"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

</html>
