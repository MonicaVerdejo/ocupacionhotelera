<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,  initial-scale=1.0">
  <title>Inicio</title>
  <link rel="shortcut icon" href="public/img/cropped-logom3-1.png" type="image/x-icon">
  <link rel="stylesheet" href="public/css/styles2.css">
  <link rel="stylesheet" href="public/css/respon.css">

</head>

<body>
  <section class="content-seccion">

    <div class="content-img2">

    </div>

    <div class="content-form">
      <div class="content-logo">
        <img src="public/img/cropped-logom3-1.png" alt="H Ayuntamiento de Champotón">
      </div>

      <form action="" method="post">

        <div class="user">
          <input type="text" name="usuario" id="usuario" placeholder="Hotel" required>
        </div>

        <div class="hoteles">
          <input type="email" name="email" id="email" placeholder="Correo electronico" required>
        </div>

        <div class="pass">
          <input type="password" name="contra" id="contra" placeholder="Contraseña" required pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,20}$"
          oninvalid="this.setCustomValidity('La contraseña debe tener entre 8 y 20 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.')" 
          oninput="this.setCustomValidity('')"   />
        </div>

        <div class="boton">
          <button class="btn bot" id="submit" type="submit" name="submit">Registrar</button>
          <div class="btn2"></div>
        </div>

        <div class="regresar">
          <a href="index.php">Regresar</a>
        </div>

      </form>
      <?php
      if (isset($_POST['submit'])) {
        require('registro.php');
      }
      ?>
    </div>

  </section>
</body>

</html>