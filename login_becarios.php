<?php
include_once 'db.php';  

$db = new DB();

if (!empty($_POST['correo']) && !empty($_POST['password'])) {
    $query = $db->connect()->prepare('SELECT * FROM becario WHERE correo = :correo');
    $query->bindParam(':correo', $_POST['correo']);
    $query->execute();
    $resultados = $query->fetch(PDO::FETCH_ASSOC);
   
    if (!empty($resultados) && password_verify($_POST['password'], $resultados['password'])) {
        echo json_encode($resultados, JSON_UNESCAPED_UNICODE);
    }

}

?>