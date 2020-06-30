<?php
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
    <!-- Theme style -->
    <link rel="stylesheet" href="public/TABLA/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        #signup {
            padding: 0px 25px 25px;
            background-color: cadetblue;
            box-shadow:
                0px 0px 0px 5px rgba(157, 175, 174, 0.4),
                0px 4px 20px rgba(0, 0, 0, 0.33);
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            display: table;
            position: static;
        }

        .user-img img {
            width: 180px;
            height: 180px;
            box-shadow: 0px 0px 3px #343434;
            box-shadow: 0px 0px 3px #343434;
            border-radius: 50%;

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
                <div class="container-fluid">
                    <h2>Registro de becarios</h2>
                    <hr>

                    <header style="position:relative; z-index:1;">
                        <div class="text-center alert alert-info">
                            <h1 class="mt-2 mb-2">OCUPACIÓN HOTELERA</h1>
                        </div>
                    </header>

                    <!-- Formulario de registro becario-->
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12 mt-3">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <h4>Añadir <br>usuario</h4>
                                    <a href="#" id="agregar"><img style="position: relative;" width="70" height="70" src="public/img/agregar2.png" alt="Agregar usuario"></a>
                                </div>
                                <div class="col-4 text-center" id="deletep2">
                                    <h4>Eliminar <br> usuario</h4>
                                    <a href="#" id="eliminar"><img style="position: relative;" width="70" height="70" src="public/img/eliminar.png" alt="Eliminar usuario"></a>
                                </div>
                                <div class="col-4 text-center" id="deletep">
                                    <h4>Cambiar <br> contraseña</h4>
                                    <a href="#" id="cambiar"><img style="position: relative;" width="70" height="70" src="public/img/contraseña3.png" alt="Visualizar contraseña de usuario"></a>
                                </div>
                            </div>
                            <!--Registra usuario-->
                            <div class="row mt-5 ml-5">
                                <div class="col-12 text-center" style="display: none;" id="agregarUsuario">
                                    <h4 class="">Registra un nuevo usuario</h4>
                                    <form class="ml-3 mt-3 col-10" id="signup" action="registro_becario.php" method="POST">
                                        <div class="mt-3 form-group"><i class="fa fa-user" aria-hidden="true"></i>
                                            <label for="nombres">Nombres</label>
                                            <input type="text" name="nombres" id="nombres" class="form-control" placeholder="" required>
                                        </div>
                                        <div class="form-group"> <i class="fa fa-address-card" aria-hidden="true"></i>
                                            <label for="apellidos">Apellidos</label>
                                            <input type="text" name="apellidos" id="" class="form-control" placeholder="" required>
                                        </div>
                                        <div class="form-group"> <i class="fa fa-at" aria-hidden="true"></i>
                                            <label for="email">Correo</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="" required>
                                        </div>
                                        <div class="form-group"><i class="fa fa-bug" aria-hidden="true"></i>
                                            <label for="password">Contraseña</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="" required>
                                        </div>
                                        <button type="submit" id="submit" class="btn btn-dark "><i class="fa fa-server" aria-hidden="true"></i> Registrar</button>

                                    </form>
                                </div>

                            </div>
                            <!--Elimina usuario-->
                            <div class="row mt-1 ml-5">
                                <div class="col-12 text-center" style="display: none;" id="eliminarUsuario">
                                    <h4 class="text-center">Elimina un usuario</h4>
                                    <form class="ml-3 mt-3 col-10" id="signup" action="eliminar_becario.php" method="POST">
                                        <div class="mt-3 form-group"><i class="fa fa-user" aria-hidden="true"></i>
                                            <label for="nombres">Nombres</label>
                                            <input type="text" name="nombres" id="nombres" class="form-control" placeholder="" required>
                                        </div>
                                        <div class="form-group"> <i class="fa fa-address-card" aria-hidden="true"></i>
                                            <label for="apellidos">Apellidos</label>
                                            <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="" required>
                                        </div>
                                        <div class="form-group"> <i class="fa fa-at" aria-hidden="true"></i>
                                            <label for="email">Correo</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="" required>
                                        </div>
                                        <button type="submit" id="submit" class="btn btn-dark "><i class="fa fa-server" aria-hidden="true"></i> Eliminar</button>
                                    </form>
                                </div>

                            </div>
                            <!--Modificar contraseña de usuario-->
                            <div class="row  ml-5">
                                <div class="col-12 text-center" style="display: none;" id="cambiarPassword">
                                    <h4 class="text-center">Contraseña de usuario registrado</h4>
                                    <form class="ml-3 mt-3 col-10" action="cambiarpas_becario.php" id="signup" method="POST">

                                        <div class="form-group"> <i class="fa fa-at" aria-hidden="true"></i>
                                            <label for="email">Correo</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="" required>
                                        </div>
                                        <div class="form-group"><i class="fa fa-bug" aria-hidden="true"></i>
                                            <label for="password">Nueva contraseña</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="" required>
                                        </div>
                                        <button type="submit" id="submit" class="btn btn-dark "><i class="fa fa-server" aria-hidden="true"></i> Modificar</button>
                                    </form>
                                </div>

                            </div>
                        </div>




                        <div class="col-lg-6 col-sm-12 col-xs-12 mt-3 text-center">

                            <div>
                                <h4>Becarios registrados</h4>

                                <table class=" mt-5" align="center" border="1">

                                    <tr class="bg-dark text-white">
                                        <th colspan="3">Usuarios</th>
                                    </tr>
                                    <tr class="bg-light text-dark">
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>

                                    </tr>

                                    <?php

                                    $sentencia = $db->connect()->prepare("SELECT nombres, apellidos, correo FROM becario");
                                    $sentencia->execute();

                                    foreach ($sentencia as $row) {

                                    ?>
                                        <tr>
                                            <td><?php echo $row[0]; ?></td>
                                            <td><?php echo $row[1]; ?></td>
                                            <td><?php echo $row[2]; ?></td>




                                        </tr>
                                    <?php
                                    }


                                    ?>

                                </table>
                            </div>

                        </div>
                    </div>

                </div>

            </main>
            <!-- page-content" -->
            <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        </div>

    </main>
    <script src="public/js/jquery-3.2.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#agregar").on('click', function() {
                $("#agregarUsuario").show();
                $("#eliminarUsuario").hide();
                $("#cambiarPassword").hide();

                return false;
            });

            $("#eliminar").on('click', function() {
                $("#eliminarUsuario").show();
                $("#agregarUsuario").hide();
                $("#cambiarPassword").hide();

                return false;
            });
            $("#cambiar").on('click', function() {
                $("#cambiarPassword").show();
                $("#agregarUsuario").hide();
                $("#eliminarUsuario").hide();
                return false;
            });

        });
    </script>

</body>



</html>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script id="rendered-js" src="public/js/js.js"></script>