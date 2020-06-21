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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- los icoonos = https://fontawesome.com/icons
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">


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





                    <!-- TABLAS -->





                    <form class="form-inline mt-4 mb-2 mr-0 txt-center container" method="POST" name="formFechas" id="formFechas">
                        <div class="row  col-10">
                            <div class="col-4 form-group">
                                <label for="fecha_inicio">Fecha Inicio:</label>
                                <input type="date" class="form-control" name="fecha_inicio" required>
                            </div>
                            <div class="col-4 form-group">
                                <label for="fecha_final">Fecha Final:</label>
                                <input type="date" class="form-control" name="fecha_final" required>
                            </div>
                            <div class=" col-4 form-group">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>

                        </div>
                    </form>
                    <hr>

                    <form method="POST" class="container mr-0">
                        <div class="row col-5  mt-4">
                            <div class="input-group mb-3">
                                <input name="consulta" type="text" class="form-control" placeholder="Dato a consultar" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary" type="button">Buscar</button>
                                </div>
                            </div>
                        </div>

                    </form>

                    <br>

                    <section id="tabla_resultado" class="text-center">
                        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

                        <table class=" mt-5" align="center" border="1" width="1000">

                            <tr class="bg-dark text-white">
                                <th colspan="11">ESTADISTICA DE LA OCUPACIÓN HOTELERA</th>
                            </tr>
                            <tr class="bg-light text-dark">
                                <th>Hotel</th>
                                <th>Habitaciones <br> Ocupadas</th>
                                <th>Dias vacaciones</th>
                                <th>Numero de <br> habitaciones</th>
                                <th>Costo del hotel</th>
                                <th>Personas <br>Nacionales</th>
                                <th>Personas <br>Extranjeras</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Fin</th>
                                <th>%</th>
                                <th>Derrama economica</th>


                            </tr>

                            <?php

                            if (!empty($_POST['consulta'])) {

                                $q = $_POST['consulta'];

                                $sentencia = $db->connect()->prepare("SELECT hotel, habitaciones_ocupadas,dias_vacaciones,num_habitaciones,costo_hotel,
            personas_nacionales, personas_extranjeras, fecha_inicio,fecha_fin FROM registro WHERE Hotel LIKE '%" . $q . "%' OR habitaciones_ocupadas LIKE '%" . $q . "%'
            OR dias_vacaciones LIKE '%" . $q . "%' OR num_habitaciones LIKE '%" . $q . "%' OR costo_hotel LIKE '%" . $q . "%' ");
                                $sentencia->execute();

                                foreach ($sentencia as $row) {

                            ?>
                                    <tr>
                                        <td><?php echo $row[0]; ?></td>
                                        <td><?php echo $row[1]; ?></td>
                                        <td><?php echo $row[2]; ?></td>
                                        <td><?php echo $row[3]; ?></td>
                                        <td><?php echo $row[4]; ?></td>
                                        <td><?php echo $row[5]; ?></td>
                                        <td><?php echo $row[6]; ?></td>
                                        <td><?php echo $row[7]; ?></td>
                                        <td><?php echo $row[8]; ?></td>
                                        <td><?php echo (($row[1] / $row[2] / $row[3]) * 100); ?></td>
                                        <td><?php echo $row[1] * $row[4]; ?></td>


                                    </tr>
                            <?php
                                }
                            }

                            ?>









                            <?php






                            if (!empty($_POST['fecha_inicio']) && !empty($_POST['fecha_final'])) {

                                $fecha_inicio = $_POST['fecha_inicio'];
                                $fecha_final  = $_POST['fecha_final'];
                                $sentencia = $db->connect()->prepare("SELECT hotel, habitaciones_ocupadas,dias_vacaciones,num_habitaciones,costo_hotel,
                personas_nacionales, personas_extranjeras, fecha_inicio,fecha_fin FROM registro WHERE fecha_inicio BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'");
                                $sentencia->execute();

                                foreach ($sentencia as $row) {

                            ?>
                                    <tr>
                                        <td><?php echo $row[0]; ?></td>
                                        <td><?php echo $row[1]; ?></td>
                                        <td><?php echo $row[2]; ?></td>
                                        <td><?php echo $row[3]; ?></td>
                                        <td><?php echo $row[4]; ?></td>
                                        <td><?php echo $row[5]; ?></td>
                                        <td><?php echo $row[6]; ?></td>
                                        <td><?php echo $row[7]; ?></td>
                                        <td><?php echo $row[8]; ?></td>
                                        <td><?php echo (($row[1] / $row[2] / $row[3]) * 100); ?></td>
                                        <td><?php echo $row[1] * $row[4]; ?></td>


                                    </tr>
                            <?php
                                }
                            }

                            ?>

                        </table>
                    </section>






                </div>

            </main>
            <!-- page-content" -->
            <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        </div>

    </main>
</body>



</html>





<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script id="rendered-js" src="public/js/js.js"></script>