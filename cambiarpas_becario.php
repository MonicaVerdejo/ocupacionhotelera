<?php
require 'db.php';   require_once 'admin_becarios.php';
$db= new DB();

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    
  $email = $_POST['email'] ;
  //$password = $_POST['password'] ;

  $sql = "UPDATE `becario` SET `password` = :password WHERE `becario`.`correo` = '$email';";
  
  $stmt =$db->connect()->prepare($sql);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(":password", $password);
  
  if ($stmt->execute()) {
    $message = "Contraseña cambiada eliminado";
    echo "<script>location.href='admin_becarios.php';</script>";
  }else{
     $message = "Error al modificar contraseña";
  }

}else{# if email doesnt exist 
  echo ("El usuario es inexistente"); 

}


?>