<?php 
include_once 'db.php';
$db = new DB();

$salida = "";
$sentencia = $db->connect()->prepare("SELECT hotel,fecha_registro FROM registro WHERE EXTRACT(month from fecha_fin) = EXTRACT(month FROM (NOW())) AND EXTRACT(YEAR from fecha_fin) = EXTRACT(YEAR FROM (NOW()))");
$sentencia->execute();

if($sentencia->rowCount() > 0){

    while($row=$sentencia->fetch(PDO::FETCH_ASSOC)){
        $registros['registros'][] = $row;    
    }
    echo json_encode($registros, JSON_UNESCAPED_UNICODE);
}
?>