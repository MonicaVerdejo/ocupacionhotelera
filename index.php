<?php
include_once 'db.php';
session_start();

if (isset($_SESSION['rol'])) {
  switch ($_SESSION['rol']) {
    case 1:
      header('location: admin_inicio.php');
      break;

    case 2:
      header('location: hotel_principal.php');
      break;

    default:
  }
}

if (isset($_POST['correo']) && isset($_POST['password'])) {
  $correo = $_POST['correo'];
  $password = $_POST['password'];

  $db = new DB();
  $query = $db->connect()->prepare('SELECT * FROM usuario WHERE correo = :correo');
  $query->execute(['correo' => $correo]);

  $row = $query->fetch(PDO::FETCH_NUM); //transforma a un arreglo que puedo usar

  if (($row == true) && password_verify($_POST['password'], $row[3])) { //si existe contenido valida el rol
    $rol = $row[5];
    $_SESSION['rol'] = $rol;
    $_SESSION['usuario'] = $row[1];
    $_SESSION['imagen_profile'] = $row[6];
    $_SESSION['id_user'] = $row[0];
    $_SESSION['correo'] = $correo;


    switch ($rol) {
      case 1:
        header('location: admin_inicio.php');
        break;
      case 2:
        header('location: hotel_principal.php');
        break;
      default:
    }
  } else {
    // no existe el usuario
    echo '<script type="text/javascript">alert("Usuario o contraseña incorrectos")</script>';
  }
}

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,  initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="public/css/styles.css">
  <link rel="stylesheet" href="public/css/respon.css">
  <!-- Site Icons -->
  <link rel="shortcut icon" href="public/img/cropped-logom3-1.png" type="image/x-icon">
  
</head>

<body>
  <section class="content-seccion">

    <div class="content-img">
    </div>

    <div class="content-form">
      <div class="content-logo">
        <img src="public/img/cropped-logom3-1.png" alt="H Ayuntamiento de Champotón">
      </div>

      <form id="signup" action="#" method="post">
        <div class="user">
          <input type="text" name="correo" id="correo" placeholder="Correo" required>
        </div>

        <div class="pass">
          <input type="password" name="password" id="password" placeholder="Contraseña" required>
        </div>

        <div class="recu">
          <a href="recuperar.html">Recuperar contraseña</a>
        </div>

        <div class="boton">
          <button class="btn bot" id="submit" name="sub" type="submit">Iniciar</button>
          <div class="btn2"></div>
        </div>

        <div class="content-crear">
          <div class="">
            <p>¿No tiene cuenta?</p>
          </div>
          <div class="">
            <a href="registrar.php">Crear cuenta</a>
          </div>
        </div>
      </form>
    </div>

  </section>
</body>

</html>