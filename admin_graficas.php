<?php 
include_once 'db.php';
include_once 'procesar_grafica.php';
$db = new DB();
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Administrador</title>
  <link rel="stylesheet" href="public/css/styles20.css">
  <link rel="stylesheet" href="public/css/styles21.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <!---->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <script src="Chartjs/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
              <li>
                <a href="admin_becarios.php">
                  <i class="fas fa-align-justify"></i>
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
          <h2>Derrama económica por ocupación hotelera en Champotón</h2>

          <hr>
          <div class="row">
            <div class="form-group col-md-12">
              <p>El concepto de la derrama económica motivada por la actividad turística comprende la cuantificación del valor monetario total promedio (en pesos corrientes), de los gastos que como mínimo son realizados por los visitantes con pernocta a los principales centros turísticos del Estado durante el periodo de análisis.</p>
            </div>
          </div>

          <!--Grafica de ventas-->


          <div class="tabla">
            <div>
              <h1 class="text-center mt-5">Derrama económica</h1>
              <div class="resultados" style="width:900px; margin-left:10%;margin-bottom:10%;"><canvas id="grafico"></canvas></div>

            </div>

            <script>
              var contexto = document.getElementById("grafico").getContext("2d");
              var grafico = new Chart(contexto, {

                type: "bar", //line,bar,pie,bubble,doughnut,polarArea

                data: {
                  labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                  datasets: [{
                    label: "Derrama",
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
                            echo ($e . "," . $f . "," . $m . "," . $a . "," . $ma . "," . $j . "," . $jl . "," . $a . "," . $s . "," . $o . "," . $n . "," . $d); ?>],

                  }]

                },

                options: {
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

      </main>
      <!-- page-content" -->



    </div>
    <!-- page-wrapper -->
  </main>
</body>


</html>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script id="rendered-js" src="public/js/js.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>