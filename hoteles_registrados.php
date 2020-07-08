<?php
include_once 'db.php';
$db = new DB();

$salida = "";
$sentencia = $db->connect()->prepare("SELECT usuario FROM usuario");
$sentencia->execute();

if($sentencia->rowCount() > 0){

    while($row=$sentencia->fetch(PDO::FETCH_ASSOC)){
        $registros['hoteles'][] = $row;    
    }
    echo json_encode($registros, JSON_UNESCAPED_UNICODE);
} 

?>