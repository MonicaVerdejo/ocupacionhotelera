<?php
require 'db.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    
  $email = $_POST['email'] ;

if (strpos($email, 'outlook.com') || strpos($email, '@gmail.com')|| strpos($email, '@hotmail.com')|| strpos($email, '@yahoo.es') !== false) {
  $db = new DB();
$stmtCorreosRegistrados = $db->connect()->prepare('SELECT correo FROM becario WHERE correo = :email');
$stmtCorreosRegistrados->bindParam(':email', $_POST['email']);
$stmtCorreosRegistrados->execute();

if ($stmtCorreosRegistrados->rowCount() > 0) {
   echo'<script type="text/javascript">
  
  window.location.href="registrar.php";
  alert("El correo que has proporcionado ya se encuentra registrado con otra cuenta, por favor intenta con otro");
  </script>';
  
}else{# if email doesnt exist 
    $sql = "INSERT INTO becario(nombres,apellidos,correo, password) values (:nombres,:apellidos, :email, :password)";
$stmt =$db->connect()->prepare($sql);
$stmt->bindParam(":nombres", $_POST['nombres']);
$stmt->bindParam(":apellidos", $_POST['apellidos']);
$stmt->bindParam(":email", $_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$stmt->bindParam(":password", $password);

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