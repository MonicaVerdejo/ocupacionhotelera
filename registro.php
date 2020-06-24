<?php
require 'db.php';

if (!empty($_POST['email']) && !empty($_POST['contra'])) {
    
  $email = $_POST['email'] ;

if (strpos($email, 'outlook.com') || strpos($email, '@gmail.com')|| strpos($email, '@hotmail.com')|| strpos($email, '@yahoo.es') !== false) {
  $db = new DB();
$stmtCorreosRegistrados = $conn->prepare('SELECT correo FROM usuario WHERE correo = :email');
$stmtCorreosRegistrados->bindParam(':email', $_POST['email']);
$stmtCorreosRegistrados->execute();

if ($stmtCorreosRegistrados->rowCount() > 0) {
   echo'<script type="text/javascript">
  
  window.location.href="registrar.php";
  alert("El correo que has proporcionado ya se encuentra registrado con otra cuenta, por favor intenta con otro");
  </script>';
  
}else{# if email doesnt exist 
    $sql = "INSERT INTO usuario(usuario,correo, password, rol_id, imagen_profile) values (:usuario, :email, :contra, '2','defecto.png')";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":usuario", $_POST['usuario']);
$stmt->bindParam(":email", $_POST['email']);
$password = password_hash($_POST['contra'], PASSWORD_BCRYPT);
$stmt->bindParam(":contra", $password);

if ($stmt->execute()) {
  $message = "Usuario creado";
    echo "<script>location.href='hotel_principal.php';</script>";
}else{
   $message = "Error al crear usuario";
}

}
}else{
  echo'<script type="text/javascript">
  
  window.location.href="registrar.php";
  alert("No es un correo admitido, intenta con gmail.com, hotmail.com, outlook.com o yahoo.es");
  </script>';
}  
}
?>