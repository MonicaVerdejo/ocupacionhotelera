<?php
require 'db.php';require_once 'admin_becarios.php';
$db= new DB();

if (isset($_POST['email'])) {
    
  $email = $_POST['email'] ;

  $sql = "DELETE from `becario` WHERE `correo` = '$email'";
  $stmt =$db->connect()->prepare($sql);
  
  
  if ($stmt->execute()) {
    $message = "Usuario eliminado";
    echo "<script>location.href='admin_becarios.php';</script>";
  }else{
     $message = "Error al eliminar usuario";
  }

}else{# if email doesnt exist 
  echo ("El usuario es inexistente"); 

}


?>