<?php
include_once 'db.php';
session_start();

if (!isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles10.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Site Icons -->
    <link rel="shortcut icon" href="public/img/cropped-logom3-1.png" type="image/x-icon">
    <title>Hotel</title>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#cambiarp").on('click', function() {
                $("#perfil").show();
                //$("#perfiloculto").hide();
                // $("#element5").show();  
                return false;
            });
        });
    </script>

</head>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="public/img_profile/<?php echo  $_SESSION['imagen_profile']; ?>" alt="logo" />
                <h3>Bienvenido</h3>
                <p>¡Realiza tus registros a tiempo!</p>
                <a href="cerrar.php">Salir</a>

            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Perfil</a>
                    </li>
                </ul>
                <!--Seccion Registro-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Registro Hotelero</h3>
                        <form action="nuevo_registro.php" method="POST">

                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="hotel" value="<?php echo $_SESSION['usuario']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="start">Fecha inicio</label>
                                        <input type="date" id="start" name="inicioFecha" value="" min="2016-01-01" max="2021-01-01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end">Fecha fin </label>
                                        <input type="date" id="end" name="finFecha" value="" min="2016-01-01" max="2021-01-01" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Habitaciones Ocupadas" value="" name="habOcupadas" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="persExtranjeras" placeholder="Numero de personas extranjeras" value="" required />
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="persNacion" placeholder="Numero de personas nacionales" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Días de vacaciones" value="" name="diasVacaciones" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="numHabitaciones" class="form-control" placeholder="Numero de habitaciones" value="" required />
                                    </div>


                                    <div class="form-group">
                                        <input type="text" name="costoHotel" class="form-control" placeholder="Costo del hotel" value="" required />
                                    </div>

                                    <input type="submit" class="btnRegister" value="Registrar" name="enviar" type="submit" />
                                </div>
                            </div>

                        </form>
                    </div>

                    <!--Seccion perfil-->
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Perfil</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Nombre Usuario</p>
                                    <h4> <?php echo $_SESSION['usuario'] ?></h4>
                                </div>
                                <div class="form-group">
                                    <p>Correo electronico:</p>
                                    <h4> <?php echo $_SESSION['correo'] ?></h4>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group user-img">
                                    <img src="public/img_profile/<?php echo $_SESSION['imagen_profile']; ?>" alt="">
                                </div>
                                <div class="">
                                    <div id="cambiarp">
                                        <img width="20" height="20" src="public/img/editar.png" alt="">
                                        <label for="file">Cambiar avatar</label>
                                    </div>
                                    <!---->
                                    <form class="col-12" id="perfil" style="display:none;" action="upload.php" method="post" enctype="multipart/form-data">

                                        <input type="file" lass="form-control" name="file" id="file">
                                        <p class=" mt-4 center "><input class="btn btn-secondary" name="enviar" type="submit" value="Enviar"></p>
                                    </form>

                                    <!---->
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!--<div class="form-group">
                                    <input type="text" class="form-control" placeholder="`Answer *" value="" />
                                </div>
                                <input type="submit" class="btnRegister"  value="nada :v"/>-->
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>