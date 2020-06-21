<?php
require 'db.php';

if (!empty($_POST['email']) && !empty($_POST['contra'])) {
  $db = new DB();
  $stmtCorreosRegistrados = $db->connect()->prepare('SELECT correo FROM usuario WHERE correo = :email');
  $stmtCorreosRegistrados->bindParam(':email', $_POST['email']);
  $stmtCorreosRegistrados->execute();

  if ($stmtCorreosRegistrados->rowCount() > 0) {
    echo '<script type="text/javascript">
    
    window.location.href="registrar.php";
    alert("El correo que has proporcionado ya se encuentra registrado en otra cuenta, por favor intenta con otro");
    </script>';
  } else {
    # if email doesnt exist 
    $sql = "INSERT INTO usuario(usuario,correo, password, imagen_profile, rol_id) values (:usuario, :email, :contra,'defecto.png','2')";
   
    $stmt = $db->connect()->prepare($sql);
    $stmt->bindParam(":usuario", $_POST['usuario']);
    $stmt->bindParam(":email", $_POST['email']);
    $password = password_hash($_POST['contra'], PASSWORD_BCRYPT);
    $stmt->bindParam(":contra", $password);


    if ($stmt->execute()) {
      $message = "Usuario creado";
      header("Location: hotel_principal.php");
    } else {
      $message = "Error al crear usuario";
    }
  }
} //if email and password post doesnt exist
