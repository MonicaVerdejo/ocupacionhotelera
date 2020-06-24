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
    <!-- los icoonos = https://fontawesome.com/icons
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    -->

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
                    <h2>Becarios</h2>

                    <header style="position:relative; z-index:1;">
                        <div class="text-center alert alert-info">
                            <h1 class="mt-2 mb-2">Registro de becarios</h1>
                        </div>
                    </header>

                    <!-- PRUEBA DE CONSULTA CON JQUERY-->
                    <form action="registro_becario.php" method="POST">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" name="nombres" id="nombres" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="apellidos">Apellidos</label>
                          <input type="text" name="apellidos" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="email">Correo</label>
                          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="">
                        </div>
                       <div class="form-group">
                         <label for="password">Contraseña</label>
                         <input type="password" class="form-control" name="password" id="password" placeholder="">
                       </div>
                       <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>

            </main>
            <!-- page-content" -->
            <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        </div>

    </main>
    <script src="public/js/jquery-3.2.1.min.js"></script>


</body>



</html>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script id="rendered-js" src="public/js/js.js"></script>