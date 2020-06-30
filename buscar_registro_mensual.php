<?php
include_once 'db.php';
$db = new DB();

$salida = "";
$sentencia = $db->connect()->prepare("SELECT hotel,fecha_registro FROM registro WHERE EXTRACT(month from fecha_fin) = EXTRACT(month FROM (NOW())) AND EXTRACT(YEAR from fecha_fin) = EXTRACT(YEAR FROM (NOW()))");
$sentencia->execute();


if (!empty($_POST['consulta'])) {

    $q = $_POST['consulta'];

    $sentencia = $db->connect()->prepare("SELECT hotel,fecha_registro FROM registro WHERE EXTRACT(month from fecha_fin) = EXTRACT(month FROM (NOW())) AND EXTRACT(YEAR from fecha_fin) = EXTRACT(YEAR FROM (NOW())) AND hotel LIKE '$q%'");
    $sentencia->execute();
}


if ($sentencia->rowCount() > 0) {

    $salida .= "
 
    <tr class='bg-dark text-white'>
    </tr>
    <tr class='bg-light text-dark'>
        <th>Hotel</th>
        <th>Status</th>
        <th>Fecha</th>
    <tr>   

    ";

    while ($row = $sentencia->fetch(PDO::FETCH_ASSOC)) {
        $salida .= "
    <tr>
        <td>" . $row['hotel'] . "</td>
        <td>Entregado</td>
        <td>" . $row['fecha_registro'] . "</td>
    </tr>
        ";
    }
    
} else {
    $salida .= "No existen coincidencias";
}


echo $salida;



